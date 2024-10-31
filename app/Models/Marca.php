<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_marca',
        'descripcion_marca',
    ];

    /**
     * Relación con los vehículos.
     * Una marca puede tener muchos vehículos.
     */
    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }
}
