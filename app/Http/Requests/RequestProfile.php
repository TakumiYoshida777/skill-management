<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class RequestProfile extends FormRequest
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
            'pr' => 'required|max:600',
            'birthdate' => 'date|required',
            'division' => 'required|max:50',
            'position' => 'required|max:50',
            'section' => 'max:50',
            'industry_experience' => 'required|max:3',
            'project_manager_flag' => 'nullable',
            'project_leader_flag' => 'nullable',
            'requirement_definition_flag' => 'nullable',
            'basic_design_flag' => 'nullable',
            'detailed_design_flag' => 'nullable',
            'development_flag' => 'nullable',
            'unit_test_flag' => 'nullable',
            'integration_test_flag' => 'nullable',
            'system_test_flag' => 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'pr' => '自己PR',
            'birthdate' => '生年月日',
            'division' => '部署',
            'position' => '役職',
            'section' => '課',
            'industry_experience' => '経験年数',
            'project_manager_flag' => 'プロジェクトマネージャーフラグ',
            'project_leader_flag' => 'プロジェクトリーダーフラグ',
            'requirement_definition_flag' => '要件定義フラグ',
            'basic_design_flag' => '基本設計フラグ',
            'detailed_design_flag' => '詳細設計フラグ',
            'development_flag' => '開発フラグ',
            'unit_test_flag' => '単体テストフラグ',
            'integration_test_flag' => '結合テストフラグ',
            'system_test_flag' => '総合テストフラグ',
        ];
    }
}
