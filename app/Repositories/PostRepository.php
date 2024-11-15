<?php

namespace App\Repositories;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Repositories\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function all($perPage = 10)
    {
        return Post::paginate($perPage);
    }

    public function find($id)
    {
        return Post::find($id);
    }

    public function create(array $data)
    {
        $post = new Post();
        $post->fill($data);
        $post->status = ($data['status'] == 0) ? 'draft' : 'published';
        $post->published_at = Carbon::now();
        $post->slug = Str::slug($data['title']);
        $post->save();

        return $post;
    }

    public function update(Post $post, array $data)
    {
        $post->fill($data);
        $status = isset($data['status']) ? $data['status'] : 0;
        $post->status = ($status == 0) ? 'draft' : 'published';
        if ($post->status === 'published') {
            $post->published_at = Carbon::now();
        }
        $post->slug = Str::slug($data['slug']);
        $post->save();

        return $post;
    }

    public function delete(Post $post)
    {
        $post->delete();
    }
}
