<!-- header start  -->
<div class="news10-overlay"></div>
<header class="news10-food-news-header">
    <div class="container">
        <div class="news10-food-news-header-wrapper">
            <div class="news10-header-logo">
                <a class="header-logo" href="{{ URL('/') }}"><img src="{{ asset($settings->logo) }}" alt="{{ asset($settings->logo) }}"></a>

            </div>
            <div class="news10-main-menu-wrapper ">
                <div class="news10-main-menu desktop-menu">
                    <ul>
                        <li class="dropdown"><a href="{{route('home')}}">{{ $homeContactus[0]['type'] }}</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('home-one')}}">{{__('Home One')}}</a></li>
                                <li><a href="{{route('home-two')}}">{{__('Home Two')}}</a></li>

                            </ul>
                        </li>
                        </li>
                        {{--start menu dynamic--}}
                        @include('frontend.layouts._menu_one')
                        {{--end menu dynamic--}}
                        <li ><a href="{{ route('contactus') }}">{{ $homeContactus[1]['type'] }}</a></li>
                    </ul>
                </div>
                <div class="news10-nav-right">
                    <div class="search-btn search-bar">
                        <i class="far fa-search"></i>
                    </div>
                    <div class="news10-nav-open"><img src="{{ asset('frontend/img/icon/nav-bar.svg') }}" alt="{{ asset('frontend/img/icon/nav-bar.svg') }}"></div>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- mobile manu  -->
<div class="news10-main-menu mobile-menu fashion-news-mobile-menu">
    <div class="nav-close">
        <i class="fa fa-times"></i>
    </div>
    <ul>
        <li><a href="{{route('home')}}">{{ $homeContactus[0]['type'] }}</a>
        </li>
        {{--start menu dynamic mobile--}}
        @include('frontend.layouts._menu_mobile')
        {{--end menu dynamic mobile--}}

    </ul>
</div>
<!-- header end -->

<!-- search news10l start  -->
<div class="news10-search-news10l">
    <div class="container">
        <form class="news10-search-form">
            <input type="search" class="form-control" placeholder="Search..." autocomplete="off">
            <button class="theme-btn food-bg">{{__('Search')}}</button>
        </form>
    </div>
</div>
<!-- search news10l end  -->
