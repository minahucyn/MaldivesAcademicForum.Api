<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Full name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ];
    }
}
