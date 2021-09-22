<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'contents' => 'required',
        ];

    }
    public function messages()
    {

        return  [
            'name.required'    => 'Ten khong duoc de trong',
            'name.unique'    => 'Ten khong duoc phep trung',
            'price.required'    => 'Gia khong duoc de trong',
            'tags.required' => 'Tag khong duoc de trong',
            'category_id.required' => 'Danh muc khong duoc de trong',
            'contents.required'      => 'Noi dung khong duoc de trong',
        ];
    }
}
