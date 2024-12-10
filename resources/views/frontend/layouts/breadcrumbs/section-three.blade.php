<div id="dichvu" class="w-50"
    style="
     background-image: url({{ asset('frontend/assets/image/bg-title.jpg') }});
            background-size: 100% 100%;
        ">
    <h2>{{ $service->title }}</h2>
</div>

<p class="text-block-css full-width">
    <span
        style="
      color: rgba(233, 30, 99, 0.95);
      font-weight: bold;
      margin-left: 25px;
      font-size: 20px;
    ">{{ $service->short_description }}</span>
</p>

<div class="container mt-5">
    <div class="row product-container">
        <!-- Card 1 -->

        @foreach ($service->items ?? [] as $item)
            <div class="col-md-5 product-card mb-5">
                <a href="{{ showImage($item['image']) }}" data-fancybox="galleryy" data-caption="{{ $item['title'] }}">
                    <img src="{{ showImage($item['image']) }}" alt="{{ $item['title'] }}" />
                </a>
                <div class="product-title">{{ $item['title'] }}</div>
            </div>
        @endforeach
    </div>
</div>
