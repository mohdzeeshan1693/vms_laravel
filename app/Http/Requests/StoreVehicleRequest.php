<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
            'plate_no_en.required_if' => 'The plate number field is required for on-road vehicle.',
            'plate_no_ar.required_if' => 'The plate number field is required for on-road vehicle.',
        ];
    }
}
