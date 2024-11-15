<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\PageRepositoryInterface;
use App\Traits\UploadImage;
use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PageController extends Controller
{
    use UploadImage;

    protected $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function index()
    {
        $page = $this->pageRepository->all();
        return view('home.pages.all_page', compact('page'));
    }

    public function AddPage()
    {
        return view('home.pages.add_page');
    }

    public function store(PageStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['featured_image'] = $this->uploadPageFeaturedImage($data['featured_image']);
            $data['slug'] = Str::slug($data['title']);
            $this->pageRepository->create($data);

            DB::commit();
            return redirect()->route('all.page')->with('success', 'Page created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all.page')->with('error', 'Failed to create page.');
        }
    }

    public function edit(string $id)
    {
        $page = $this->pageRepository->find($id);
        if (!$page) {
            return redirect()->route('all.page')->with('error', 'Page not found.');
        }
        return view('home.pages.edit_page', compact('page'));
    }

    public function update(PageUpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            $page = $this->pageRepository->find($request->id);
            if (!$page) {
                return redirect()->route('all.page')->with('error', 'Page not found.');
            }

            $data = $request->validated();

            if (!empty($data['featured_image'])) {
                if (file_exists($page->featured_image)) {
                    unlink($page->featured_image);
                }
                $data['featured_image'] = $this->uploadPageFeaturedImage($data['featured_image']);
            }

            $this->pageRepository->update($page, $data);

            DB::commit();
            return redirect()->route('all.page')->with('success', 'Page updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all.page')->with('error', 'Failed to update page.');
        }
    }

    public function destroy(string $id)
    {
        $page = $this->pageRepository->find($id);
        if (!$page) {
            return redirect()->route('all.page')->with('error', 'Page not found.');
        }

        if (file_exists($page->featured_image)) {
            unlink($page->featured_image);
        }

        $this->pageRepository->delete($page);

        return redirect()->route('all.page')->with('success', 'Page deleted successfully.');
    }
}
