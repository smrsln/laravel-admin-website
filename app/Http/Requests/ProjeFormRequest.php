<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjeFormRequest extends FormRequest
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
            'dernek_adi' =>'required|string|max:255',
            'dernek_adres' => 'required|string|max:255',
            'dernek_tel' => 'required|string|max:255',
            'dernek_baskan' => 'required|string|max:255',
            'proje_ozet' => 'required|string',
            'proje' => 'required|file|mimes:docx,doc,pdf,jpeg,jpg,png'
        ];
    }
}
