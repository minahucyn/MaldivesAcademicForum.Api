<?php

namespace App\Http\Requests\Conferences;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ConferenceUpdateRequest extends FormRequest
{
    public function authorize()
    {
        // if (Auth::check()) {
        //     return true;
        // }

        //return false;
        return true;
    }

    public function rules()
    {
        return [
            'Description' => 'required',
            'Venue' => 'required',
            'RegistrationStartDate' => 'required',
            'RegistrationEndDate' => 'required',
            'StartDate' => 'required',
            'EndDate' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'Description.required' => 'Description is required',
            'Venue.required' => 'Venue is required',
            'RegistrationStartDate.required' => 'Registration start date is required',
            'RegistrationEndDate.required' => 'Registration end date is required',
            'StartDate.required' => 'Start date is required',
            'EndDate.required' => 'End date is required',
        ];
    }
}
