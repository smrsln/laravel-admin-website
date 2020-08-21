<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SayacFormRequest extends FormRequest
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
            'uyedernek' =>'required|string|max:7',
            'uyefederasyon' => 'required|string|max:7',
            'uyekonfederasyon' => 'required|string|max:7',
            'ziyaretci' => 'required|string|max:7'
        ];
    }
}
