<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UyeEtkinlikFormRequest extends FormRequest
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
            'gorsel' =>'nullable|file|mimes:jpeg,png,jpg,gif,svg',
            'baslik' => 'required|string|max:255',
            'yazi' => 'required|string',
            'foto' =>'nullable'
        ];
    }
}
