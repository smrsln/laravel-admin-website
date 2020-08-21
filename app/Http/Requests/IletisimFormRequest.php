<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IletisimFormRequest extends FormRequest
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
            'isim' =>'required|string|max:75',
            'email' => 'required|email',
            'konu' => 'required|string|max:180',
            'mesaj' => 'required|string',
        ];
    }
}
