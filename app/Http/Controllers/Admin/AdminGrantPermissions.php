<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\isNull;

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
     * 権限付与画面を表示
     *
     * @return void
     */
    public function index()
    {
        $user = Auth::user();
        //システムオーナーのみアクセス可能
        Gate::authorize('grant_owner',$user);
        return view('admin/grant_permissions');
    }

    /**
     * 検索結果を表示
     *
     * @param Request $request
     * @return view
     */
    public function get_grant_target_user(Request $request)
    {
        $user = Auth::user();
        //システムオーナーのみアクセス可能
        Gate::authorize('view', $user);

        $target_email = $request->target_email;
        $target_user = User::where('email', $target_email)->with([
            'profile'
        ])->first();

        //Userテーブルに入力されたemailが無ければエラーを表示
        if (empty($target_user)) {
            return redirect('admin/grant_permissions')->withErrors("ユーザーが存在しません");
        }

        return view('admin/grant_target_user', compact('target_user'));
    }

    /**
     * 権限の更新
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update_grant(Request $request, $id)
    {
        $user = Auth::user();
        //システムオーナーのみ更新可能
        Gate::authorize('update', $user);

        try {
            DB::beginTransaction();
            $target_user = User::where('id', $id)->first();
            User::where('id', $id)->update([
                'role_id' => $request->role_id
            ]);
            DB::commit();
            return redirect('admin/grant_permissions')
                ->with('status', $target_user->last_name . $target_user->first_name . 'さんの権限を更新しました。');
        } catch (Exception $e) {
            Log::debug($e);
            DB::rollback();
            return redirect('admin/grant_permissions')->withErrors("更新に失敗しました。予期せぬエラー")
                ->withInput();
        }
    }
}
