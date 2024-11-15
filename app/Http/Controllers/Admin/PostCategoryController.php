<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostCategoryStoreRequest;
use App\Http\Requests\PostCategoryUpdateRequest;
use App\Traits\UploadImage;
use App\Http\Controllers\Controller;
use App\Repositories\PostCategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostCategoryController extends Controller
{
    use UploadImage;

    protected $postCategoryRepository;

    public function __construct(PostCategoryRepositoryInterface $postCategoryRepository)
    {
        $this->postCategoryRepository = $postCategoryRepository;
    }

    public function index()
    {
        $postCategories = $this->postCategoryRepository->all();
        return view('home.postCategories.all_categories', compact('postCategories'));
    }

    public function addpostcategory()
    {
        $postCategories = $this->postCategoryRepository->catedata();
        return view('home.postCategories.add_categories', compact('postCategories'));
    }

    public function store(PostCategoryStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['image'] = $this->uploadImage($data['image']);
            $data['slug'] = Str::slug($data['name']);

            $this->postCategoryRepository->create($data);

            DB::commit();
            return redirect()->route('all.postcategory')->with('success', 'Post category created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all.postcategory')->with('error', 'Failed to create post category.');
        }
    }

    public function edit(string $id)
    {
        $postCategory = $this->postCategoryRepository->find($id);
        $postCategories = $this->postCategoryRepository->catedata();

        if (!$postCategory) {
            return redirect()->route('all.postcategory')->with('error', 'Post category not found.');
        }
        return view('home.postCategories.edit_categories', compact('postCategory', 'postCategories'));
    }

    public function update(PostCategoryUpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            $postCategory = $this->postCategoryRepository->find($request->id);
            if (!$postCategory) {
                return redirect()->route('all.postcategory')->with('error', 'Post category not found.');
            }

            $data = $request->validated();

            if (!empty($data['image'])) {
                if (file_exists($postCategory->image)) {
                    unlink($postCategory->image);
                }
                $data['image'] = $this->uploadImage($data['image']);
            }

            $this->postCategoryRepository->update($postCategory, $data);

            DB::commit();
            return redirect()->route('all.postcategory')->with('success', 'Post category updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all.postcategory')->with('error', 'Failed to update post category.');
        }
    }

    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $postCategory = $this->postCategoryRepository->find($id);
            if (!$postCategory) {
                return redirect()->route('all.postcategory')->with('error', 'Post category not found.');
            }

            if (file_exists($postCategory->image)) {
                unlink($postCategory->image);
            }

            $this->postCategoryRepository->delete($postCategory);

            DB::commit();
            return redirect()->route('all.postcategory')->with('success', 'Post category deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all.postcategory')->with('error', 'Failed to delete post category.');
        }
    }
}
