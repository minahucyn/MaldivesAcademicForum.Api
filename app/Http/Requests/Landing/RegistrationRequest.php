<?php

namespace App\Http\Requests\Landing;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RegistrationRequest extends FormRequest
{

    protected $redirect = '/#register';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Fullname' => 'required|string|max:100',
            'NidPp' => 'required|string|min:3|max:20',
            'Birthdate' => 'required|before:15 years ago',
            'ContactNumber' => 'required',
            'Email' => 'required|string|email|max:100',
            'EducationId' => 'required|integer',
            'PaymentSlip' => 'required|image|mimes:jpeg,png,jpg',
            'ConferenceId' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'Fullname.required' => 'Full name is required',
            'Fullname.human_name' => 'Fullname cannot have numbers!',
            'NidPp.required' => 'NID / PP is required',
            'Birthdate.required' => 'Birthdate is required',
            'Birthdate.before' => 'You must be atleast 15 years old to register for the conference.',
            'ContactNumber.required' => 'Contact number is required',
            'Email.required' => 'Email is required',
            'EducationId.required' => 'Education level is required',
            'PaymentSlip.required' => 'Payment slip is required',
            'ConferenceId.required' => 'Conference is required'
        ];
    }
}
