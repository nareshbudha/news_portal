<?php

namespace App\Repositories;

use App\Models\Advertisement;

interface AdvertisementRepositoryInterface
{
    public function all();
    public function find($id): ?Advertisement;
    public function create(array $data): Advertisement;
    public function update(Advertisement $ad, array $data): bool;
    public function delete(Advertisement $ad): bool;
}
