@extends('layouts.master')

@section('main_content')
    <!-- Main content -->
    <div class="erp-table-section">
        <div class="container-fluid">
            <div class="card">
                <div class="card-bodys">
                    <div class="table-header p-16">
                        <h4>{{ __('Theme List') }}</h4>
                        <a href="#create-theme" class="theme-btn print-btn text-light" data-bs-toggle="modal">
                            <i class="far fa-plus" aria-hidden="true"></i>
                            {{ __('Add') }}
                        </a>
                    </div>

                    <div class="table-top-form p-16-0">
                        <form action="" method="post" class="filter-form" table="#theme-data">
                            @csrf
                            <div class="table-top-left d-flex gap-3 margin-l-16">
                                <div class="gpt-up-down-arrow position-relative">
                                    <select name="per_page" class="form-control">
                                        <option value="10">{{ __('Show- 10') }}</option>
                                        <option value="25">{{ __('Show- 25') }}</option>
                                        <option value="50">{{ __('Show- 50') }}</option>
                                        <option value="100">{{ __('Show- 100') }}</option>
                                        <option value="1000">{{ __('Show All') }}</option>
                                    </select>
                                    <span></span>
                                </div>

                                <div class="table-search position-relative">
                                    <input class="form-control" type="text" name="search"
                                        placeholder="{{ __('Search...') }}" value="{{ request('search') }}">
                                    <span class="position-absolute">
                                        <img src="{{ asset('assets/images/search.svg') }}" alt="">
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    @include('admin.themes.datas')
                </div>

                {{-- <div class="maan-news-theme-container">
                    <div class="maan-news-theme-list-wrapper">
                        @foreach ($themes as $theme)
                            <div class="maan-news-theme-items card  ">
                                <div class="theme-img">
                                    <img src="{{ asset($theme->image) }}" alt="theme-img">
                                </div>
                                <div class="">
                                    <div class="theme-discription-content ">
                                        <h3>{{ $theme->title }}</h3>
                                        <p>{{ __('Author:') }} {{ $theme->author }} </p>
                                        <p>{{ __('Version:') }} {{ $theme->version }}</p>
                                        <p class=''>{{ __('Description:') }} {{ $theme->description }}</p>
                                    </div>
                                    @if ($theme->is_active == 1)
                                        <button class="btn news-theme-btn status-item active-btn"
                                            id="theme_active_{{ $theme->id }}" data-id ="{{ $theme->id }}"
                                            data-is-active="{{ $theme->is_active }}" data-status-text="Theme Active"
                                            disabled>{{ __('Activated') }}</button>
                                    @else
                                        <button class="btn news-theme-btn status-item deactive-btn"
                                            id="theme_active_{{ $theme->id }}" data-id ="{{ $theme->id }}"
                                            data-is-active="{{ $theme->is_active }}"
                                            data-status-text="Theme Active">{{ __('Deactivated') }}</button>
                                    @endif

                                    <a href="" class="btn news-theme-btn btn-primary edit-item"
                                        id="edit-theme_{{ $theme->id }}" data-toggle="modal"
                                        data-target="#modal-default" data-id ="{{ $theme->id }}"
                                        data-title ="{{ $theme->title }}" data-author ="{{ $theme->author }}"
                                        data-description ="{{ $theme->description }}" data-page ="{{ $theme->page }}"
                                        data-version ="{{ $theme->version }}">{{ __('Edit') }}</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div> --}}

            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->
    </div>
    
    @push('modal')
        @include('admin.themes.create')
        @include('admin.themes.edit')
    @endpush
@endsection
