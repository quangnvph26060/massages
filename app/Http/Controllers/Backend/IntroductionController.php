<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Introduction;
use Illuminate\Http\Request;

class IntroductionController extends Controller
{
    public function index()
    {
        $introduc = Introduction::firstOrCreate();

        return view('backend.introduction', compact('introduc'));
    }

    public function store(Request $request)
    {
        $credentials = $request->toArray();

        $introduc = Introduction::firstOrCreate();

        $introduc->update($credentials);

        toastr()->success('Cập nhật thành công.');

        return back();
    }
}
