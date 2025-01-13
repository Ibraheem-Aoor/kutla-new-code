@extends('layouts.master')

@section('title')
    {{__('Seo Optimization')}}
@endsection

@section('main_content')
    <div class="erp-table-section">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-bs-toggle="pill"
                                            href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                            aria-selected="true">{{ __('SEO Settings') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-bs-toggle="pill"
                                            href="#custom-tabs-one-profile" role="tab"
                                            aria-controls="custom-tabs-one-profile"
                                            aria-selected="false">{{ __('Sitemap') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-home-tab">

                                        <div class="table-header p-16">
                                            <h4>{{ __('SEO Optimization') }}</h4>
                                            @can('seo-create')
                                                    <button type="button" class="theme-btn print-btn text-light"
                                                        data-bs-toggle="modal" data-bs-target="#create-seo"><span
                                                            class="fas fa-plus"></span>
                                                        {{ __('Add') }}
                                                    </button>
                                            @endcan
                                        </div>

                                        <div class="responsive-table m-0">
                                            <table class="table" id="datatable">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('SL') }}.</th>
                                                        <th>{{ __('Keywords') }}</th>
                                                        <th>{{ __('Author') }}</th>
                                                        <th>{{ __('Meta Title') }}</th>
                                                        <th>{{ __('Meta Description') }}</th>
                                                        <th>{{ __('Google Analytics') }}</th>
                                                        <th class="maanaction">{{ __('Action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @include('admin.seo.datas')
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- /.card-body -->
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

                                        <div class="table-header p-16">
                                            <h4>{{ __('Sitemap') }}</h4>
                                            @can('seo-create')
                                            <a href="{{ route('admin.seo.sitemap') }}"
                                             class="theme-btn print-btn text-light"><span
                                                    class="fas fa-plus"></span>
                                                {{ __('Generate Sitemap') }}
                                            </a>
                                        @endcan
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered maantable">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('SL') }}.</th>
                                                            <th>{{ __('Sitemap') }}</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ __('1') }}</td>
                                                            @can('seo-create')
                                                                <td>
                                                                    <a href="{{ asset('sitemap.xml') }}" download><i class="fa fa-download" aria-hidden="true"></i></a>
                                                                </td>
                                                            @endcan
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->
                                    </div>

                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                </div>


            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->
    </div>

@push('modal')
    @include('admin.seo.create')
    @include('admin.seo.edit')
@endpush

@endsection
