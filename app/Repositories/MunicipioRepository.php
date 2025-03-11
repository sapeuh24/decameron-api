<?php

namespace App\Repositories;

use App\Models\Municipio;
use Illuminate\Database\Eloquent\Collection;

class MunicipioRepository
{
    protected $model;

    public function __construct(Municipio $model)
    {
        $this->model = $model;
    }

    /**
     * Obtener todos los municipios.
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->orderBy('municipio')->get();
    }
}
