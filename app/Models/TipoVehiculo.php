<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoVehiculo extends Model
{
    use HasFactory;
    protected $table = "tipo_vehiculos";

    protected $fillable = [
        'descripcion',
        'activo'
    ];

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }
}
