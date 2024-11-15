<?php

namespace App\Http\Controllers\Admin\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UnitStoreRequest;
use App\Http\Requests\Api\UnitUpdateRequest;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::all();
        return response()->json(
            [
                'data' => $units,
                'message' => 'Data successfully Fatched',
            ]
        );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $unit = Unit::create($request->validated());
            return response()->json(
                [
                    'data' => $unit,
                    'message' => 'Data successfully created',
                ]
            );
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(
                [
                    'message' => 'Failed to create data',
                ],
                500
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $unit = Unit::find($id);
        if (is_null($unit)) {
            return response()->json(
                [
                    'message' => 'Data not found',
                ],
                404
            );
        }
        return response()->json(
            [
                'data' => $unit,
                'message' => 'Data successfully fetched',
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnitUpdateRequest $request, string $id)
    {
        DB::beginTransaction();
        try {
            $unit = Unit::find($id);
            $data = $request->validated();
            $unit->update($data);
            return response()->json(
                [
                    'data' => $unit,
                    'message' => 'Data successfully Updated',
                ]
            );
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(
                [
                    'message' => 'Failed to Update data',
                ],
                500
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $unit = Unit::find($id);
            if (!$unit) {
                return response()->json([
                    'message' => 'Unit not found.'
                ], 404);
            }
            $unit->delete();
            DB::commit();
            return response()->json([
                'message' => ' Unit Successfully Deleted'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Error deleting Unit: ' . $e->getMessage()
            ], 500);
        }
    }
}
