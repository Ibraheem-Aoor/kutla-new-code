@extends('layouts.master')

@section('title')
    {{ __('Ads Settings') }}
@endsection

@section('main_content')
    <div class="erp-table-section">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-bs-toggle="pill"
                                            href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                            aria-selected="true">{{ __('Ads Settings') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-bs-toggle="pill"
                                            href="#custom-tabs-one-profile" role="tab"
                                            aria-controls="custom-tabs-one-profile"
                                            aria-selected="false">{{ __('Header code') }}</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-home-tab">

                                        <div class="table-header p-16">
                                            <h4>{{ __('Ad Spaces') }}</h4>
                                            @can('ads-create')
                                                <a href="#create-ads-modal" class="theme-btn print-btn text-light"
                                                    data-bs-toggle="modal" data-bs-target="#create-ads-modal">
                                                    <i class="far fa-plus" aria-hidden="true"></i>
                                                    {{ __('Add') }}
                                                </a>
                                            @endcan
                                        </div>

                                        <div class="responsive-table m-0">
                                            <table class="table" id="datatable">
                                                <thead>
                                                    <tr>
                                                        @can('blog-sub-categories-delete')
                                                            <th>
                                                                <div class="d-flex align-items-center gap-1">
                                                                    <label class="table-custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="table-hidden-checkbox selectAllCheckbox">
                                                                        <span
                                                                            class="table-custom-checkmark custom-checkmark"></span>
                                                                    </label>
                                                                    <i class="fal fa-trash-alt delete-selected"></i>
                                                                </div>
                                                            </th>
                                                        @endcan
                                                        <th>{{ __('SL') }}.</th>
                                                        <th>{{ __('Header Ads') }}</th>
                                                        <th>{{ __('Sidebar Ads') }}</th>
                                                        <th>{{ __('Before Ads') }}</th>
                                                        <th>{{ __('After Ads') }}</th>
                                                        <th class="maanaction">{{ __('Action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="">
                                                    @include('admin.ads.ads.datas')
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>

                                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-profile-tab">
                                        <div class="table-header p-16">
                                            <h4>{{ __('Header code') }}</h4>
                                            @can('ads-create')
                                                <a href="#create-header" class="theme-btn print-btn text-light"
                                                    data-bs-toggle="modal" data-bs-target="#create-header">
                                                    <i class="far fa-plus" aria-hidden="true"></i>
                                                    {{ __('Add') }}
                                                </a>
                                            @endcan
                                        </div>

                                        <div class="responsive-table m-0">
                                            <table class="table" id="datatable">
                                                <thead>
                                                    <tr>
                                                        @can('blog-sub-categories-delete')
                                                            <th>
                                                                <div class="d-flex align-items-center gap-1">
                                                                    <label class="table-custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="table-hidden-checkbox selectAllCheckbox">
                                                                        <span
                                                                            class="table-custom-checkmark custom-checkmark"></span>
                                                                    </label>
                                                                    <i class="fal fa-trash-alt delete-selected"></i>
                                                                </div>
                                                            </th>
                                                        @endcan
                                                        <th>{{ __('SL') }}.</th>
                                                        <th>{{ __('Header Code') }}</th>
                                                        <th>{{ __('Action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="">
                                                    @include('admin.ads.header-code.datas')
                                                </tbody>
                                            </table>
                                        </div>

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
@push('modal')
        @include('admin.ads.ads.create')
        @include('admin.ads.ads.edit')
        @include('admin.ads.header-code.create')
        @include('admin.ads.header-code.edit')
@endpush
@push('modal')
    @include('admin.components.multi-delete-modal')
@endpush
