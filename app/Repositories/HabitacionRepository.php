<?php

namespace App\Repositories;

use App\Models\Habitacion;
use Illuminate\Database\Eloquent\Collection;

class HabitacionRepository
{
    protected $model;

    /**
     * Constructor del repositorio de habitaciones.
     *
     * @param Habitacion $model
     */
    public function __construct(Habitacion $model)
    {
        $this->model = $model;
    }

    /**
     * Obtener todas las habitaciones de un hotel.
     *
     * @param int $hotelId
     * @return Collection
     */
    public function getByHotel(int $hotelId): Collection
    {
        return $this->model->where('hotel_id', $hotelId)->get();
    }

    /**
     * Crear una nueva habitación.
     *
     * @param array $data
     * @return Habitacion
     */
    public function create(array $data): Habitacion
    {
        return $this->model->create($data);
    }

    /**
     * Actualizar una habitación existente.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        $habitacion = $this->model->find($id);
        return $habitacion ? $habitacion->update($data) : false;
    }

    /**
     * Eliminar una habitación por su ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $habitacion = $this->model->find($id);
        return $habitacion ? $habitacion->delete() : false;
    }

    /**
     * Eliminar todas las habitaciones de un hotel.
     *
     * @param int $hotelId
     * @return int Número de registros eliminados
     */
    public function deleteByHotel(int $hotelId): int
    {
        return $this->model->where('hotel_id', $hotelId)->delete();
    }

    /**
     * Obtener la cantidad total de habitaciones registradas para un hotel.
     *
     * @param int $hotelId
     * @return int
     */
    public function sumCantidadByHotel(int $hotelId): int
    {
        return $this->model->where('hotel_id', $hotelId)->sum('cantidad');
    }
}
