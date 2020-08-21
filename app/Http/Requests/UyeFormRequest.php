<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UyeFormRequest extends FormRequest
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
            'dernek_no' => 'required|string|max:255',
            'dernek_adres' => 'required|string|max:255',
            'dernek_tel' => 'required|string|max:255',
            'dernek_baskan' => 'required|string|max:255',
            'dernek_amac' => 'string',
            'dilekce' => 'required|file|mimes:docx,doc,pdf,jpeg,jpg,png',
            'faaliyet_belgesi' => 'required|file|mimes:docx,doc,pdf,jpeg,jpg,png',
            'ucuncu_karar' => 'required|file|mimes:docx,doc,pdf,jpeg,jpg,png',
            'imza_sirku' => 'required|file|mimes:docx,doc,pdf,jpeg,jpg,png',
            'delege_bilgi' => 'required|file|mimes:docx,doc,pdf,jpeg,jpg,png'
        ];
    }
}
