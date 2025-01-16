<!-- header start  -->
<div class="news10-overlay"></div>
<header class="news10-maan-news-header">
    <div class="container-xxl container-lg">
        <div class="news10-hdr-wrapper">
            <a class="news10-h-manu-btn d-block d-lg-none" href="#"><i class="fal fa-bars"></i></a>
            <a href="{{ URL('/') }}" class="header-logo"><img src="{{ asset($settings->logo) }} "
                    alt="{{ asset($settings->logo) }}"></a>
            <div class="news10-maannews-main-menu">
                <ul>
                    <li>
                        <a href="{{ route('home') }}">{{ __('Home One') }}</a>
                    </li> &nbsp;&nbsp;&nbsp;
                    {{-- start menu dynamic --}}
                    @include('frontend.layouts._menu_two')
                    {{-- end menu dynamic --}}

                    <li>
                        <a href="{{ route('contactus') }}">{{ @$homeContactus[0]['name'] }}</a>
                    </li>

                </ul>
            </div>
            <div class="news10-hdr-right">
                <ul>
                    <li><a href="#" class="news10-search-btn"><i class="fal fa-search"></i></a></li>
                </ul>
            </div>

        </div>
    </div>
</header>
<!-- search news10l start  -->
<div class="news10-search-news10l">
    <div class="container">
        <form action="{{ route('search') }}" method="get" class="news10-search-form">
            @csrf
            <input type="search" name="search" class="form-control" placeholder="Search..." autocomplete="off">
            <button class="theme-btn red_btn">{{ __('Search') }}</button>
        </form>
    </div>
</div>
<!-- search news10l end  -->


