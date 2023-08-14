<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:15',
            'email' => 'required|email:rfc',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->letters()->numbers(),
            ],
            'password_confirmation' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'お名前',
        ];
    }

    public function message()
    {
        return [
            'password.confirmed' => 'パスワードとパスワード確認が一致しません。'
        ];
    }
}
