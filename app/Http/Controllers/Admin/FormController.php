<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Traits\UploadImage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\FormStoreRequest;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FormController extends Controller
{
    use UploadImage;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Form::query();

            if ($searchName = $request->input('search_name')) {
                $query->where('name', 'like', '%' . $searchName . '%');
            }
            if ($searchEmail = $request->input('search_email')) {
                $query->where('email', 'like', '%' . $searchEmail . '%');
            }
            if ($searchDescription = $request->input('search_description')) {
                $query->where('description', 'like', '%' . $searchDescription . '%');
            }
            if ($searchStatus = $request->input('search_status')) {
                if ($searchStatus === 'active') {
                    $query->where('status', 1);
                } elseif ($searchStatus === 'inactive') {
                    $query->where('status', 0);
                }
            }
            return datatables()->of($query)
                ->addColumn('image', function ($item) {
                    return asset($item->image);
                })
                ->addColumn('action', function ($item) {
                    return '<a href="' . route('edit.form', $item->id) . '" class="bg-blue-500 text-white px-3 py-2 rounded hover:bg-blue-600">Edit</a>
                        <a href="' . route('delete.form', $item->id) . '" class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600" id="delete">Delete</a>';
                })
                ->rawColumns(['image', 'status', 'action'])
                ->make(true);
        }

        return view('home.forms.all_form');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function AddForm()
    {
        return view('home.forms.add_form');
    }
    public function store(FormStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            if (!empty($data['image'])) {
                $data['image'] = $this->UploadImage($request->file('image'));
            }
            if (!empty($data['image1'])) {
                $data['image1'] = $this->UploadImage($request->file('image1'));
            }
            $data['password'] = Hash::make($request->password);
            $data['password1'] = Hash::make($request->password1);
            Form::create($data);
            DB::commit();
            return redirect()->route('all.form');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all.form')->with('error', 'Failed to create form.');
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $form = Form::find($id);
        return view('home.forms.edit_form', compact('form'));
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
        //
    }
}
