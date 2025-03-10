<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\HabitacionService;
use App\Http\Requests\Habitacion\HabitacionRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    protected $habitacionService;

    /**
     * Constructor del controlador de habitaciones.
     *
     * @param HabitacionService $habitacionService
     */
    public function __construct(HabitacionService $habitacionService)
    {
        $this->habitacionService = $habitacionService;
    }

    /**
     * Obtener todas las habitaciones de un hotel específico.
     *
     * @param int $hotelId
     * @return JsonResponse
     */
    public function getByHotel(int $hotelId): JsonResponse
    {
        $habitaciones = $this->habitacionService->getHabitacionesPorHotel($hotelId);

        return response()->json([
            'message' => 'Habitaciones obtenidas correctamente.',
            'data' => $habitaciones
        ]);
    }

    /**
     * Actualizar habitaciones en bloque para un hotel.
     *
     * @param UpdateHabitacionRequest $request
     * @return JsonResponse
     */
    public function update(HabitacionRequest $request): JsonResponse
    {
        $data = $request->validated();
        $resultado = $this->habitacionService->actualizarHabitaciones($data);

        return response()->json($resultado);
    }
}
