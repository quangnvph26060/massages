<?php

namespace App\Http\Controllers\Backend;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function index()
    {
        $video = Video::firstOrCreate();
        return view('backend.video', compact('video'));
    }

    public function store(Request $request)
    {
        $video = Video::firstOrCreate();

        $credentials = $request->toArray();

        if ($request->hasFile('video')) {
            $credentials['file_path'] = $request->file('video')->store('videos', 'public');
            $credentials['url'] = $request->input('title');
            deleteImage($video->file_path);
        }

        $video->update($credentials);

        toastr()->success('Cập nhật thành công.');

        return back();
    }
}
