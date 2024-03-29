<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationValidationRequest extends FormRequest
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
            'email' => 'required| email| unique:users',
            'nikname' => 'required| unique:users',
            'birthdate' => 'required| before:-18 years',
            'pfp' => 'required| mimes:jpeg,png,jpg',
            'password' => 'required| min: 8',
            'password_check' => 'same:password'
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'E-mail был введён некорректно',
            'email.unique' => 'Этот E-mail уже занят',
            'nikname.unique' => 'Этот ник уже занят',
            'password.min' => 'Пароль должен быть не менее 8 символов',
            'pfp.mimes' => 'Загружать можно только в форматах jpeg, png, jpg',
            'password_check.same' => 'Пароли не совпадают',
            '*.required' => 'Пожалуйста, заполните это поле'
        ];
    }
}
