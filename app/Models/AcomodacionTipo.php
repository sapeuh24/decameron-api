<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Modelo que representa la tabla 'acomodaciones_tipos'.
 *
 * @property int $id
 * @property int $tipo_habitacion_id
 * @property int $acomodacion_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read TipoHabitacion $tipoHabitacion
 * @property-read Acomodacion $acomodacion
 */
class AcomodacionTipo extends Model
{
    use HasFactory;

    protected $table = 'acomodaciones_tipos';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<string>
     */
    protected $fillable = [
        'tipo_habitacion_id',
        'acomodacion_id',
    ];

    /**
     * Obtiene el tipo de habitación asociado.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoHabitacion(): BelongsTo
    {
        return $this->belongsTo(TipoHabitacion::class, 'tipo_habitacion_id');
    }

    /**
     * Obtiene la acomodación asociada.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function acomodacion(): BelongsTo
    {
        return $this->belongsTo(Acomodacion::class, 'acomodacion_id');
    }
}
