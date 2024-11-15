<?php

namespace App\Http\Controllers\Admin\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\HomePage;
use App\Traits\uploadImage;
use App\Http\Requests\Api\HomePageStoreRequest;
use App\Http\Requests\Api\HomePageUpdateRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use uploadImage;
    public function index()
    {
        $homePages = HomePage::all();
        return response()->json([
            'data' => $homePages,
            'message' => 'Home pages retrieved successfully',
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HomePageStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            if (!empty($data['image'])) {
                $data['image'] = $this->uploadImage($data['image']);
            }
            HomePage::create($data);
            DB::commit();
            return response()->json([
                'data' => $data,
                'message' => 'Home page created successfully',
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to create home page',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $homePage = HomePage::find($id);
        if (is_null($homePage)) {
            return response()->json([
                'message' => 'Data not found',
            ], 404);
        }
        return response()->json([
            'data' => $homePage,
            'message' => 'Home page retrieved successfully',
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HomePageUpdateRequest $request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $homePage = HomePage::find($id);
            if (!$homePage) {
                return response()->json([
                    'message' => 'Home page not found.',
                ], 404);
            }
            if (!empty($data['image'])) {
                $data['image'] = $this->uploadImage($data['image']);
            }
            $homePage->update($data);
            DB::commit();
            return response()->json([
                'data' => $data,
                'message' => 'Home page updated successfully',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to update home page',
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
            $homePage = HomePage::find($id);
            if (!$homePage) {
                return response()->json([
                    'message' => 'Home page not found.',
                ], 404);
            }
            $homePage->delete();
            DB::commit();
            return response()->json([
                'message' => 'Home page deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to delete home page',
            ], 500);
        }
    }
}
