@extends('backend.layouts.master')

@section('content')
    <div class="container px-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cầu hình banner</h3>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="" class="form-lable">Tiêu đề</label>
                        <input name="title" type="text" class="form-control" value="{{ $banner->title }}"
                            placeholder="Nhập tiêu đề">
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-lable">Nội dung ngắn</label>
                        <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="5"
                            placeholder="Nhập nội dung ngắn">{{ $banner->short_description }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-lable">Hình ảnh</label>

                        <img class="img-fluid img-thumbnail w-100" id="show_path" style="cursor: pointer"
                            src="{{ showImage($banner->path, 'banner.jpg') }}" alt=""
                            onclick="document.getElementById('path').click();">
                        <input type="file" name="path" id="path" class="form-control d-none" accept="image/*"
                            onchange="previewImage(event, 'show_path')">

                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
