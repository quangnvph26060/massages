<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $settings->title }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="description" content="{{ $settings->description_seo }}">
    <meta name="keywords" content="{{ formatString($settings->keywords_seo) }}">

    <meta property="fb:app_id" content="1234567890" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content=" {{ $settings->title_seo }}" />
    <meta property="og:description" content=" {{ $settings->description_seo }}" />
    <meta property="og:site_name" content="{{ $settings->title_seo }}" />
    <meta property="og:image" content="  {{ showImage($settings->logo) }}" />


    @include('frontend.layouts.partials.styles')


</head>

<body>
    <header class="header position-sticky top-0 z-3">
        @include('frontend.layouts.partials.header')
    </header>
    <!-- Offcanvas Menu -->

    <div class="offcanvas-menu" id="offcanvas-menu">

        @include('frontend.layouts.partials.offcanvas')

    </div>
    <div class="overlay" id="overlay"></div>

    <main>

        @include('frontend.layouts.breadcrumbs.banner')

        <div id="section_1" class="py-5">
            @include('frontend.layouts.breadcrumbs.section-one')
        </div>

        <div id="section_2" class="mb-5">
            @include('frontend.layouts.breadcrumbs.section-two')
        </div>

        <div id="section_3" class="container">
            @include('frontend.layouts.breadcrumbs.section-three')
        </div>

        <div id="section_4" class="container">
            @include('frontend.layouts.breadcrumbs.section-four')
        </div>

        <div id="section_5">
            @include('frontend.layouts.breadcrumbs.section-five')
        </div>

    </main>

    <footer id="lienhe">
        @include('frontend.layouts.partials.footer')
    </footer>

    <div class="fixed-icons">
        <!-- Zalo -->
        <div class="zalo-contact">
            <a href="#" id="zalo-trigger" title="Liên hệ Zalo">
                <i class="fab fa-facebook-messenger"></i> <!-- Dùng icon Zalo -->
            </a>
            <div class="zalo-dropdown">

                @foreach ($settings->hotline as $item)
                    <a href="https://zalo.me/{{ str_replace(' ', '', $item) }}" target="_blank">
                        <strong> {{ $item }}</strong>
                    </a>
                @endforeach

                {{-- <a href="https://zalo.me/{{ str_replace(' ', '', $settings->hotline) }}" target="_blank">
                    <strong>{{ $settings->hotline }}</strong>
                </a> --}}
            </div>
        </div>


        <!-- Điện thoại -->
        <a href="tel:{{ str_replace(' ', '', $settings->hotline[0]) }}" class="phone" title="Gọi điện">
            <i class="fas fa-phone-alt"></i> <!-- Dùng icon điện thoại -->
        </a>
    </div>

    <!-- Bootstrap JS -->
    @include('frontend.layouts.partials.scripts')

</body>

</html>
