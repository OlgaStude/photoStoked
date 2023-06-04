<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class paymentRequest extends FormRequest
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
            'card' => 'required| max: 9999999999999999| numeric',
            'month' => 'required| max: 31| numeric',
            'year' => 'required| max: 99| numeric',
            'cvc' => 'required| max: 999| numeric',
            'name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Пожалуйста заполните все поля',
            '*.max' => 'Значение некорректно',
            '*.numeric' => 'Значение некорректно',
        ];
    }
}
