<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
           'title'=>'required',
           'description'=>'required',
           'price'=>'required',
           'quantity'=>'required',
           'category'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Product name is required',
            'description.required'=>'Product description is required',
            'price.required'=>'Product price is required',
            'quantity.required'=>'Product quantity is required',
            'category.required'=>'Category name is required',
        ];
        
    }
}
