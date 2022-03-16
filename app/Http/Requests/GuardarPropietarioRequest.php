<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GuardarPropietarioRequest extends FormRequest
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
            'cedula' => 'required|unique:propietarios,cedula',
            'nombre' => 'required',
            'apellido' => 'required',
            'sexo' => [
                'required',
                Rule::in(['Femenino', 'Masculino']),
            ],
            'fecha_nac' => 'required|date',
            'telefono' => 'required',
            'correo' => 'required|email'
        ];
    }
}
