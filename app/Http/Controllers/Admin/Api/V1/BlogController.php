<?php

namespace App\Http\Controllers\Admin\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Requests\Api\BlogStoreRequest;
use App\Http\Requests\Api\BlogUpdateRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\uploadImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use uploadImage;
    public function index()
    {
        $blogs = Blog::all();
        return response()->json([
            'data' => $blogs,
            'message' => 'Blog list retrieved successfully.',
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['slug'] = Str::slug($data['title'], '-');
            $data['image'] = $this->uploadImage($data['image']);
            $blog = Blog::create($data);
            return response()->json([
                'data' => $blog,
                'message' => 'Blog created successfully.',
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Failed to create blog. ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::find($id);
        if (is_null($blog)) {
            return response()->json([
                'message' => 'Blog not found.',
            ], 404);
        }
        return response()->json([
            'data' => $blog,
            'message' => 'Blog retrieved successfully.',
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogUpdateRequest $request, string $id)
    {
        DB::beginTransaction();
        try {
            $blog = Blog::find($id);
            if (is_null($blog)) {
                return response()->json([
                    'message' => 'Blog not found.',
                ], 404);
            }
            $data = $request->validated();
            if (!empty($data['image'])) {
                $data['image'] = $this->uploadImage($data['image']);
            }
            $data['slug'] = Str::slug($data['title'], '-');
            $blog->update($data);
            return response()->json([
                'data' => $blog,
                'message' => 'Blog updated successfully.',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Failed to update blog. ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $blog = Blog::find($id);
            if (is_null($blog)) {
                return response()->json([
                    'message' => 'Blog not found.',
                ], 404);
            }
            if (!empty($blog->image) && file_exists($blog->image)) {
                unlink($blog->image);
            }
            $blog->delete();
            return response()->json([
                'message' => 'Blog deleted successfully.',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Failed to delete blog. ' . $e->getMessage(),
            ], 500);
        }
    }
}
