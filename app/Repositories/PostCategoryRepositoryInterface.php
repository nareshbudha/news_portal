<?php

namespace App\Repositories;

use App\Models\PostCategory;

interface PostCategoryRepositoryInterface
{
    public function all();
    public function catedata();
    public function find($id): ?PostCategory;
    public function create(array $data): PostCategory;
    public function update(PostCategory $postCategory, array $data): bool;
    public function delete(PostCategory $postCategory): bool;
}
