<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
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
            'type' => 'required',
            'secondary_type' => 'required',
            'plate_no_en' => 'required_if:secondary_type,=,1',
            'plate_no_ar' => 'required_if:secondary_type,=,1',
            'serial_no' => 'required',
            'chassis_no' => 'required',
            'model' => 'required',
            'year' => 'required',
            'brand' => 'required',
            'color' => 'required',
            'meter_type' => 'required',
            'value' => 'required',
            'project' => 'required',
            'ownership' => 'required',
            'owner_id' => 'required',
            'ownership_status' => 'required',
            'aswaq_no' => 'required',
            'file_no' => 'required',
            'working_status' => 'required',

            'front' => 'nullable|mimes:jpeg,jpg,png,gif|max:51200', //50MB
            'back' => 'nullable|mimes:jpeg,jpg,png,gif|max:51200', //50MB
            'left' => 'nullable|mimes:jpeg,jpg,png,gif|max:51200', //50MB
            'right' => 'nullable|mimes:jpeg,jpg,png,gif|max:51200', //50MB
        ];

        return [
            'plate_no_en.required_if' => 'The plate number field is required for on-road vehicle.',
            'plate_no_ar.required_if' => 'The plate number field is required for on-road vehicle.',
            'front.max' => 'The file size may not be greater than 50MB.',
            'back.max' => 'The file size may not be greater than 50MB.',
            'left.max' => 'The file size may not be greater than 50MB.',
            'right.max' => 'The file size may not be greater than 50MB.',
        ];
    }
}
