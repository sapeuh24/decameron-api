<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AcomodacionTipoService;
use Illuminate\Http\JsonResponse;

class AcomodacionTipoController extends Controller
{
    protected $acomodacionTipoService;

    /**
     * Constructor del controlador de relaciones entre tipos de habitación y acomodaciones.
     *
     * @param AcomodacionTipoService $acomodacionTipoService
     */
    public function __construct(AcomodacionTipoService $acomodacionTipoService)
    {
        $this->acomodacionTipoService = $acomodacionTipoService;
    }

    /**
     * Obtener todas las relaciones entre tipos de habitación y acomodaciones.
     *
     * @return JsonResponse
     */
    public function getAcomodacionesTipos(): JsonResponse
    {
        $acomodacionesTipos = $this->acomodacionTipoService->getAcomodacionesTipos();

        return response()->json([
            'message' => 'Relaciones obtenidas correctamente.',
            'data' => $acomodacionesTipos
        ]);
    }
}
