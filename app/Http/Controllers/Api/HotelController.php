<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hotel\StoreHotelRequest;
use App\Http\Requests\Hotel\UpdateHotelRequest;
use App\Services\HotelService;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    protected $hotelService;

    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }

    /**
     * Listar los hoteles de la base de datos
     *
     * @return void
     */
    public function index()
    {
        $hotels = $this->hotelService->getAllHotels();
        return response()->json($hotels);
    }

    /**
     * UMostrar hotel de la base de datos
     *
     * @param integer $id
     * @return void
     */
    public function show(int $id)
    {
        $hotel = $this->hotelService->getHotelById($id);

        if (!$hotel) {
            return response()->json(['message' => 'Hotel no encontrado'], 404);
        }

        return response()->json($hotel);
    }

    /**
     * Guardar hotel en la base de datos
     *
     * @param StoreHotelRequest $request
     * @return void
     */
    public function store(StoreHotelRequest $request)
    {
        $data = $request->validated();
        $hotel = $this->hotelService->createHotel($data);
        return response()->json($hotel, 201);
    }

    /**
     * Actualizar hotel en la base de datos
     *
     * @param UpdateHotelRequest $request
     * @param integer $id
     * @return void
     */
    public function update(UpdateHotelRequest $request, int $id)
    {
        $data = $request->validated();
        $updated = $this->hotelService->updateHotel($id, $data);

        if (!$updated) {
            return response()->json(['message' => 'Hotel no encontrado'], 404);
        }

        return response()->json(['message' => 'Hotel actualizado correctamente']);
    }

    /**
     * Eliminar hotel de la base de datos
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id)
    {
        $deleted = $this->hotelService->deleteHotel($id);

        if (!$deleted) {
            return response()->json(['message' => 'Hotel no encontrado'], 404);
        }

        return response()->json(['message' => 'Hotel eliminado correctamente']);
    }
}
