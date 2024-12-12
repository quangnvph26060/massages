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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ $settings->title }}" placeholder="Nhập title">
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ $settings->email }}" placeholder="Nhập email">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div> --}}


                            </div>


                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title">Cơ sở</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-success btn-sm btn-add">Thêm (+)</button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="base">
                                @php
                                    $base = [
                                        'title_base' => $settings->title_base,
                                        'hotline' => $settings->hotline,
                                        'address' => $settings->address,
                                        'map' => $settings->map,
                                    ];

                                    $maxLength = max(
                                        count($base['hotline']),
                                        count($base['address']),
                                        count($base['map']),
                                    );

                                    foreach ($base as $key => $values) {
                                        $base[$key] = array_pad($values, $maxLength, null);
                                    }

                                @endphp

                                @foreach (range(0, $maxLength - 1) as $i)
                                    <div class="form-group shadow bg-body rounded">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="" class="form-label">Tiêu đề cơ sở</label>
                                                <input type="text" name="title_base[]" class="form-control"
                                                    placeholder="Nhập tiêu đề cơ sở"
                                                    value="{{ $base['title_base'][$i] ?? '' }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="form-label">Hotline</label>
                                                <input type="text" name="hotline[]" class="form-control"
                                                    placeholder="Nhập số điện thoại liên hệ"
                                                    value="{{ $base['hotline'][$i] ?? '' }}">
                                            </div>

                                            <div class="col-md-8">
                                                <label>Địa chỉ</label>
                                                <input type="text" name="address[]" class="form-control"
                                                    placeholder="Nhập địa chỉ" value="{{ $base['address'][$i] ?? '' }}">
                                            </div>

                                            <div class="col-md-12 mt-3">
                                                <label>Map</label>
                                                <input type="text" name="map[]" class="form-control"
                                                    placeholder="Nhập Google Map" value="{{ $base['map'][$i] ?? '' }}">
                                            </div>

                                            <div class="col-md-12 mt-3 text-end">
                                                <button type="button" class="btn btn-danger btn-sm btn-remove">Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tiêu đề seo</label>
                                        <input type="text" name="title_seo"
                                            class="form-control @error('title_seo') is-invalid @enderror"
                                            value="{{ $settings->title_seo }}" placeholder="Nhập tiêu đề seo">
                                        @error('title_seo')
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
                                        <textarea rows="8" name="description_seo" class="form-control @error('description_seo') is-invalid @enderror"
                                            placeholder="Nhập mô tả seo">{{ $settings->description_seo }}</textarea>
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
                            <input type="file" name="logo" id="logo" class="form-control d-none"
                                accept="image/*" onchange="previewImage(event, 'show_logo')">
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
                            <input type="file" name="icon" id="icon" class="form-control d-none"
                                accept="image/*" onchange="previewImage(event, 'show_icon')">
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
        function toggleRemoveButton() {
            const totalBlocks = $('.base .form-group').length;
            if (totalBlocks === 1) {
                $('.btn-remove').hide();
            } else {
                $('.btn-remove').show();
            }
        }

        // Khởi tạo: Ẩn nút "Xóa" nếu chỉ có 1 khối
        $(document).ready(function() {
            toggleRemoveButton();
        });

        // Thêm khối mới
        $(document).on('click', '.btn-add', function() {
            const newElement = `
                    <div class="form-group shadow bg-body rounded mt-3">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label">Tiêu đề cơ sở</label>
                                <input type="text" name="title_base[]" class="form-control" placeholder="Nhập tiêu đề cơ sở">
                            </div>

                            <div class="col-md-4">
                                <label for="" class="form-label">Hotline</label>
                                <input type="text" name="hotline[]" class="form-control" placeholder="Nhập số điện thoại liên hệ">
                            </div>

                            <div class="col-md-8">
                                <label>Địa chỉ</label>
                                <input type="text" name="address[]" class="form-control" placeholder="Nhập địa chỉ">
                            </div>

                            <div class="col-md-12 mt-3">
                                <label>Map</label>
                                <input type="text" name="map[]" class="form-control" placeholder="Nhập Google Map">
                            </div>

                            <div class="col-md-12 mt-3 text-end">
                                <button type="button" class="btn btn-danger btn-sm btn-remove">Xóa</button>
                            </div>
                        </div>
                    </div>
                `;

            $('.base').append(newElement);
            toggleRemoveButton();
        });


        // Xóa khối
        $(document).on('click', '.btn-remove', function() {
            $(this).closest('.form-group').remove();
            toggleRemoveButton();
        });



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
        .map-input-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .map-input-group input {
            flex: 1;
        }

        .map-input-group .remove-map {
            color: #fff;
            background-color: #dc3545;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .map-input-group .remove-map:hover {
            background-color: #c82333;
        }

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
