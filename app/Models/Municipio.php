<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modelo que representa la tabla 'municipios'.
 *
 * @property int $id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Hotel[] $hoteles
 */
class Municipio extends Model
{
    use HasFactory;

    /**
     * Apuntamiento a la tabla municipios
     *
     * @var string
     */
    protected $table = "municipios";

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nombre',
    ];

    /**
     * Obtiene los hoteles asociados al municipio.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hoteles(): HasMany
    {
        return $this->hasMany(Hotel::class, 'municipio_id');
    }
}
