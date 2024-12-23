<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $pricing = Pricing::firstOrCreate();

        return view('backend.pricing', compact('pricing'));
    }

    public function store(Request $request)
    {
        $pricing = Pricing::firstOrCreate();



        $credentials = $request->toArray();

        if ($request->hasFile('description')) {
            deleteImage($pricing->description);
            $credentials['description'] = saveImage($request, 'description', 'pricing');
        }

        $pricing->update($credentials);

        toastr()->success('Cập nhật thành công.');

        return back();
    }
}
