<?php

namespace App\Repositories;

use App\Models\Pages;
use App\Repositories\PageRepositoryInterface;

class PageRepository implements PageRepositoryInterface
{
    public function all()
    {
        return Pages::all();
    }

    public function find($id): ?Pages
    {
        return Pages::find($id);
    }

    public function create(array $data): Pages
    {
        return Pages::create($data);
    }

    public function update(Pages $page, array $data): bool
    {
        return $page->update($data);
    }

    public function delete(Pages $page): bool
    {
        return $page->delete();
    }
}
