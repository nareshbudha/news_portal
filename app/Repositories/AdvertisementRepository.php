<?php

namespace App\Repositories;

use App\Models\Advertisement;
use App\Repositories\AdvertisementRepositoryInterface;

class AdvertisementRepository implements AdvertisementRepositoryInterface
{
    public function all()
    {
        return Advertisement::select('id', 'title', 'link', 'position', 'image', 'status')->get();
    }

    public function find($id): ?Advertisement
    {
        return Advertisement::find($id);
    }

    public function create(array $data): Advertisement
    {
        return Advertisement::create($data);
    }

    public function update(Advertisement $ad, array $data): bool
    {
        return $ad->update($data);
    }

    public function delete(Advertisement $ad): bool
    {
        return $ad->delete();
    }
}
