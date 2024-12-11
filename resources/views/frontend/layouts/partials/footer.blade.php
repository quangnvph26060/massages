<div id="section_6" class="my-3">
    <div class="container p-3">
        <div class="row">
            <!-- Contact Information -->

            @php
                $addresses = explode('|', $settings->address);
                $hotlines = explode('|', $settings->hotline);
            @endphp
            @foreach ($settings->map as $key => $item)
                <div class="col-md-6">
                    <div class="contact-card mb-2">
                        <h4>
                            THÔNG TIN LIÊN HỆ - CỞ SỞ {{ $key + 1 }}
                            {{-- <span style="color: #28a745">GU MASSAGE VIP</span> --}}
                        </h4>
                        <p class="contact-info">
                            Địa chỉ: {{ $addresses[$key] }}
                        </p>
                        <p class="contact-info">Hotline/zalo: {{ $hotlines[$key] }}</p>
                    </div>

                    <div class="map">
                        {!! $item !!}
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</div>
