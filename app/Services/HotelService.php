<?php

namespace App\Services;

use App\Repositories\HotelRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HotelService
{
    protected $hotelRepository;

    public function __construct(HotelRepository $hotelRepository)
    {
        $this->hotelRepository = $hotelRepository;
    }

    public function getAllHotels()
    {
        return $this->hotelRepository->all();
    }

    public function getHotelById($id)
    {
        $hotel = $this->hotelRepository->find($id);

        if (!$hotel) {
            throw new ModelNotFoundException('Hotel no encontrado.');
        }

        return $hotel;
    }

    public function createHotel(array $data)
    {
        $hotel = $this->hotelRepository->create($data);

        return [
            'message' => 'Hotel registrado correctamente.',
            'data' => $hotel
        ];
    }

    public function updateHotel($id, array $data)
    {
        $updated = $this->hotelRepository->update($id, $data);

        if (!$updated) {
            throw new ModelNotFoundException('Hotel no encontrado.');
        }

        return [
            'message' => 'Hotel actualizado correctamente.',
            'data' => $this->hotelRepository->find($id)
        ];
    }

    public function deleteHotel($id)
    {
        $deleted = $this->hotelRepository->delete($id);

        if (!$deleted) {
            throw new ModelNotFoundException('Hotel no encontrado.');
        }

        return [
            'message' => 'Hotel eliminado correctamente.'
        ];
    }
}
