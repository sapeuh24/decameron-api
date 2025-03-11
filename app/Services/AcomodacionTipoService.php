<?php

namespace App\Services;

use App\Repositories\AcomodacionTipoRepository;

class AcomodacionTipoService
{
    protected $acomodacionTipoRepository;

    /**
     * Constructor del servicio de relaciones entre tipos de habitación y acomodaciones.
     *
     * @param AcomodacionTipoRepository $acomodacionTipoRepository
     */
    public function __construct(AcomodacionTipoRepository $acomodacionTipoRepository)
    {
        $this->acomodacionTipoRepository = $acomodacionTipoRepository;
    }

    /**
     * Obtener todas las relaciones entre tipos de habitación y acomodaciones.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAcomodacionesTipos()
    {
        return $this->acomodacionTipoRepository->getAcomodacionesTipos();
    }
}
