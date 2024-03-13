<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RequestEngineerSkill extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user_id = Auth::user()->id;
        return [
            'Language' => [
                Rule::unique('engineer_skill_languages', 'name')->where(function ($query) use ($user_id) {
                    return $query->where('user_id', $user_id);
                }),
            ],
            'Framework' => [
                Rule::unique('engineer_skill_frameworks', 'name')->where(function ($query) use ($user_id) {
                    return $query->where('user_id', $user_id);
                }),
            ],

            'Database' => [
                Rule::unique('engineer_skill_databases', 'name')->where(function ($query) use ($user_id) {
                    return $query->where('user_id', $user_id);
                }),
            ],
            'Middleware' => [
                Rule::unique('engineer_skill_middleware', 'name')->where(function ($query) use ($user_id) {
                    return $query->where('user_id', $user_id);
                }),
            ],
            'OS' => [
                Rule::unique('engineer_skill_os', 'name')->where(function ($query) use ($user_id) {
                    return $query->where('user_id', $user_id);
                }),
            ],
            'Server' => [
                Rule::unique('engineer_skill_servers', 'name')->where(function ($query) use ($user_id) {
                    return $query->where('user_id', $user_id);
                }),
            ],
            'version_management' =>  [
                Rule::unique('engineer_skill_version_management', 'name')->where(function ($query) use ($user_id) {
                    return $query->where('user_id', $user_id);
                }),
            ],
            'VirtualEnvironment' => [
                Rule::unique('engineer_skill_virtual_environments', 'name')->where(function ($query) use ($user_id) {
                    return $query->where('user_id', $user_id);
                }),
            ],
        ];
    }

    /**
     * エラーの表示
     *
     * @return void
     */
    public function attributes()
    {
        return [
            'Language' => '言語',
            'Framework' => 'フレームワーク',
            'Database' => 'データベース',
            'Middleware' => 'ミドルウェア',
            'OS' => 'OS',
            'Server' => 'サーバー',
            'version_management' => 'バージョン管理システム',
            'VirtualEnvironment' => '仮想環境',
        ];
    }
}

