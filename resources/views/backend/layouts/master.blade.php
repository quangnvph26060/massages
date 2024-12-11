<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ $settings->title_seo }}</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />

    @include('backend.layouts.partials.styles')
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('backend.layouts.partials.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">

            @include('backend.layouts.partials.header')

            @yield('content')

            @include('backend.layouts.partials.footer')

        </div>

    </div>

    @include('backend.layouts.partials.scripts')

</body>

</html>
