<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehiculo_id',
        'fecha_mantenimiento',
        'kilometraje_mantenimiento',
        'tipo_mantenimiento',
        'costo_mantenimiento',
        'descripcion_mantenimiento',
    ];

    /**
     * Relación con el vehículo.
     * Un mantenimiento pertenece a un vehículo.
     */
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }
}
