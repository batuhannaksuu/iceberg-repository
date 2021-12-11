<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
            'name' => 'required|max:50|string',
            'surname' => 'required|max:50|string',
            'email' => 'required|email|string',
            'phone' => 'required|max:30',
            'appointment_address' => 'required',
            'appointment_date' => 'required',
            'appointment_time' => 'required',
            'post_code' => 'required'
        ];
    }
}
