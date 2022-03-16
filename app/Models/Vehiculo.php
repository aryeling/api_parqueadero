<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $table = "vehiculos";

    protected $fillable = [
        'placa',
        'color',
        'tipo_vehiculo_id',
        'marca_id',
        'propietario_id'
    ];


    public function tipoVehiculo()
    {
        return $this->belongsTo(TipoVehiculo::class);
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function propietario()
    {
        return $this->belongsTo(Propietario::class);
    }

}
