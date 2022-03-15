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
            'tipo_vehiculo_id' => 'required|exists:tipo_vehiculos,id',
            'marca_id' => 'required|exists:marcas,id',
            'propietario_id' => 'required',
            'propietario_id.cedula' => 'required|unique:propietarios,cedula',
            'propietario_id.nombre' => 'required',
            'propietario_id.apellido' => 'required',
            'propietario_id.sexo' => [
                'required',
                Rule::in(['Femenino', 'Masculino']),
            ],
            'propietario_id.fecha_nac' => 'date',
            'propietario_id.telefono' => 'required',
            'propietario_id.correo' => 'required|email'
        ];
    }
}
