<?php

namespace App\Http\Requests\Faqs;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FaqUpdateRequest extends FormRequest
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
            'Question' => 'required',
            'Answer' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'Question.required' => 'Question is required',
            'Answer.required' => 'Answer is required'
        ];
    }
}
