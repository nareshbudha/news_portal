<?php

namespace App\Repositories;

use App\Models\PostCategory;

class PostCategoryRepository implements PostCategoryRepositoryInterface
{
    public function all()
    {
        return PostCategory::all();
    }

    public function find($id): ?PostCategory
    {
        return PostCategory::find($id);
    }

    public function create(array $data): PostCategory
    {
        return PostCategory::create($data);
    }

    public function update(PostCategory $postCategory, array $data): bool
    {
        return $postCategory->update($data);
    }

    public function delete(PostCategory $postCategory): bool
    {
        return $postCategory->delete();
    }
    public function catedata()
    {
        $postCategories = PostCategory::where('id', '!=', null)->get();
        return $postCategories;
    }
}
