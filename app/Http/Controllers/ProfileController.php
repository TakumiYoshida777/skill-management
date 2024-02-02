<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestProfile;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * プロフィールの初期表示
     *
     * @return void
     */
    public function index()
    {
        $user = Auth::user();
        $profile = Profile::query()
        ->where("user_id",$user->id)
        ->first();
        // dd($user);
        // dd($profile);
        return view('profile', compact('user','profile'));
    }

    /**
     * プロフィールの更新
     *
     * @param RequestProfile $request
     * @param string $id
     * @return void
     */
    public function update(RequestProfile $request, string $id)
    {
        $user_id = Auth::user()->id;
        $data = $request->all();
        // $data = $request->validated();
        // dd(isset($data['project_manager_flag']) ? true : false);
        Profile::where('user_id', $user_id)->update([
            'pr' => $data['pr'],
            'birthdate' => $data['birthdate'],
            'division' => $data['division'],
            'position' => $data['position'],
            'section' => $data['section'],
            'industry_experience' => $data['industry_experience'],
            'project_manager_flag' => isset($data['project_manager_flag']) ? true : false,
            'project_leader_flag' => isset($data['project_leader_flag']) ? true : false,
            'requirements_definition_flag' => isset($data['requirements_definition_flag']) ? true : false,
            'basic_design_flag' => isset($data['basic_design_flag']) ? true : false,
            'detailed_design_flag' => isset($data['detailed_design_flag']) ? true : false,
            'development_flag' => isset($data['development_flag']) ? true : false,
            'unit_test_flag' => isset($data['unit_test_flag']) ? true : false,
            'integration_test_flag' => isset($data['integration_test_flag']) ? true : false,
            'system_test_flag' => isset($data['system_test_flag']) ? true : false,
        ]);
        return redirect('profile')->with('status','プロフィールの更新に成功しました。');
    }
}
