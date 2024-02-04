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
            Log::info($res);
            $projects = DB::table('projects')
                ->where("user_id", $res['id'])
                ->select('id','name', 'start_date', 'end_date')
                ->get();
            Log::info($projects);

            // JSONデータの正確性を確認
            $data = array(
                'draw' => intval($res['draw']), // draw変数をリクエストで設定された値と同じ値に設定
                'recordsTotal' => count($projects), // データセット全体のレコード数
                'recordsFiltered' => count($projects), // フィルタリング後のレコード数
                'data' => $projects // 表示するデータ
            );
            Log::info($data);


            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'データの取得に失敗しました'], 500);
        }
    }
}
