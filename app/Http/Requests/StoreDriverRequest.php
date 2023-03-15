<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriverRequest extends FormRequest
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
            'file_no' => 'required|unique:drivers,file_no',
            'name_en' => 'required',
            'name_ar' => 'required',
            'license' => 'required|unique:drivers,license',
            'iqama' => 'required|unique:drivers,iqama',
            'photo' => 'required|mimes:jpeg,jpg,png,gif|max:51200', //50MB
        ];
    }

    public function messages()
    {
        return [
            'photo.max' => 'The file size may not be greater than 50MB.',
        ];
    }
}
