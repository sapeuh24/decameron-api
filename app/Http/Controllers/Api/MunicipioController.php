<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\MunicipioService;
use Illuminate\Http\JsonResponse;

class MunicipioController extends Controller
{
    protected $municipioService;

    public function __construct(MunicipioService $municipioService)
    {
        $this->municipioService = $municipioService;
    }

    /**
     * Obtener la lista de municipios.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->municipioService->getAllMunicipios());
    }
}
