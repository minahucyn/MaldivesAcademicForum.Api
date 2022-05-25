<?php

namespace App\Http\Requests\Topics;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TopicUpdateRequest extends FormRequest
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
            'Description' => 'required',
            'SpeakerId' => 'required',
            'ConferenceId' => 'required',
            'Location' => 'required',
            'StartDate' => 'required',
            'EndDate' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'Description.required' => 'Fullname is required',
            'SpeakerId.required' => 'Designation is required',
            'ConferenceId.required' => 'Description is required',
            'Location.required' => 'Description is required',
            'StartDate.required' => 'Description is required',
            'EndDate.required' => 'Description is required'
        ];
    }
}
