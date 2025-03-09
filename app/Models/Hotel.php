<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modelo que representa la tabla 'hoteles'.
 *
 * @property int $id
 * @property string $nombre
 * @property string $direccion
 * @property int $municipio_id
 * @property string $nit
 * @property int $numero_habitaciones
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Habitacion[] $habitaciones
 */
class Hotel extends Model
{
    use HasFactory;

    /**
     * apuntamiento a la tabla hoteles
     *
     * @var string
     */
    protected $table = "hoteles";

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nombre',
        'direccion',
        'municipio_id',
        'nit',
        'numero_habitaciones',
    ];

    /**
     * Obtiene las habitaciones asociadas al hotel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function habitaciones(): HasMany
    {
        return $this->hasMany(Habitacion::class);
    }
}
