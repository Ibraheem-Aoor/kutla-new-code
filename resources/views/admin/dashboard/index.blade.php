@php
use Carbon\Carbon;
@endphp

@extends('layouts.master')

@section('title')
    {{ __('Dashboard') }}
@endsection

@section('main_content')
    <div class="">
        <div class="mx-4">
            <div class="header-stat   ">
                <div class="row justify-content-between gap-3  ">
                  <div class="row news-user-container col-12 col-md-4  ">
                    <div class='col-12 col-lg-5 d-flex flex-column gap-4 justify-content-center align-items-center news-user '>
                          <div class='d-flex flex-column align-items-center'>
                              <h5 class='total-viewers'>{{ $total_viewers }}</h5>
                              <h6 class='news-reader text-center'>{{ __('News Reader') }}</h6>
                          </div>
                          <div class='d-flex gap-4'>
                              <div class="d-flex flex-column align-items-center">
                                  <p class="subscribe">
                                      {{ $subscribe }}
                                  </p>
                                  <h5 class="subscriber-user">{{ __('Subscriber User') }}</h5>
                              </div>
                              <div class="d-flex flex-column align-items-center">
                                  <p class='free-user'>{{ $total_free_users }}</p>
                                  <h5 class='free-user-title'>{{ __('Users') }}</h5>
                              </div>
                          </div>
                  </div>
                 <div class="col-12 col-lg-7">
                     <img class='news-img ' src="{{ asset('assets/images/dashboard/news-update.svg') }}" alt="">
                 </div>
                </div>

                <div class=" counter-container p-0 col-12 col-md-8 ">


                    <div class="couter-box2 col-4">
                        <div class="icons">
                            <img src="{{ asset('assets/images/dashboard/svg/02.svg') }}" alt="">
                        </div>
                        <div class="content-side">

                            <h5 class='text-center pt-2 pb-2'>
                                {{ $total_language }}+
                                <sup id="innerspan">{{ __('') }}</sup>
                            </h5>
                            <p>{{ __('Language') }}</p>

                        </div>
                    </div>

                    <div class="couter-box3 col-4">
                        <div class="icons">
                            <img src="{{ asset('assets/images/dashboard/svg/03.svg') }}" alt="">
                        </div>
                        <div class="content-side">

                            <h5 class='text-center pt-2 pb-2'>
                                {{ __('4+') }}
                                <sup id="innerspan">{{ __('') }}</sup>
                            </h5>
                            <p>{{ __('Ads Space') }}</p>

                        </div>
                    </div>

                    <div class="couter-box4 col-4">
                        <div class="icons">
                            <img src="{{ asset('assets/images/dashboard/svg/04.svg') }}" alt="">
                        </div>
                        <div class="content-side">

                            <h5 class='text-center pt-2 pb-2'>
                                {{ $total_news_category }}+
                                <sup id="innerspan">{{ __('') }}</sup>
                            </h5>
                            <p>{{ __('Category') }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-lg-4  p-0 d-flex flex-column gap-3">
                <div class="d-flex align-items-center p-3 news1  gap-2">
                    <div class="col-lg-2">
                        <img src="{{ asset('assets/images/dashboard/news-svg/01.svg') }}" alt="">
                    </div>
                    <div class="col-lg-10">
                        <h5 class="news-count1">{{ $publish_news }}</h5>
                        <h5 class="news-title1">{{ __('Published News') }}</h5>
                    </div>
                </div>

                <div class="d-flex align-items-center p-3 news2  gap-2">
                    <div class="col-lg-2">
                        <img src="{{ asset('assets/images/dashboard/news-svg/02.svg') }}" alt="">
                    </div>
                    <div class="col-lg-10">
                        <h5 class="news-count2">{{ $unpublish_news }}</h5>
                        <h5 class="news-title2">{{ __('Draft News') }}</h5>
                    </div>
                </div>

                <div class="d-flex align-items-center p-3 news3  gap-2">
                    <div class="col-lg-2">
                        <img src="{{ asset('assets/images/dashboard/news-svg/03.svg') }}" alt="">
                    </div>
                    <div class="col-lg-10">
                        <h5 class="news-count3">{{ $breaking_news }}</h5>
                        <h5 class="news-title3">{{ __('Breaking News') }}</h5>
                    </div>
                </div>

                <div class="d-flex align-items-center p-3 news4 gap-2">
                    <div class="col-lg-2 ">
                        <img src="{{ asset('assets/images/dashboard/news-svg/04.svg') }}" alt="">
                    </div>
                    <div class="col-lg-10">
                        <h5 class="news-count4">{{ $total_blogs }}</h5>
                        <h5 class="news-title4">{{ __('Total Blogs') }}</h5>
                    </div>
                </div>

            </div>
            <div class="col-lg-8 ">
                <div class="subscription-container">
                    <div class="card-header subscription-header d-flex justify-content-between align-items-center">
                    <h4 class="order-1 mb-0 user-statistic-title">{{__('User Statistic')}}</h4>

                        <div class="gpt-up-down-arrow position-relative order-2">
                            <select class="form-control user-statistics">
                                @for ($i = date('Y'); $i >= 2022; $i--)
                                    <option @selected($i == date('Y')) value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <!-- <div class="card-body pt-0">
                    </div> -->
                    <canvas id="monthly-statistics"  class="chart-css"></canvas>
                </div>
            </div>
        </div>

        <div class="">
            <div class="view-comment-category-container gap-3 mt-4">
                <div class="col-lg-4 most-viewed-container">
                    <h5 class="mb-2 most-viewed-title">{{ __('Most Viewed News') }}</h5>
                    <hr>
                    <div class="most-viewed-content">

                        @foreach ($most_viewed_news as $news)
                        <div class=" mb-3 ">
                            <div class="d-flex align-items-center justify-items-center gap-2 border rounded">
                                <div class="col-md-4">
                                    @php
                                        $images = json_decode($news->image, true);
                                    @endphp
                                    @if ($images)
                                        @foreach ($images as $image)
                                            @if (File::exists($image))
                                                <img src="{{ asset($image) }}" class="most-img" alt="">
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div class="">
                                        <div class="d-flex align-items-center justify-items-center gap-2">
                                           <img class='' src="{{ asset('assets/images/dashboard/svg/category-border.png') }}" alt="">
                                            <p class="most-viewed-category">{{ $news->subCategories?->name }}</p>
                                        </div>
                                        <p class="most-viewed-card-text">{{ Str::limit($news->title, 22) }}</p>
                                        <p>
                                            <span class='viewers'><i class="fal fa-eye"></i> {{ $news->viewers }}</span>
                                            <span class='comments'><i class="fal fa-comment-alt"></i> {{ $news->comments_count }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4 comment-container">
                    <h5 class='latest-comment-title'>{{ __('Latest Comments') }}</h5>
                    <hr>
                    <div class="latest-comment-content">
                        @foreach ( $latest_comments as $comments )
                        <div class="d-flex justify-content-between p-2 single-message">
                          <div class=" ">
                             <div class="d-flex gap-2">
                                <div class="">
                                   <img src="{{ asset('assets/images/icons/default-user.png') }}" alt="">
                                </div>
                                <div class="">
                                    <h6>{{ $comments->name }}</h6>
                                    <p>{{ Str::limit($comments->comment, 20) }}</p>
                                </div>
                             </div>
                          </div>
                          <div class="">
                            <p>{{ Carbon::parse($comments->created_at)->diffForHumans() }}</p>
                          </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4" >
                    <div class="category-wise-news-container">
                        <h5 class='category-title'>{{ __('Category Wise News') }}</h5>
                        <hr>
                        <canvas id="category-statistics"></canvas>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <input type="hidden" value="{{ route('admin.yearly-statistics') }}" id="yearly-statistics-url">
    <input type="hidden" value="{{ route('admin.category-statistics') }}" id="category-statistics-url">

@endsection
@push('js')
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            getYearlyStatistics(year = new Date().getFullYear());
            getCategoryStatistics();
        })
    </script>
@endpush
