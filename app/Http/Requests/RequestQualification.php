<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestQualification extends FormRequest
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
        $id = $this->route('qualification');

        return [
            'name' => 'required|unique:qualifications,name,' .( $id ?? ''). ',id',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date',
            'memo' => 'nullable',
        ];
    }


    // public function rules(): array
    // {
    //     $id = $this->route('qualification'); // Assuming the route parameter is named 'qualification'

    //     if ($id === null) {
    //         // Handle the case when $id is null
    //         // You may want to set a default value or throw an error
    //     } else {
    //         // Proceed with validation using $id
    //         return [
    //             'name' => 'unique:qualifications,name,except,'.$id.'|required',
    //             'issue_date' => 'required|date',
    //             'expiry_date' => 'required|date',
    //             'memo' => 'nullable',
    //         ];
    //     }
    // }
    /**
     * エラーの表示
     *
     * @return void
     */
    public function attributes()
    {
        return [
            'name' => '資格',
            'issue_date' => '取得日',
            'expiry_date' => '有効期限',
            'memo' => '備考',
        ];
    }
}
