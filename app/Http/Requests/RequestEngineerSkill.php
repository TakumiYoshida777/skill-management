<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'Language' => 'unique:engineer_skill_languages,name,except',
            'Framework' => 'unique:engineer_skill_frameworks,name,except',
            'Database' => 'unique:engineer_skill_databases,name,except',
            'Middleware' => 'unique:engineer_skill_middleware,name,except',
            'OS' => 'unique:engineer_skill_os,name,except',
            'Server' => 'unique:engineer_skill_servers,name,except',
            'VersionManagement' => 'unique:engineer_skill_version_management,name,except',
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
            'VersionManagement' => 'バージョン管理システム',
        ];
    }
}

