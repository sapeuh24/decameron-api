<?php

namespace App\Repositories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Collection;

class HotelRepository
{
    protected $model;

    public function __construct(Hotel $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->with('municipio')->get();
    }

    public function find(int $id): ?Hotel
    {
        return $this->model->with('municipio')->find($id);
    }

    public function create(array $data): Hotel
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->model->find($id)->update($data);
    }

    public function delete(int $id): bool
    {
        return $this->model->find($id)->delete();
    }
}
