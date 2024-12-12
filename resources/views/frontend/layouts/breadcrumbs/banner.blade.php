<div id="trangchu" style="background-image: url({{ showImage($banner->path) }})"
    class="banner d-flex justify-content-center align-items-center text-center">
    <div class="banner-content text-white">
        <h2 class="display-4">{{ $banner->title }}</h2>
        <p class="lead">{{ $banner->short_description }}</p>
        <a href="tel:{{ str_replace(' ', '', $settings->hotline[0]) }}">
            <button class="btn btn-light btn-lg mt-3">Liên hệ ngay</button>
        </a>
    </div>
</div>
