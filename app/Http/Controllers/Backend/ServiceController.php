<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        $service = Service::firstOrCreate();

        return view('backend.service', compact('service'));
    }

    public function store(Request $request)
    {
        // Lấy bản ghi hiện tại từ DB (nếu có, giả sử $id được truyền qua request)
        $service = Service::firstOrCreate();

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
        $existingItems = $service->items ?? [];
        $updatedItems = [];

        foreach ($request->input('items.service_titles') as $key => $title) {
            $imagePath = $existingItems[$key]['image'] ?? null; // Giữ đường dẫn ảnh cũ nếu không upload mới

            // Kiểm tra và lưu ảnh mới nếu có
            if ($request->hasFile("items.service_images.$key")) {
                deleteImage($imagePath);
                // $imagePath = $request->file("items.service_images.$key")->store('services', 'public');
                $imagePath = saveImages($request, "items.service_images.$key", 'services', 1080, 720);
            }

            $updatedItems[] = [
                'title' => $title,
                'image' => $imagePath,
            ];
        }

        // Lưu dữ liệu vào bảng
        $service->fill([
            'title' => $request->input('title'),
            'short_description' => $request->input('short_description'),
            'items' => $updatedItems, // Ghi đè mảng items
        ]);
        $service->save();

        toastr()->success('Lưu thay đổi thành công.');

        return response()->json([
            'status' => true,
        ]);
    }
}
