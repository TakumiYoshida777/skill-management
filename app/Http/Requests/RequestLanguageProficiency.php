<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLanguageProficiency extends FormRequest
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
        $id = $this->route('language_proficiency');

        $rules = [
            'name' => 'required|unique:language_proficiencies,name,' .( $id ?? ''). ',id',
            'learning_method' => 'required|string',
            'read_status' => 'required',
            'write_status' => 'required',
            'conversation_status' => 'required',
        ];

        return $rules;
    }

    /**
     * エラーの表示
     *
     * @return void
     */
    public function attributes()
    {
        return [
            'name' => '外国語種別',
            'learning_method' => '学習方法',
            'read_status' => '読むレベル',
            'write_status' => '書くレベル',
            'conversation_status' => '会話レベル',
        ];
    }
}

