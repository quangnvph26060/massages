<div id="section_6" class="my-3">
    <div class="container p-3">
        <div class="row">
            <!-- Contact Information -->
            <div class="col-md-6">
                <div class="contact-card">
                    <h4>
                        THÔNG TIN LIÊN HỆ
                        {{-- <span style="color: #28a745">GU MASSAGE VIP</span> --}}
                    </h4>
                    <p class="contact-info">
                        Địa chỉ: {{ $settings->address }}
                    </p>
                    <p class="contact-info">Hotline/zalo: {{ $settings->hotline }}</p>
                </div>
            </div>

            <!-- Map Section -->
            <div class="col-md-6 map">
                {!! $settings->map !!}
            </div>
        </div>
    </div>
</div>
