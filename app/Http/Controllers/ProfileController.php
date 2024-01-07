<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * リソースの一覧を表示
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        return view('profile',compact('user'));
    }

    /**
     * 新しいリソースを作成するためのフォームを表示
     */
    public function create()
    {
        //
    }

    /**
     * 新しく作成されたリソースを保存
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * 指定されたリソースを表示
     */
    public function show(string $id)
    {
        //
    }

    /**
     * 指定されたリソースの編集フォームを表示
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * ストレージ内の指定されたリソースを更新
     */
    public function update(RequestProfile $request, string $id)
    {
        $user = Auth::user();
        // $data = $request->all();
        $data = $request->validated();
    //    dd($data['pr']);

        User::where('id', $id)->update([
            'pr' => $data['pr'],
        ]);
        return redirect('profile');
    }

    /**
     * 指定されたリソースを削除
     */
    public function destroy(string $id)
    {
        //
    }
}
