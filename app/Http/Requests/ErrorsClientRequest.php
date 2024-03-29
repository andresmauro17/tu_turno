<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorsClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'lastname' => 'required',
            'phone_number' => 'required|numeric',
            'type_dni' => 'required',
            'dni' => 'required|numeric',
            'sex' => 'required',
        ];
    }
}
