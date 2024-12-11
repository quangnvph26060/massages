<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.setting');
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
    public function store(Request $request)
    {
        $credentials = $request->toArray();

        // dd($credentials);

        $setting = Setting::firstOrFail();

        if ($request->hasFile('logo')) {
            deleteImage($setting->logo);
            $credentials['logo'] = saveImage($request, 'logo', 'logo');
        }

        if ($request->hasFile('icon')) {
            deleteImage($setting->icon);
            $credentials['icon'] = saveImage($request, 'icon', 'icon');
        }

        $setting->update($credentials);

        toastr()->success('Cập nhật thành công.');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
