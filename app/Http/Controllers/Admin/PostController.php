<?php

namespace App\Http\Controllers\Admin;

use App\Models\Authors;
use App\Models\PostCategory;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Repositories\PostRepositoryInterface;
use App\Traits\UploadImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    use UploadImage;

    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->all();
        return view('home.post.all_post', compact('posts'));
    }

    public function addPost()
    {
        $authors = Authors::all();
        $post_category = PostCategory::all();
        return view('home.post.add_post', compact('authors', 'post_category'));
    }

    public function store(PostStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['is_featured'] = $request->has('is_featured') ? 1 : 0;

            if (!empty($data['featured_image'])) {
                $data['featured_image'] = $this->uploadFeaturedImage($data['featured_image']);
            }

            if ($request->hasFile('images')) {
                $newImages = [];
                foreach ($request->file('images') as $image) {
                    $newImages[] = $this->uploadPostImages($image);
                }
                $data['images'] = json_encode($newImages);
            }

            $this->postRepository->create($data);

            DB::commit();
            return redirect()->route('all.post')->with('success', 'Post created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all.post')->with('error', 'Failed to create post.');
        }
    }

    public function edit($id)
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            return redirect()->route('all.post')->with('error', 'Post not found.');
        }
        $authors = Authors::all();
        $post_category = PostCategory::all();
        return view('home.post.edit_post', compact('post', 'authors', 'post_category'));
    }

    public function update(PostUpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            $post = $this->postRepository->find($request->id);
            if (!$post) {
                return redirect()->route('all.post')->with('error', 'Post not found.');
            }

            $data = $request->validated();
            $data['is_featured'] = $request->has('is_featured') ? 1 : 0;

            if (!empty($data['featured_image'])) {
                if (file_exists(public_path($post->featured_image))) {
                    unlink(public_path($post->featured_image));
                }
                $data['featured_image'] = $this->uploadFeaturedImage($data['featured_image']);
            }

            if ($request->hasFile('images')) {
                $existingImages = json_decode($post->images, true) ?? [];
                $newImages = array_map(function ($image) {
                    return $this->uploadPostImages($image);
                }, $request->file('images'));
                $data['images'] = json_encode(array_merge($existingImages, $newImages));
            }

            $this->postRepository->update($post, $data);

            DB::commit();
            return redirect()->route('all.post')->with('success', 'Post updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all.post')->with('error', 'Failed to update post.');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $post = $this->postRepository->find($id);
            if (!$post) {
                return redirect()->route('all.post')->with('error', 'Post not found.');
            }

            if (!empty($post->featured_image) && file_exists(public_path($post->featured_image))) {
                unlink(public_path($post->featured_image));
            }

            if (!empty($post->images)) {
                $images = json_decode($post->images, true);
                foreach ($images as $image) {
                    if (!empty($image) && file_exists(public_path($image))) {
                        unlink(public_path($image));
                    }
                }
            }

            $this->postRepository->delete($post);

            DB::commit();
            return redirect()->route('all.post')->with('success', 'Post deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all.post')->with('error', 'Failed to delete post.');
        }
    }
}
