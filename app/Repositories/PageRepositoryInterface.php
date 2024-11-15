<?php

namespace App\Repositories;

use App\Models\Pages;

interface PageRepositoryInterface
{
    public function all();
    public function find($id): ?Pages;
    public function create(array $data): Pages;
    public function update(Pages $page, array $data): bool;
    public function delete(Pages $page): bool;
}
