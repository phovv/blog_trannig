<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;
use Config\Constants\Messages;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required','max:20'],
        ];
    }
    public function messages()
    {
        return [
            'email.required' => Messages::getMessage('ECL001', ['Email']),
            'email.email' => Messages::getMessage('ECL002'),
            'password.required' => Messages::getMessage('ECL001', ['Password']),
        ];
    }
}
