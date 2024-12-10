@extends('backend.layouts.master')

@section('title', 'Cấu hình chung')

@section('content')
    <div class="container px-5">
        <form action="{{ route('admin.settings') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Cấu hình chung</h4>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ $settings->email }}" placeholder="Nhập email">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hotline</label>
                                        <input type="text" name="hotline"
                                            class="form-control @error('hotline') is-invalid @enderror"
                                            value="{{ $settings->hotline }}"
                                            placeholder="Nhập số điện thoại liên hệ">
                                        @error('hotline')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input type="text" name="address"
                                            class="form-control @error('address') is-invalid @enderror"
                                            value="{{ $settings->address }}" placeholder="Nhập địa chỉ">
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Map</label>
                                        <input type="text" name="map"
                                            class="form-control @error('map') is-invalid @enderror"
                                            value="{{ $settings->map }}" placeholder="Nhập google map">
                                        @error('map')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tiêu đề seo</label>
                                        <input type="text" name="seo_title"
                                            class="form-control @error('seo_title') is-invalid @enderror"
                                            value="{{ $settings->seo_title }}" placeholder="Nhập tiêu đề seo">
                                        @error('seo_title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Từ khóa seo</label>
                                        <input type="text" name="keywords_seo" id="keywords_seo"
                                            class="form-control @error('keywords_seo') is-invalid @enderror"
                                            value="{{ $settings->keywords_seo }}" placeholder="Nhập từ khóa seo">
                                        @error('keywords_seo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mô tả seo</label>
                                        <textarea rows="8" name="description_seo" class="form-control @error('description_seo') is-invalid @enderror" placeholder="Nhập mô tả seo">{{ $settings->description_seo }}</textarea>
                                        @error('description_seo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Logo</h4>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid img-thumbnail w-100" id="show_logo" style="cursor: pointer"
                                src="{{ showImage($settings->logo) }}" alt=""
                                onclick="document.getElementById('logo').click();">
                            @error('logo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="file" name="logo" id="logo" class="form-control d-none" accept="image/*"
                                onchange="previewImage(event, 'show_logo')">
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Icon</h4>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid img-thumbnail w-100" id="show_icon" style="cursor: pointer"
                                src="{{ showImage($settings->icon) }}" alt=""
                                onclick="document.getElementById('icon').click();">
                            @error('icon')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="file" name="icon" id="icon" class="form-control d-none" accept="image/*"
                                onchange="previewImage(event, 'show_icon')">
                        </div>
                    </div>

                    <div class="row mb-3 float-right">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-sm">Lưu cấu hình</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <!-- Tagify JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.7.0/tagify.min.js"></script>

    <script>
        const input = document.querySelector('#keywords_seo');
        const tagify = new Tagify(input, {
            dropdown: {
                maxItems: 10,
                classname: "tags-look",
                enabled: 0,
                closeOnSelect: false
            }
        });

        tagify.on('add', () => {
            adjustTagifyHeight(tagify.DOM.scope);
        });

        function adjustTagifyHeight(scopeElement) {
            if (scopeElement) {
                scopeElement.style.height = "auto"; // Reset chiều cao
                scopeElement.style.height = scopeElement.scrollHeight + "px"; // Điều chỉnh theo nội dung
            }
        }
    </script>
@endpush

@push('styles')
    <!-- Tagify CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.7.0/tagify.css">

    <style>
        .tagify__tag {
            margin-top: 3px !important;
        }


        .tags-look .tagify {
            display: block;
            white-space: normal;
            overflow-y: hidden;
            /* Ẩn thanh cuộn dọc */
            max-height: 150px;
            /* Giới hạn chiều cao nếu cần */
        }

        .tagify {
            max-height: 150px;
            /* Giới hạn chiều cao */
            overflow-y: auto;
            /* Thêm thanh cuộn dọc nếu quá dài */
        }

        .tagify__input {
            width: 100%;
            /* Đảm bảo input chiếm hết chiều rộng */
            overflow: hidden;
            /* Ẩn nội dung tràn */
        }
    </style>
@endpush
