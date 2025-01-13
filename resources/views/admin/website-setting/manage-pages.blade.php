@extends('layouts.master')

@section('title')
    {{ __('CMS Manage') }}
@endsection

@section('main_content')
    <div class="tab-content min-vh-100">
        <div class="tab-pane fade active show" id="add-new-petty" role="tabpanel">
            <div class="table-header border-0">
            </div>
            <div class="row justify-content-center px-4">
                <div class="col-sm-12">
                    <div class="order-form-section">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4 my-2">
                                <div class="card">
                                    <div class="card-body p-2">
                                        <ul class="nav nav-pills flex-column w-280">
                                            <li class="nav-item">
                                                <a href="#home-one" id="home-tab4"class="add-report-btn nav-link active"
                                                    data-bs-toggle="tab">{{ __('Home One') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#home-two" class="add-report-btn nav-link"
                                                    data-bs-toggle="tab">{{ __('Home Two') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#menu-title" class="add-report-btn nav-link"
                                                    data-bs-toggle="tab">{{ __('Menu Title') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#all-pages" class="add-report-btn nav-link"
                                                    data-bs-toggle="tab">{{ __('All Pages') }}</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="#contact-us" class="add-report-btn nav-link"
                                                    data-bs-toggle="tab">{{ __('Contact Us') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#footer-section" class="add-report-btn nav-link"
                                                    data-bs-toggle="tab">{{ __('Footer Section') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-8 my-2">
                                <div class="card shadow">
                                    <div class="card-body p-4">
                                        <form action="{{ route('admin.website-settings.update', 'manage-pages') }}"
                                            method="post" class="ajaxform_instant_reload">
                                            @csrf
                                            @method('PUT')

                                            <div class="tab-content no-padding">

                                                {{-- Home one Start --}}
                                                <div class="tab-pane fade show active" id="home-one">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label>{{ __('Top Category') }}</label>
                                                            <input type="text" name="top_category_title"
                                                                value="{{ $page_data['headings']['top_category_title'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>{{ __('Most Popular Title') }}</label>
                                                            <input type="text" name="most_popular_title"
                                                                value="{{ $page_data['headings']['most_popular_title'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>{{ __('Stay Connected Title') }}</label>
                                                            <input type="text" name="stay_connected_title"
                                                                value="{{ $page_data['headings']['stay_connected_title'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>{{ __('Follower Text One') }}</label>
                                                            <input type="text" name="follower_text_one"
                                                                value="{{ $page_data['headings']['follower_text_one'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>{{ __('Follower Text Two') }}</label>
                                                            <input type="text" name="follower_text_two"
                                                                value="{{ $page_data['headings']['follower_text_two'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>{{ __('Follower Text Three') }}</label>
                                                            <input type="text" name="follower_text_three"
                                                                value="{{ $page_data['headings']['follower_text_three'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>{{ __('Follower Text Four') }}</label>
                                                            <input type="text" name="follower_text_four"
                                                                value="{{ $page_data['headings']['follower_text_four'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>{{ __('Title') }}</label>
                                                            <input type="text" name="title_text"
                                                                value="{{ $page_data['headings']['title_text'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Home one End --}}

                                                {{-- Home Two start --}}
                                                <div class="tab-pane fade" id="home-two">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label>{{ __('Breaking News Title') }}</label>
                                                            <input type="text" name="breaking_news_title"
                                                                value="{{ $page_data['headings']['breaking_news_title'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>{{ __('Trending News Title') }}</label>
                                                            <input type="text" name="trending_news_title"
                                                                value="{{ $page_data['headings']['trending_news_title'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>{{ __('Weekly Reviews') }}</label>
                                                            <input type="text" name="weekly_reviews"
                                                                value="{{ $page_data['headings']['weekly_reviews'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>{{ __("Editor's Picks") }}</label>
                                                            <input type="text" name="editor_picks"
                                                                value="{{ $page_data['headings']['editor_picks'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>{{ __('Button Text') }}</label>
                                                            <input type="text" name="show_all_btn_text"
                                                                value="{{ $page_data['headings']['show_all_btn_text'] ?? '' }}"
                                                                placeholder="{{ __('Enter Text') }}" class="form-control">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>{{ __('Feature Post') }}</label>
                                                            <input type="text" name="feature_post_title"
                                                                value="{{ $page_data['headings']['feature_post_title'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" class="form-control">
                                                        </div>

                                                        <div class="col-6">
                                                            <label>{{ __('Feature Video Title') }}</label>
                                                            <input type="text" name="feature_video_title"
                                                                value="{{ $page_data['headings']['feature_video_title'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Home Two End --}}

                                                {{-- Menu Title start --}}
                                                <div class="tab-pane fade" id="menu-title">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>{{ __('Menu Title One') }}</label>
                                                            <input type="text" name="menu_title_one"
                                                                value="{{ $page_data['headings']['menu_title_one'] ?? '' }}"
                                                                placeholder="{{ __('Enter Menu Title') }}" required
                                                                class="form-control">
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label>{{ __('Menu Title Two') }}</label>
                                                            <input type="text" name="menu_title_two"
                                                                value="{{ $page_data['headings']['menu_title_two'] ?? '' }}"
                                                                placeholder="{{ __('Enter Menu Title') }}" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Home Title End --}}

                                                {{-- All Pages Common Text start --}}
                                                <div class="tab-pane fade" id="all-pages">
                                                    <div class="row">

                                                        <div class="col-lg-6">
                                                            <label>{{ __('Home Title') }}</label>
                                                            <input type="text" name="home_title"
                                                                value="{{ $page_data['headings']['home_title'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label>{{ __('Popular Post Title') }}</label>
                                                            <input type="text" name="popular_post_title"
                                                                value="{{ $page_data['headings']['popular_post_title'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label>{{ __('Gallery Title') }}</label>
                                                            <input type="text" name="gallery_title"
                                                                value="{{ $page_data['headings']['gallery_title'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" class="form-control">
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label>{{ __('Recent Post Title') }}</label>
                                                            <input type="text" name="recent_post_title"
                                                                value="{{ $page_data['headings']['recent_post_title'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label>{{ __('Tag Title') }}</label>
                                                            <input type="text" name="tags_title"
                                                                value="{{ $page_data['headings']['tags_title'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                    </div>
                                                </div>
                                                {{--  All Pages Common Text  End --}}

                                                {{-- Contact Us start --}}
                                                <div class="tab-pane fade" id="contact-us">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>{{ __('Get In Touch') }}</label>
                                                            <input type="text" name="get_in_touch"
                                                                value="{{ $page_data['headings']['get_in_touch'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label>{{ __('Address') }}</label>
                                                            <input type="text" name="contact_address"
                                                                value="{{ $page_data['headings']['contact_address'] ?? '' }}"
                                                                placeholder="{{ __('Enter Text') }}" class="form-control">
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label>{{ __('Phone Text') }}</label>
                                                            <input type="text" name="contact_phone"
                                                                value="{{ $page_data['headings']['contact_phone'] ?? '' }}"
                                                                placeholder="{{ __('Enter Text') }}" class="form-control">
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label>{{ __('Email Text') }}</label>
                                                            <input type="text" name="contact_email"
                                                                value="{{ $page_data['headings']['contact_email'] ?? '' }}"
                                                                placeholder="{{ __('Enter Text') }}" class="form-control">
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label>{{ __('Form Button Text') }}</label>
                                                            <input type="text" name="contact_btn_text"
                                                                value="{{ $page_data['headings']['contact_btn_text'] ?? '' }}"
                                                                placeholder="{{ __('Enter Text') }}" class="form-control">
                                                        </div>

                                                    </div>
                                                </div>
                                                {{-- Contact Us End --}}

                                                {{-- All Pages Common Text start --}}
                                                <div class="tab-pane fade" id="footer-section">
                                                    <div class="row">

                                                        <div class="col-lg-6">
                                                            <label>{{ __('Post Title') }}</label>
                                                            <input type="text" name="footer_post_title"
                                                                value="{{ $page_data['headings']['footer_post_title'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label>{{ __('News') }}</label>
                                                            <input type="text" name="footer_news_title"
                                                                value="{{ $page_data['headings']['footer_news_title'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label>{{ __('About') }}</label>
                                                            <input type="text" name="footer_about_title"
                                                                value="{{ $page_data['headings']['footer_about_title'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label>{{ __('News Tags Title') }}</label>
                                                            <input type="text" name="footer_news_tag_title"
                                                                value="{{ $page_data['headings']['footer_news_tag_title'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label>{{ __('Subscribe Text') }}</label>
                                                            <input type="text" name="footer_subscribe_text"
                                                                value="{{ $page_data['headings']['footer_subscribe_text'] ?? '' }}"
                                                                placeholder="{{ __('Enter Title') }}" required class="form-control">
                                                        </div>

                                                    </div>
                                                </div>

                                                @can('manage-pages-update')
                                                    <div class="col-lg-12">
                                                        <div class="button-group text-center mt-3">
                                                            <button class="theme-btn m-2 submit-btn">{{ __('Update') }}</button>
                                                        </div>
                                                    </div>
                                                @endcan
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
