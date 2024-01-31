<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProject extends FormRequest
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
        return [
            'name' => 'required|max:100',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'required|max:250',
            'position' => 'required|max:50',
            'team_size' => 'required|numeric|min:1',
            'all_team_size' => 'required|numeric|min:1',
            // 'used_language' => 'unique:project_used_languages,name,except',
            // 'used_framework' => 'unique:project_used_frameworks,name,except',
            // 'used_database' => 'unique:project_used_databases,name,except',
            // 'used_middleware' => 'unique:project_used_middleware,name,except',
            // 'used_os' => 'unique:project_used_os,name,except',
            // 'used_server' => 'unique:project_used_servers,name,except',
            // 'used_version_management' => 'unique:project_used_version_management,name,except',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'プロジェクト名',
            'start_date' => '開始日',
            'end_date' => '終了日',
            'description' => 'プロジェクト説明',
            'position' => '役割',
            'team_size' => 'チーム人数',
            'all_team_size' => '全体人数',
            // 'used_language' => '言語',
            // 'used_framework' => 'フレームワーク',
            // 'used_database' => 'データベース',
            // 'used_middleware' => 'ミドルウェア',
            // 'used_os' => 'OS',
            // 'used_server' => 'サーバー',
            // 'used_version_management' => 'バージョン管理システム',
        ];
    }
}
