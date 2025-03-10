<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modelo que representa la tabla 'acomodaciones'.
 *
 * @property int $id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|AcomodacionTipo[] $acomodacionesTipos
 */
class Acomodacion extends Model
{
    use HasFactory;

    protected $table = 'Acomodaciones';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nombre',
    ];

    /**
     * Obtiene las combinaciones de tipos de habitación y acomodaciones.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function acomodacionesTipos(): HasMany
    {
        return $this->hasMany(AcomodacionTipo::class, 'acomodacion_id');
    }
}
