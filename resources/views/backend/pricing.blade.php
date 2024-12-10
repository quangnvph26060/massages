@extends('backend.layouts.master')

@section('content')
    <div class="container px-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cấu hình bảng giá</h3>
            </div>

            <div class="card-body">
                <form action="" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="" class="form-label">Tiêu đề</label>
                        <input type="text" placeholder="Nhập tiêu đề" value="{{$pricing->title}}" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Tiêu đề</label>
                        <textarea name="description" id="description" cols="30" rows="10">{!! $pricing->description !!}</textarea>

                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <script>
        const BASE_URL = "{{ url('/') }}";
    </script>

    <script>
        CKEDITOR.replace('description', {
            height: 400
        });
    </script>
@endpush
