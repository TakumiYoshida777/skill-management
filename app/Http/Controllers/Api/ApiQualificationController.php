<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Qualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiQualificationController extends Controller
{
/**
     * 外国語スキル一覧を取得
     *
     * @param Request $request
     * @return void
     */
    public function get_qualification_list(Request $request)
    {
        try {
            $res = $request->all();
            $user_id = $res['id'];
            $keyword = $res['search']['value'];

            $query = Qualification::where("user_id", $user_id)
                ->select('*');

            // フィルタリング
            if (!empty($keyword)) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('issue_date', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('expiry_date', 'LIKE', '%' . $keyword . '%');
                });
            }

            // フィルタリング後のレコード数
            $filteredCount = $query->count();

            // ソート
            // $orderColumnIndex = $res['order'][0]['column'];
            // $orderColumnName = $res['columns'][$orderColumnIndex]['data'];
            // $orderDir = $res['order'][0]['dir'];
            // $query->orderByRaw("$orderColumnName $orderDir");
            // ソート
            if (!empty($orderColumnName) && !empty($orderDir)) {
                $query->orderBy($orderColumnName, $orderDir);
            }

            // ページネーション
            // $projects = $query
            //     ->offset($res['start'])
            //     ->limit($res['length'])
            //     ->get();
            $projects = $query->get();
            $data = array(
                'draw' => intval($res['draw']),
                'recordsTotal' => $filteredCount,
                'recordsFiltered' => $filteredCount,
                'data' => $projects,
            );

            return response()->json($data);
        } catch (\Exception $e) {
            Log::info($e);
            return response()->json(['error' => 'データの取得に失敗しました'], 500);
        }
    }
}
