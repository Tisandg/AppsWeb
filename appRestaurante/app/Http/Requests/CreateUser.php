<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
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
            'nombres' =>'required',
            'apellidos' =>'required',
            'documentoIdentidad' =>'required',
            'nombreUsuario' =>'required',
            'password' =>'required|min:8',
            'email' =>'required|email',
        ];
    }
}
