<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GuardarVehiculoRequest extends FormRequest
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
            'placa' => 'required|unique:vehiculos,placa',
            'color'  => 'required',
            'tipo_vehiculo' => 'required|exists:tipo_vehiculos,id',
            'marca' => 'required|exists:marcas,id',
            'propietario' => 'required',
            'propietario.cedula' => 'required|unique:propietarios,cedula',
            'propietario.nombre' => 'required',
            'propietario.apellido' => 'required',
            'propietario.sexo' => [
                'required',
                Rule::in(['Femenino', 'Masculino']),
            ],
            'propietario.fecha_nac' => 'date',
            'propietario.telefono' => 'required',
            'propietario.correo' => 'required|email'
        ];
    }
}
