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
            //formの中のinputタグの name属性 で指定
            'pr' => 'required|max:300',
            'birthdate' => 'date|required',
            'division' => 'required|max:50',
            'position' => 'required|max:50',
            'section' => 'max:50',
            'industry_experience_months' => 'required|max:2',
            'project_manager_flag' => 'nullable',
            'project_leader_flag' => 'nullable',
            'requirements_definition_flag' => 'nullable',
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
            'industry_experience_months' => '経験年数',
        ];
    }
}
