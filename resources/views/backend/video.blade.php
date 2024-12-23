@extends('backend.layouts.master')

@section('content')
    <div class="container px-5">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Cấu hình video
                </h3>
            </div>

            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="" class="form-label">Tiêu đề</label>
                        <input type="text" value="{{$video->title}}" placeholder="Nhập tiêu đề" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Video</label>
                        <input type="file" name="video" id="video" class="form-control" accept="video/mp4" required>
                        {{-- <input value="{{$video->url}}" type="text" placeholder="Nhập tiêu đề" name="url" class="form-control"> --}}
                    </div>

                    <div class="form-group">
                       <button class="btn btn-primary btn-sm">Lưu</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
