<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyFormCitizenRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'last_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'patronymic_name' => 'required|max:255',
            'date_birth' => 'required',
            'phone' => 'required'
        ];
    }
}
