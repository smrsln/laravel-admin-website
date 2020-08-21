<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MisyonFormRequest extends FormRequest
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
            'misyonfoto' =>'nullable|file|mimes:jpeg,png,jpg,gif,svg',
            'yazi' => 'required|string'
        ];
    }
}
