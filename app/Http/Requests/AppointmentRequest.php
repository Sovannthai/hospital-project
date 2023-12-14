<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'pataint_id'=>'required',
            'appointment_date'=>'required',
            'disease_id'=>'required',
            'doctor_id'=>'required',
            'nurse_id'=>'required',
            'doctor_id'=>'required'
        ];
    }
}
