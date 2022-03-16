<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;
    protected $table = "propietarios";

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'sexo',
        'fecha_nac',
        'telefono',
        'correo'
    ];

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }
}
