<!-- footer  start -->
<footer class="news10_footer_section">
    <div class="container-xxl container-lg">
        <a href="{{ URL('/') }}" class="ftr-logo"><img src="{{ asset($settings->logo_footer) }}" alt=""></a>
        <div class="footer-grid-wrapper">
            <div class="footer-grid-items">
                <div class="news10-ftr-items">
                    <h4>{{__('Edition')}}</h4>
                    <label class="custom_radion_btn">{{__('English')}}
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="custom_radion_btn">{{__('South Amerian')}}
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="custom_radion_btn">{{__('Spanish')}}
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="custom_radion_btn">{{__('Middle East')}}
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <div class="footer-grid-items">
                <div class="news10-ftr-items">
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                @foreach( newscategories() as $key=>$newscategory )
                                    @if($key==5)
                                        @break;
                                    @endif
                                    @if($newscategory->menu_publish && $key<5)
                                        <li>
                                            <a href="{{ route('categories.item', [ 'category_name' => $newscategory->name]) }}">{{ $newscategory->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="pl-30">
                                @foreach( (newscategories()) as $key=>$newscategory )
                                    @if($newscategory->menu_publish && $key>4)
                                        <li>
                                            <a href="{{ route('categories.item', [ 'category_name' => $newscategory->name]) }}">{{ $newscategory->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-grid-items">
                <div class="news10-ftr-items">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul>
                                <li><a href="{{route('home')}}">{{ home() }}</a>
                                <li> <a href="{{ route('contactus') }}">{{ contactus() }}</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <div class="news_letter_news10">
                                <h4>{{__('Newsletter')}}</h4>
                                <form>
                                    @csrf
                                    <div class="footer-group">
                                        <input type="email" placeholder="{{ __('Enter Your Email Address') }}" class="form-control" name="email" id="maanEmail">
                                        <span type="button" class="subscribe"><i class="fa fa-paper-plane"></i></span>
                                    </div>
                                </form>
                                <p>{{__('We Never Spame')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="row">
                <div class="col-lg-4">
                    <div class="social_icons">
                        <ul>
                            @foreach(socials() as $social)
                                <li><a href="{{$social->url}}"><i class="{{$social->icon_code}}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-last">
                    <div class="news10-footer-appstore">
                        <ul>
                            <li><a href="@if (!empty($settings->play_store_url)){{url($settings->play_store_url)}}@endif"><img src="{{ asset('frontend/img/footer/playstore.png') }}" alt=""></a></li>
                            <li><a href="@if (!empty($settings->app_store_url)){{url($settings->app_store_url)}}@endif"><img src="{{ asset('frontend/img/footer/apple.png') }}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <span>{{__('©')}}{{ get_option('company-info')['copyright'] ?? '' }}</span>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->
