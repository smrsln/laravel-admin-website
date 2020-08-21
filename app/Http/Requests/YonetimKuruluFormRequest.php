<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YonetimKuruluFormRequest extends FormRequest
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
            'ykfoto' =>'sometimes|file|mimes:jpeg,png,jpg,gif,svg',
            'yk_ad_soyad' => 'required|string|max:50',
            'yk_ozgecmis' => 'required|string'
        ];
    }
}
