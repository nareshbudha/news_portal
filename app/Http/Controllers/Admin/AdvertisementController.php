<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisementStoreRequest;
use App\Http\Requests\AdvertisementUpdateRequest;
use App\Repositories\AdvertisementRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Traits\UploadImage;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    use UploadImage;
    protected $adRepository;

    public function __construct(AdvertisementRepositoryInterface $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $ad = $this->adRepository->all();
            return datatables()->of($ad)
                ->addColumn('image', function ($item) {
                    return asset($item->image);
                })
                ->addColumn('status', function ($item) {
                    return $item->status == 0 ? 'Inactive' : 'Active';
                })
                ->addColumn('action', function ($item) {
                    return '<div class="flex space-x-2">
                <a href="' . route('edit.advertisement', $item->id) . '"
                   class="bg-blue-500 text-white px-3 py-2 rounded hover:bg-blue-600">
                    Edit
                </a>
                <a href="' . route('delete.advertisement', $item->id) . '"
                   class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600" id="delete">
                    Delete
                </a>
            </div>';
                })

                ->rawColumns(['image', 'status', 'action'])
                ->make();
        }
        return view('home.advertisements.all_advertisement');
    }



    public function AddAdvertisement()
    {
        return view('home.advertisements.add_advertisement');
    }


    public function store(AdvertisementStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            if (!empty($data['image'])) {
                $data['image'] = $this->uploadAdImage($data['image']);
            }
            $this->adRepository->create($data);
            DB::commit();
            return redirect()->route('advertisement')->with('success', 'ad created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('advertisement')->with('error', 'Failed to create ad.');
        }
    }

    public function edit(string $id)
    {
        $ad = $this->adRepository->find($id);
        if (!$ad) {
            return redirect()->route('advertisement')->with('error', 'ad not found.');
        }
        return view('home.advertisements.edit_advertisement', compact('ad'));
    }

    public function update(AdvertisementUpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            $ad = $this->adRepository->find($request->id);
            if (!$ad) {
                return redirect()->route('advertisement')->with('error', 'ad not found.');
            }

            $data = $request->validated();
            if (!empty($data['image'])) {
                if (file_exists($ad->image)) {
                    unlink($ad->image);
                }
                $data['image'] = $this->uploadAdImage($data['image']);
            }

            $this->adRepository->update($ad, $data);

            DB::commit();
            return redirect()->route('advertisement')->with('success', 'ad updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('advertisement')->with('error', 'Failed to update ad.');
        }
    }

    public function destroy(string $id)
    {
        $ad = $this->adRepository->find($id);
        if (!$ad) {
            return redirect()->route('advertisement')->with('error', 'ad not found.');
        }

        if (file_exists($ad->image)) {
            unlink($ad->image);
        }

        $this->adRepository->delete($ad);

        return redirect()->route('advertisement')->with('success', 'ad deleted successfully.');
    }
}
