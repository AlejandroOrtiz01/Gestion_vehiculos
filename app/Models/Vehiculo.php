<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'placa_vehiculo',
        'marca_id',
        'modelo_vehiculo',
        'color_vehiculo',
        'propietario_vehiculo',
        'estado_vehiculo',
        'vin',                    /* requerido para el examen */
    ];

    /**
     * Relación con la marca.
     * Un vehículo pertenece a una marca.
     */
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    /**
     * Relación con los mantenimientos.
     * Un vehículo puede tener muchos mantenimientos.
     */
    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class);
    }
}
