<?php

namespace App\Http\Requests\Speakers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SpeakerCreateRequest extends FormRequest
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
            'Designation' => 'required',
            'Description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'Fullname.required' => 'Fullname is required',
            'Designation.required' => 'Designation is required',
            'Description.required' => 'Description is required'
        ];
    }
}
