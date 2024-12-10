@extends('backend.layouts.master')

@section('content')
    <div class="container px-5">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cấu hình tiện ích</h3>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="form-label">Tiêu đề</label>
                        <input name="title" type="text" placeholder="Nhập tiêu đề" value="{{ $facility->title }}"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Nội dung ngắn</label>
                        <input name="short_description" type="text" value="{{ $facility->short_description }}"
                            placeholder="Nhập nội dung ngắn" class="form-control">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Tiện ích</h3>
                    <button type="button" id="add-facility" class="btn btn-primary btn-sm">Thêm tiện ích</button>
                </div>
                <div class="card-body">
                    <div class="row" id="facilitys-container">
                        @foreach ($facility->items ?? [] as $key => $item)
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <img class="img-fluid img-thumbnail w-100" id="show_path_{{ $key }}"
                                                style="cursor: pointer" src="{{ showImage($item['image']) }}" alt=""
                                                onclick="document.getElementById('facility_images_{{ $key }}').click();">
                                            <input type="file" name="items[facility_images][]"
                                                id="facility_images_{{ $key }}" class="form-control d-none"
                                                accept="image/*"
                                                onchange="previewImage(event, 'show_path_{{ $key }}')">
                                        </div>
                                        <div class="form-group">
                                            <input name="items[facility_titles][]" type="text"
                                                placeholder="Nhập tiêu đề dịch vụ" value="{{ $item['title'] }}"
                                                class="form-control">
                                        </div>
                                        <button type="button" class="btn btn-danger btn-sm remove-facility">Xóa dịch
                                            vụ</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Khung dịch vụ sẽ được thêm tại đây -->
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-3">Lưu cấu hình</button>
        </form>
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(document).ready(function() {
                // Biến để đếm số lượng dịch vụ
                let facilityIndex = "{{ count($facility->items ?? []) }}";



                $('#add-facility').click(function() {
                    const facilityCard = `
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="form-group">
                                        <img class="img-fluid img-thumbnail w-100" id="show_path_${facilityIndex}" style="cursor: pointer"
                                            src="{{ showImage('') }}" alt=""
                                            onclick="document.getElementById('facility_images_${facilityIndex}').click();">
                                        <input type="file" name="items[facility_images][]" id="facility_images_${facilityIndex}" class="form-control d-none" accept="image/*"
                                        onchange="previewImage(event, 'show_path_${facilityIndex}')">
                                    </div>
                                    <div class="form-group">
                                        <input name="items[facility_titles][]" type="text" placeholder="Nhập tiêu đề dịch vụ" class="form-control">
                                    </div>
                                    <button type="button" class="btn btn-danger btn-sm remove-facility">Xóa dịch vụ</button>
                                </div>
                            </div>
                        </div>
                    `;
                    $('#facilitys-container').append(facilityCard);
                    facilityIndex++;
                });

                $(document).on('click', '.remove-facility', function() {
                    $(this).closest('.col-md-6').remove();
                });

                $('form').on('submit', function(e) {
                    e.preventDefault();

                    let formData = new FormData(this); // Dùng FormData để xử lý cả file và text

                    $.ajax({
                        url: $(this).attr('action'), // Đường dẫn đến route xử lý
                        type: "POST",
                        data: formData,
                        processData: false, // Ngăn jQuery xử lý dữ liệu (cần thiết khi dùng FormData)
                        contentType: false, // Ngăn jQuery thêm header `Content-Type`
                        success: function(response) {

                            if (response.status) {
                                window.location.reload();
                            } else {
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);

                        }
                    })

                })
            });
        </script>
    @endpush
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush
