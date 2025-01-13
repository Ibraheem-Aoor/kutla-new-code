<footer class="news10-footer-section maan-travel-news-footer news10-data-background" data-background="{{ asset('frontend/img/footer/img1.png') }}">
    <a href="{{ URL('/') }}" class="footer-logo"><img src="{{ asset($settings->logo_footer) }}" alt=""></a>
    <div class="news10-footer-social-link">
        <ul>
            @foreach($socials as $social)
                <li><a href="{{$social->url}}"><i class="{{$social->icon_code}}"></i></a></li>
            @endforeach
        </ul>
    </div>
    <div class="news10-footer-bottom">
        <span>&copy; {{__('Copyright 2021 ')}} {{ get_option('company-info')['copyright'] ?? '' }}  </span>
    </div>
</footer>
