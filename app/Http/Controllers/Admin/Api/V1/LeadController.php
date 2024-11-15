<?php

namespace App\Http\Controllers\Admin\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\LeadStoreRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Lead::all();
        $data = $leads->map(function ($lead) {
            return [
                'name' => $lead->name,
                'login_id' => $lead->login_id,
                'email' => $lead->email,
                'address' => $lead->address,
                'phone' => $lead->phone,
                'status' => $lead->status,
                'created_at' => $lead->created_at->format('Y-m-d H:i:s'),
            ];
        })->toArray();

        return response()->json([
            'message' => 'Data successfully fetched',
            'data' => $data,
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     */

    public function store(LeadStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['status'] = 'register';
            $data['slug'] = Str::slug($data['name']);
            $data['address'] = $data['address'] ?? '';
            $lead = Lead::create($data);
            DB::commit();
            return response()->json(
                [
                    'message' => "Lead User Successfully Created",
                    'data' => [
                        'name' => $lead->name,
                        'login_id' => $lead->login_id,
                        'email' => $lead->email,
                        'address' => $lead->address,
                        'phone' => $lead->phone,
                        'status' => $lead->status,
                        'created_at' => $lead->created_at->format('Y-m-d H:i:s'),
                    ]
                ],
                200
            );
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Error creating lead: ' . $e->getMessage()
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $lead = Lead::find($id);
            if (!$lead) {
                return response()->json([
                    'message' => 'Lead not found.'
                ], 404);
            }
            $lead->delete();
            DB::commit();
            return response()->json([
                'message' => 'Lead User Successfully Deleted'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Error deleting lead: ' . $e->getMessage()
            ], 500);
        }
    }
}
