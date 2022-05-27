<?php

namespace App\Http\Requests\Conferences;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ConferencePhotoCreateRequest extends FormRequest
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
        return [];
    }

    public function messages()
    {
        return [];
    }
}
