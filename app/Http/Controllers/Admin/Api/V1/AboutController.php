<?php

namespace App\Http\Controllers\Admin\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Http\Requests\Api\AboutStoreRequest;
use App\Http\Requests\Api\AboutUpdateRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\uploadImage;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use uploadImage;
    public function index()
    {
        $abouts = About::all();
        return response()->json([
            'data' => $abouts
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            if (!empty($data['image'])) {
                $data['image'] = $this->uploadImage($request->image, 'about');
            }
            About::create($data);
            DB::commit();
            return response()->json([
                'data' => $data,
                'message' => 'About created successfully',
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to create about',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $about = About::find($id);
        if (is_null($about)) {
            return response()->json([
                'message' => 'About not found',
            ], 404);
        }
        return response()->json([
            'data' => $about,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutUpdateRequest $request, string $id)
    {
        DB::beginTransaction();
        try {
            $about = About::find($id);
            if (is_null($about)) {
                return response()->json([
                    'message' => 'About not found',
                ], 404);
            }
            $data = $request->validated();
            if (!empty($data['image'])) {
                $data['image'] = $this->uploadImage($request->image, 'about');
            }
            $about->update($data);
            DB::commit();
            return response()->json([
                'data' => $about,
                'message' => 'About updated successfully',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to update about',
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
            $about = About::find($id);
            if (is_null($about)) {
                return response()->json([
                    'message' => 'About not found',
                ], 404);
            }
            if (!empty($about->image) && file_exists($about->image)) {
                unlink($about->image);
            }
            $about->delete();
            DB::commit();
            return response()->json([
                'message' => 'About deleted successfully',
            ], 204);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Failed to delete about. ' . $e->getMessage(),
            ], 500);
        }
    }
}
