<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSettingRequest extends FormRequest
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
            'config_key' => 'required|unique:settings|max:255',
            'config_value' => 'required|unique:settings|max:255',
        ];
    }
    public function messages()
{
    return [
        'config_key.required' => 'Config_key không được để trống',
        'config_key.max' => 'Config_key không được quá 255 kí tự',
        'config_value.required' => 'Config_value không được để trống',
        'config_value.max' => 'Config_value không được quá 255 kí tự',
        
    ];
}
}
