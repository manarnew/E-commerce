<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           'categroy'=>'required|unique:categories,category_name',
        ];
    }
    public function messages()
    {
        return [
            'categroy.required'=>'category name is required',
            'categroy.unique'=>'category name is already exists',
        ];
        
    }
}
