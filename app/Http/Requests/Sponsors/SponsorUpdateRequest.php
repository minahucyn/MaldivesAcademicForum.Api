<?php

namespace App\Http\Requests\Sponsors;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SponsorUpdateRequest extends FormRequest
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
            'LogoUri' => 'required',
            'Description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'LogoUri.required' => 'Logo Uri is required',
            'Description.required' => 'Description is required'
        ];
    }
}
