<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteSettingUpdateRequest;
use App\Http\Requests\SiteSettingStoreRequest;
use App\Repositories\SiteSettingInterface;
use App\Traits\UploadImage;
use Illuminate\Support\Facades\DB;

class SiteSettingController extends Controller
{
    use UploadImage;

    protected $sitesetting;

    public function __construct(SiteSettingInterface $sitesetting)
    {
        $this->sitesetting = $sitesetting;
    }

    public function index()
    {
        $sitesetting = $this->sitesetting->all();
        return view('home.siteSetting.all_site', compact('sitesetting'));
    }

    public function AddSiteSetting()
    {
        return view('home.siteSetting.add_site');
    }

    public function store(SiteSettingStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            if (!empty($data['logo'])) {
                $data['logo'] = $this->UploadLogo($data['logo']);
            }
            $this->sitesetting->create($data);

            DB::commit();
            return redirect()->route('all.site.setting')->with('success', 'Site Setting created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all.site.setting')->with('error', 'Failed to create Site Setting');
        }
    }

    public function edit($id)
    {
        $sitesetting = $this->sitesetting->find($id);
        return view('home.siteSetting.edit_site', compact('sitesetting'));
    }

    public function update(SiteSettingUpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            $sitesetting = $this->sitesetting->find($request->id);
            if (!$sitesetting) {
                return redirect()->route('all.site.setting')->with('error', 'Site Setting not found.');
            }

            $data = $request->validated();
            if (!empty($data['logo'])) {
                $data['logo'] = $this->UploadLogo($data['logo']);
                if (file_exists($sitesetting->logo)) {
                    unlink($sitesetting->logo);
                }
            }
            $this->sitesetting->update($sitesetting, $data);

            DB::commit();
            return redirect()->route('all.site.setting')->with('success', 'Site Setting updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all.site.setting')->with('error', 'Failed to update Site Setting');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $sitesetting = $this->sitesetting->find($id);
            if (!$sitesetting) {
                return redirect()->route('all.site.setting')->with('error', 'Site Setting not found.');
            }

            if (file_exists($sitesetting->logo)) {
                unlink($sitesetting->logo);
            }
            $this->sitesetting->delete($sitesetting);

            DB::commit();
            return redirect()->route('all.site.setting')->with('success', 'Site Setting deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('all.site.setting')->with('error', 'Failed to delete Site Setting');
        }
    }
}
