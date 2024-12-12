<div id="section_6" class="my-3">
    <div class="container p-3">
        <div class="row">
            <!-- Contact Information -->

            @php
                $base = [
                    'title_base' => $settings->title_base ?? [],
                    'hotline' => $settings->hotline ?? [],
                    'address' => $settings->address ?? [],
                    'map' => $settings->map ?? [],
                ];

                // Tìm độ dài lớn nhất trong các mảng
                $maxLength = max(
                    count($base['title_base']),
                    count($base['hotline']),
                    count($base['address']),
                    count($base['map']),
                );

                // Bổ sung giá trị null nếu mảng ngắn hơn độ dài lớn nhất
                foreach ($base as $key => $values) {
                    $base[$key] = array_pad($values, $maxLength, null);
                }
            @endphp

            @foreach (range(0, $maxLength - 1) as $i)
                <div class="col-md-6">
                    <div class="contact-card mb-2">
                        <h4>
                            {{ $base['title_base'][$i] ?? 'Tiêu đề chưa cập nhật' }}
                        </h4>
                        <p class="contact-info">
                            Địa chỉ:
                            {{ $base['address'][$i] ?? 'Đang cập nhật...' }}
                        </p>
                        <p class="contact-info">
                            Hotline/zalo:
                            {{ $base['hotline'][$i] ?? 'Đang cập nhật...' }}
                        </p>
                    </div>

                    <div class="map">
                        {!! $base['map'][$i] ?? '<p>Chưa có bản đồ được thêm.</p>' !!}
                    </div>
                </div>
            @endforeach



        </div>
    </div>
</div>
