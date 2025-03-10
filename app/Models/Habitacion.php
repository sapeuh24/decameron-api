<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Modelo que representa la tabla 'habitaciones'.
 *
 * @property int $id
 * @property int $hotel_id
 * @property int $acomodacion_tipo_id
 * @property int $cantidad
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read Hotel $hotel
 * @property-read AcomodacionTipo $acomodacionTipo
 */
class Habitacion extends Model
{
    use HasFactory;

    protected $table = 'habitaciones';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<string>
     */
    protected $fillable = [
        'hotel_id',
        'acomodacion_tipo_id',
        'cantidad',
    ];

    /**
     * Obtiene el hotel asociado.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    /**
     * Obtiene el tipo de acomodación asociado.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function acomodacionTipo(): BelongsTo
    {
        return $this->belongsTo(AcomodacionTipo::class, 'acomodacion_tipo_id');
    }
}
