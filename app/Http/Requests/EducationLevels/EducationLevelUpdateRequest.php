<?php

namespace App\Http\Requests\EducationLevels;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EducationLevelUpdateRequest extends FormRequest
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
            'Description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'Description.required' => 'Education level description is required'
        ];
    }
}
