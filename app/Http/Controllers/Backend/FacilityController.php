<?php

namespace App\Http\Controllers\Backend;

use App\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FacilityController extends Controller
{
    public function index()
    {
        $facility = Facility::firstOrCreate();

        return view('backend.facility', compact('facility'));
    }

    public function store(Request $request)
    {
        // Lấy bản ghi hiện tại từ DB (nếu có, giả sử $id được truyền qua request)
        $facility = Facility::firstOrCreate();

        // Xác thực dữ liệu
        $credentials = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:255',
                'short_description' => 'nullable|string',
                'items.service_titles.*' => 'required|string|max:255',
                'items.service_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ],
            __('request.messages')
        );

        if ($credentials->fails()) {
            return response()->json([
                'status' => false,
                'error' => $credentials->errors()->first(),
            ]);
        }

        // Lấy mảng `items` từ cơ sở dữ liệu nếu có
        $existingItems = $facility->items ?? [];
        $updatedItems = [];

        foreach ($request->input('items.facility_titles') as $key => $title) {
            $imagePath = $existingItems[$key]['image'] ?? null; // Giữ đường dẫn ảnh cũ nếu không upload mới

            // Kiểm tra và lưu ảnh mới nếu có
            if ($request->hasFile("items.facility_images.$key")) {
                deleteImage($imagePath);
                // $imagePath = $request->file("items.facility_images.$key")->store('facilities', 'public');
                $imagePath = saveImages($request, "items.facility_images.$key", 'facilities', 489, 489);
            }

            $updatedItems[] = [
                'title' => $title,
                'image' => $imagePath,
            ];
        }

        // Lưu dữ liệu vào bảng
        $facility->fill([
            'title' => $request->input('title'),
            'short_description' => $request->input('short_description'),
            'items' => $updatedItems, // Ghi đè mảng items
        ]);

        $facility->save();

        toastr()->success('Lưu thay đổi thành công.');

        return response()->json([
            'status' => true,
        ]);
    }
}
