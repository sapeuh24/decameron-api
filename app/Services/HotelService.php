<?php

namespace App\Services;

use App\Repositories\HotelRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Hotel;

class HotelService
{
    protected $hotelRepository;

    public function __construct(HotelRepository $hotelRepository)
    {
        $this->hotelRepository = $hotelRepository;
    }

    public function getAllHotels(): Collection
    {
        return $this->hotelRepository->all();
    }

    public function getHotelById(int $id): ?Hotel
    {
        return $this->hotelRepository->find($id);
    }

    public function createHotel(array $data): Hotel
    {
        return $this->hotelRepository->create($data);
    }

    public function updateHotel(int $id, array $data): bool
    {
        return $this->hotelRepository->update($id, $data);
    }

    public function deleteHotel(int $id): bool
    {
        return $this->hotelRepository->delete($id);
    }
}
