<?php

namespace App\Http\Requests;
use Illuminate\Support\Str;

use Illuminate\Foundation\Http\FormRequest;

class sendRequest extends FormRequest
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
            'material' => 'required| mimes:jpg,jpeg,png,svg,mp4,avi,mkv',
            'tags' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tags.required' => 'введите хотябы одну метку',
            'material.required' => 'вы забыли добавить материал',
            'material.mimes' => 'Можно отправлять только в фотматах: jpg, jpeg, png, svg, mp4, avi, mkv'
        ];

    }

}
