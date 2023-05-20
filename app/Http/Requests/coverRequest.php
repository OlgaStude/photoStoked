<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class coverRequest extends FormRequest
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
            'cover' => 'required| mimes:jpeg,png,jpg'
        ];
    }

    public function messages()
    {
        return [
            'cover.required' => 'Выберите фото для обложки',
            'cover.mimes' => 'Загружать можно только в форматах jpeg, png, jpg',
        ];
    }
}