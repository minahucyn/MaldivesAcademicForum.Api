<?php

namespace App\Http\Requests\Registrations;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RegistrationUpdateRequest extends FormRequest
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
            'AttendeeId' => 'required',
            'ConferenceId' => 'required',
            'IsApproved' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'AttendeeId.required' => 'Attendee is required',
            'ConferenceId.required' => 'Conference is required',
            'IsApproved.required' => 'Approval status is required',
        ];
    }
}
