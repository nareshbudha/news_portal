<?php

namespace App\Repositories;

use App\Models\SiteSetting;
use App\Repositories\SiteSettingInterface;

class SiteSettingRepository implements SiteSettingInterface
{
    public function all()
    {
        return SiteSetting::all();
    }

    public function find($id): ?SiteSetting
    {
        return SiteSetting::find($id);
    }

    public function create(array $data): SiteSetting
    {
        return SiteSetting::create($data);
    }

    public function update(SiteSetting $postCategory, array $data): bool
    {
        return $postCategory->update($data);
    }

    public function delete(SiteSetting $postCategory): bool
    {
        return $postCategory->delete();
    }
}
