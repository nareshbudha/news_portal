<?php

namespace App\Http\Controllers\Admin\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Http\Requests\Api\FaqStoreRequest;
use App\Http\Requests\Api\FaqUpdateRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\uploadImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = FAQ::all();
        return response()->json([
            'faqs' => $faqs,
            'message' => 'FAQs successfully fatched',
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $faq = FAQ::create($data);
            return response()->json([
                'message' => 'FAQ successfully created',
                'data' => $faq,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to create FAQ',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqUpdateRequest $request, string $id)
    {
        DB::beginTransaction();
        try {
            $faq = FAQ::find($id);
            if (!$faq) {
                return response()->json([
                    'message' => 'FAQ not found.'
                ], 404);
            }
            $data = $request->validated();
            $faq->update($data);
            return response()->json([
                'message' => 'FAQ successfully updated',
                'data' => $faq,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to update FAQ',
                'error' => $e->getMessage(),
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
            $faq = FAQ::find($id);
            if (!$faq) {
                return response()->json([
                    'message' => 'FAQ not found.'
                ], 404);
            }
            $faq->delete();
            DB::commit();
            return response()->json([
                'message' => 'FAQ successfully deleted',
            ], 204);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to delete FAQ',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
