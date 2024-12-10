<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::firstOrCreate();
        return view('backend.banner', compact('banner'));
    }

    public function store(Request $request)
    {
        $banner = Banner::firstOrFail();

        $credentials = $request->toArray();

        if ($request->hasFile('path')) {
            deleteImage($banner->path);

            $credentials['path'] = saveImage($request, 'path', 'banner');
        }

        $banner->update($credentials);

        toastr()->success('Cập nhật thành công.');

        return back();
    }
}
