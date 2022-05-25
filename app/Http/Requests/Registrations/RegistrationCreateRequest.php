<?php

namespace App\Http\Requests\Registrations;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RegistrationCreateRequest extends FormRequest
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
            'PaymentSlipPath' => 'required',
            'IsApproved' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'AttendeeId.required' => 'Attendee is required',
            'ConferenceId.required' => 'Conference is required',
            'PaymentSlipPath.required' => 'Payment slip is required',
            'IsApproved.required' => 'Approval status is required',
        ];
    }
}
