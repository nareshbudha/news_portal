<?php

namespace App\Repositories;

use App\Models\SiteSetting;

interface SiteSettingInterface
{
    public function all();
    public function find($id): ?SiteSetting;
    public function create(array $data): SiteSetting;
    public function update(SiteSetting $postCategory, array $data): bool;
    public function delete(SiteSetting $postCategory): bool;
}
