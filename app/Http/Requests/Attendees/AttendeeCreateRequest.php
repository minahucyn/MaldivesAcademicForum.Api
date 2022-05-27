<?php

namespace App\Http\Requests\Attendees;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AttendeeCreateRequest extends FormRequest
{
    public function authorize()
    {
        if (Auth::check()) {
            return true;
        }

        return false;
    }

    public function rules()
    {
        return [
            'Fullname' => 'required',
            'NidPp' => 'required',
            'Birthdate' => 'required',
            'ContactNumber' => 'required',
            'Email' => "unique:attendees,email,$this->Id,Id",
            'EducationId' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'Fullname.required' => 'Fullname is required',
            'NidPp.required' => 'NID / PP No is required',
            'Birthdate.required' => 'Birthdate is required',
            'ContactNumber.required' => 'Contact number is required',
            'Email.required' => 'Email is required',
            'EducationId.required' => 'Education level is required',
        ];
    }
}
