<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiAdminSearchMemberController extends Controller
{
    /**
     * プロジェクト一覧を取得するAPI
     *
     * @param Request $request
     * @return void
     */
    public function search_member(Request $request)
    {
        Log::info("IN search_member");
        try {
            $res = $request->all();
            // $user_id = $res['id'];
            // $keyword = $res['search']['value'];

            $query = User::query()
            ->leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
            ->leftJoin('engineer_skill_os', 'users.id', '=', 'engineer_skill_os.user_id')
            ->leftJoin('engineer_skill_servers', 'users.id', '=', 'engineer_skill_servers.user_id')
            ->leftJoin('engineer_skill_databases', 'users.id', '=', 'engineer_skill_databases.user_id')
            ->leftJoin('engineer_skill_languages', 'users.id', '=', 'engineer_skill_languages.user_id')
            ->leftJoin('engineer_skill_frameworks', 'users.id', '=', 'engineer_skill_frameworks.user_id')
            ->leftJoin('engineer_skill_middleware', 'users.id', '=', 'engineer_skill_middleware.user_id')
            ->leftJoin('engineer_skill_virtual_environments', 'users.id', '=', 'engineer_skill_virtual_environments.user_id')
            ->leftJoin('engineer_skill_version_management', 'users.id', '=', 'engineer_skill_version_management.user_id')
            ->select('users.id', 'users.first_name', 'users.last_name', 'profiles.division', 'profiles.position', 'profiles.industry_experience');



            // フィルタリング
            if (!empty($keyword)) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('first_name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('division', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('position', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('industry_experience','<', $keyword);
                    // Add more columns as needed
                });
            }

            // フィルタリング後のレコード数
            $filteredCount = $query->count();

            // ソート
            $orderColumnIndex = $res['order'][0]['column'];
            $orderColumnName = $res['columns'][$orderColumnIndex]['data'];
            $orderDir = $res['order'][0]['dir'];

            if (!empty($orderColumnName) && !empty($orderDir)) {
                $query->orderBy($orderColumnName, $orderDir);
            }
            // ページネーション
            $users = $query
                ->offset($res['start'])
                ->limit($res['length'])
                ->get();

            $data = array(
                'draw' => intval($res['draw']),
                'recordsTotal' => $filteredCount,
                'recordsFiltered' => $filteredCount,
                'data' => $users,
            );

            return response()->json($data);
        } catch (\Exception $e) {
        Log::info("データの取得に失敗しました："."$e");

            return response()->json(['error' => 'データの取得に失敗しました'], 500);
        }
    }
}
