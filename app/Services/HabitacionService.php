<?php

namespace App\Services;

use App\Repositories\HabitacionRepository;
use App\Repositories\HotelRepository;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HabitacionService
{
    protected $habitacionRepository;
    protected $hotelRepository;

    /**
     * Constructor del servicio de habitaciones.
     *
     * @param HabitacionRepository $habitacionRepository
     * @param HotelRepository $hotelRepository
     */
    public function __construct(HabitacionRepository $habitacionRepository, HotelRepository $hotelRepository)
    {
        $this->habitacionRepository = $habitacionRepository;
        $this->hotelRepository = $hotelRepository;
    }

    /**
     * Obtener todas las habitaciones de un hotel específico.
     *
     * @param int $hotelId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getHabitacionesPorHotel(int $hotelId)
    {
        return $this->habitacionRepository->getByHotel($hotelId);
    }

    /**
     * Actualizar habitaciones en bloque de un hotel sin eliminar todo.
     *
     * @param array $data ['hotel_id' => int, 'habitaciones' => array]
     * @return array
     *
     * @throws ValidationException Si el hotel no existe o si se excede el número máximo de habitaciones.
     */
    public function actualizarHabitaciones(array $data)
    {
        if (!isset($data['hotel_id'])) {
            throw ValidationException::withMessages([
                'hotel_id' => ['El campo hotel_id es obligatorio.']
            ]);
        }

        $hotel = $this->hotelRepository->find($data['hotel_id']);
        if (!$hotel) {
            throw new ModelNotFoundException('Hotel no encontrado.');
        }

        $acomodacionesIds = array_column($data['habitaciones'], 'acomodacion_tipo_id');
        if (count($acomodacionesIds) !== count(array_unique($acomodacionesIds))) {
            throw ValidationException::withMessages([
                'habitaciones' => ['No debe haber tipos de habitaciones y acomodaciones repetidas para el mismo hotel.']
            ]);
        }

        $habitacionesActuales = $this->habitacionRepository->getByHotel($data['hotel_id'])
            ->keyBy('acomodacion_tipo_id');

        $totalNuevo = array_sum(array_column($data['habitaciones'], 'cantidad'));

        if ($totalNuevo > $hotel->numero_habitaciones) {
            throw ValidationException::withMessages([
                'cantidad' => ['El hotel ha alcanzado su capacidad máxima de habitaciones.']
            ]);
        }

        $acomodacionesEnviadas = collect($data['habitaciones'])->keyBy('acomodacion_tipo_id');

        foreach ($habitacionesActuales as $acomodacionTipoId => $habitacion) {
            if ($acomodacionesEnviadas->has($acomodacionTipoId)) {
                $nuevaCantidad = $acomodacionesEnviadas[$acomodacionTipoId]['cantidad'];

                if ($habitacion->cantidad !== $nuevaCantidad) {
                    $this->habitacionRepository->update($habitacion->id, [
                        'cantidad' => $nuevaCantidad
                    ]);
                }
            } else {
                $this->habitacionRepository->delete($habitacion->id);
            }
        }

        foreach ($acomodacionesEnviadas as $acomodacionTipoId => $habitacion) {
            if (!$habitacionesActuales->has($acomodacionTipoId)) {
                $this->habitacionRepository->create([
                    'hotel_id' => $data['hotel_id'],
                    'acomodacion_tipo_id' => $acomodacionTipoId,
                    'cantidad' => $habitacion['cantidad']
                ]);
            }
        }

        return [
            'message' => 'Habitaciones actualizadas correctamente.'
        ];
    }
}
