<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    @php
        $googleanalytics = googleanalytics();
        $headers = headers();
        /*$home =  home();*/
        $footer = footer();
    @endphp
    <meta charset="{{ config('app.charset') }}">

    <meta name="viewport" content="{{ __('width=device-width, initial-scale=1') }}">
    <meta name="copyright" content="{{ __('Maan News') }}">
    <meta name="robots" content="{{ __('Maan News') }}">
    <meta http-equiv="X-UA-Compatible" content="{{ __('IE=edge') }}">

    @yield('meta_content')

    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />

    <title>{{ $settings->title ?? '' }}</title>

    <!-- Apple Favicon -->
    <link rel="apple-touch-icon" href="{{ asset($settings->favicon ?? '') }}">
    <!-- All Device Favicon -->
    <link rel="icon" href="{{ asset($settings->favicon ?? '') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('frontend/fontawesome/all.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('frontend/fonts/fonts.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/fonts/front_clock.css') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <!-- Normalize -->
    <link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">
    <!-- Default -->
    <link rel="stylesheet" href="{{ asset('frontend/css/default.css') }}">

    <!-- swiper slider css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper-bundle.min.css') }}">
    <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <!-- Venobox -->
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}?v=0.03">
    <!-- Responsive -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <!-- toastr -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.css') }}">
    <!-- Style for maannews-->
    <link rel="stylesheet" href="{{ asset('frontend/css/maan_news_style.css') }}?v=0.02">
    <!-- color change for maannews-->
    <link rel="stylesheet" href="{{ asset('frontend/css/color-change.css') }}">

    @stack('styles')
    {{-- Arabic --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/arabic.css') }}?v=0.02">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.rtl.min.css') }}">

    @if ($googleanalytics)
        <!-- Global site tag (gtag.js) - Google Analytics -->
        @foreach ($googleanalytics as $googleanalytic)
            {{ $googleanalytic->google_analytics }}
        @endforeach
    @endif

</head>

<body class="{{ $settings->theme_color ?? 'theme-blue' }}">
    <div id="main-wrapper">
        @empty($headers)
            <!-- Maan Top Bar Start -->
            @include('frontend.layouts._topheader')
            <!-- Maan Top Bar End -->
            <!-- Maan Mid Bar Start -->
            @include('frontend.layouts._header')
            <!-- Maan Mid Bar End -->
            <!-- Maan menu Start -->
            @include('frontend.layouts._menu')
            <!-- Maan menu End -->
        @else
            @switch($headers->name_slug)
                @case($headers->name_slug != 'header_1')
                    @include('frontend.layouts.headers.' . $headers->name_slug)
                @break

                @default
                    <!-- Maan Top Bar Start -->
                    @include('frontend.layouts._topheader')
                    <!-- Maan Top Bar End -->
                    <!-- Maan Mid Bar Start -->
                    @include('frontend.layouts._header')
                    <!-- Maan Mid Bar End -->
                    <!-- Maan menu Start -->
                    @include('frontend.layouts._menu')
                    <!-- Maan menu End -->
            @endswitch
        @endempty


        <!-- Maan Manu Bar Start -->
        @isset($headers->name_slug)
            @if ($headers->name_slug == 'header_2')
                @include('frontend.layouts._menu')
            @endif

        @endisset
        <!-- Maan Manu Bar End -->
        <main>
            <!-- Maan Breaking News Start -->
            @if (Route::currentRouteName() != 'signup' && Route::currentRouteName() != 'signin')
                @if (!empty($headers) && $headers->name_slug != 'header_7' && $headers->name_slug != 'header_2')
                    <section class="maan-breaking-news-section">
                        @include('frontend.layouts._breakingnews')
                    </section>
                @endif

            @endif

            @yield('main_content')
            <!-- Main Content End -->
        </main>
        @empty($footer)
            @include('frontend.layouts._footer')
        @else
            @switch($footer->name_slug)
                @case($footer->name_slug != 'footer_1')
                    @include('frontend.layouts.footers.' . $footer->name_slug)
                    {{-- @endif --}}
                @break

                @default
                    @include('frontend.layouts._footer')
            @endswitch
        @endempty

    </div>

    <!-- jQuery -->
    <script src="{{ asset('frontend/js/vendor/jquery-3.6.0.min.js') }} "></script>
    <!-- Popper -->
    <script src="{{ asset('frontend/js/vendor/popper.min.js') }} "></script>
    <!-- Bootstrap -->
    <script src="{{ asset('frontend/js/vendor/bootstrap.min.js') }} "></script>

    <!-- swiper slider -->

    <script src="{{ asset('frontend/js/swiper-bundle.min.js') }} "></script>
    <!-- Slick -->
    <script src="{{ asset('frontend/js/vendor/slick.min.js') }} "></script>
    <!-- Counter Up -->
    <script src="{{ asset('frontend/js/vendor/counterup.min.js') }} "></script>
    <!-- Waypoints -->
    <script src="{{ asset('frontend/js/vendor/waypoints.min.js') }} "></script>
    <!-- Venobox -->
    <script src="{{ asset('frontend/js/vendor/venobox.min.js') }} "></script>
    <!-- Index -->

    <script src="{{ asset('frontend/js/index.js') }}?v=0.02"></script>

    <script src="{{ asset('frontend/js/theme.js') }} "></script>
    <!-- toastr -->
    <script src="{{ asset('admin/plugins/toastr/toastr.min.js') }} "></script>
    {{-- lazyloaded --}}
    <script src="{{ asset('maan/js/jquery.lazy.min.js') }} "></script>
    @stack('scripts')


    <script>
        $("#loginMessage").show().delay(5000).fadeOut('slow');
    </script>
    <script>
        $(document).ready(function() {
            $('img').lazyLoad();
        });
    </script>

</body>

</html>
