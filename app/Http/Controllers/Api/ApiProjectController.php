<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\Datatables;

class ApiProjectController extends Controller
{
    public function get_project_list(Request $request)
    {
        try {
            $res = $request->all();
            $user_id = $res['id'];
            $keyword = $res['search']['value'];

            $query = Project::where("user_id", $user_id)
                ->select('id', 'name','description' ,'start_date', 'end_date','position','created_at' );

            // フィルタリング
            if (!empty($keyword)) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('start_date', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('end_date', 'LIKE', '%' . $keyword . '%');
                    // Add more columns as needed
                });
            }

            // フィルタリング後のレコード数
            $filteredCount = $query->count();

            // ソート
            $orderColumnIndex = $res['order'][0]['column'];
            $orderColumnName = $res['columns'][$orderColumnIndex]['data'];
            $orderDir = $res['order'][0]['dir'];
            if($res["order"][0]["dir"] == "desc"){//end_dateが降順だったらend_dateがNULLのレコードを先頭に
                $query->orderByRaw("CASE WHEN end_date IS NULL THEN 0 ELSE 1 END, $orderColumnName $orderDir");
            }else {//end_dateが昇順だったらend_dateがNULLのレコードを一番後ろに
                $query->orderByRaw("CASE WHEN end_date IS NULL THEN 1 ELSE 0 END, $orderColumnName $orderDir");
            }

            // ページネーション
            $projects = $query
                ->offset($res['start'])
                ->limit($res['length'])
                ->get();

            $data = array(
                'draw' => intval($res['draw']),
                'recordsTotal' => $filteredCount,
                'recordsFiltered' => $filteredCount,
                'data' => $projects,
            );

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'データの取得に失敗しました'], 500);
        }
    }
}
