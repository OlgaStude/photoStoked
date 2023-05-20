<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateDataRequest extends FormRequest
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
            'email' => 'email',
            'birthdate' => 'before:-18 years',
            'name' => 'alpha:ascii| max: 60',
            'surname' => 'alpha:ascii| max: 60',
            'pfp' => 'mimes:jpeg,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'E-mail был введён некорректно',
            'email.unique' => 'Этот E-mail уже занят',
            'nikname.unique' => 'Этот ник уже занят',
            'name.alpha' => 'Имя можно писать только буквами',
            'name.max' => 'Превышен лимит 60 символов',
            'surname.alpha' => 'Фамилию можно писать только буквами',
            'surname.max' => 'Превышен лимит 60 символов',
            'pfp.mimes' => 'Загружать можно только в форматах jpeg, png, jpg',
        ];
    }
}
