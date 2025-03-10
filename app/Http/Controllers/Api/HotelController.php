<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hotel\StoreHotelRequest;
use App\Http\Requests\Hotel\UpdateHotelRequest;
use App\Services\HotelService;

class HotelController extends Controller
{
    protected $hotelService;

    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }

    /**
     * Listar los hoteles de la base de datos
     */
    public function index()
    {
        return $this->hotelService->getAllHotels();
    }

    /**
     * Mostrar hotel de la base de datos
     */
    public function show(int $id)
    {
        return $this->hotelService->getHotelById($id);
    }

    /**
     * Guardar hotel en la base de datos
     */
    public function store(StoreHotelRequest $request)
    {
        return $this->hotelService->createHotel($request->validated());
    }

    /**
     * Actualizar hotel en la base de datos
     */
    public function update(UpdateHotelRequest $request, int $id)
    {
        return $this->hotelService->updateHotel($id, $request->validated());
    }

    /**
     * Eliminar hotel de la base de datos
     */
    public function destroy(int $id)
    {
        return $this->hotelService->deleteHotel($id);
    }
}
