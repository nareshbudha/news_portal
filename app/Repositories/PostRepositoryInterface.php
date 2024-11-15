<?php

namespace App\Repositories;

use App\Models\Post;

interface PostRepositoryInterface
{
    public function all($perPage = 10);
    public function find($id);
    public function create(array $data);
    public function update(Post $post, array $data);
    public function delete(Post $post);
}
