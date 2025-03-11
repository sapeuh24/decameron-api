<?php

namespace App\Services;

use App\Repositories\MunicipioRepository;

class MunicipioService
{
    protected $municipioRepository;

    public function __construct(MunicipioRepository $municipioRepository)
    {
        $this->municipioRepository = $municipioRepository;
    }

    /**
     * Obtener todos los municipios.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllMunicipios()
    {
        return $this->municipioRepository->all();
    }
}
