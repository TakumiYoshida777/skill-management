<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminGrantPermissions extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //ログインされていなければアクセス拒否
        $this->middleware('auth');
    }

    /**
     * 権限付与画面に遷移
     *
     * @return void
     */
    public function index() {
        return view('admin/grant_permissions');
    }

    /**
     * 検索結果を表示
     *
     * @param Request $request
     * @return view
     */
    public function get_grant_target_user(Request $request){
        $target_email = $request->target_email;
        $target_user = User::where('email', $target_email)->with([
            'profile'
        ])->first();

        return view('admin/grant_target_user',compact('target_user'));
    }

    public function update_grant(Request $request, $id) {
        try{
            $target_user = User::where('id', $id)->first();
            User::where('id', $id)->update([
                'role_id' => $request->role_id
            ]);
            return redirect('admin/grant_permissions')
            ->with('status', $target_user->last_name.$target_user->first_name.'さんの権限を更新しました。');
        } catch (Exception $e) {
            Log::debug($e);
            DB::rollback();
            return redirect('project')->withErrors("更新に失敗しました。予期せぬエラー")
                ->withInput();
        }

    }
}
