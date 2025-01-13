@extends('layouts.master')

@section('title')
    {{ __('Settings') }}
@endsection

@section('main_content')
    <div class="erp-table-section min-vh-100">
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
                                            aria-selected="true">{{ __('App Name') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-bs-toggle="pill"
                                            href="#custom-tabs-one-profile" role="tab"
                                            aria-controls="custom-tabs-one-profile"
                                            aria-selected="false">{{ __('App Icon') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-bs-toggle="pill"
                                            href="#custom-tabs-one-messages" role="tab"
                                            aria-controls="custom-tabs-one-messages"
                                            aria-selected="false">{{ __('App Logo') }}</a>
                                    </li>

                                </ul>
                            </div>


                            <div class="">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-home-tab">

                                        <div class="table-header p-16">
                                            <h4>{{ __('Settings List') }}</h4>
                                            @if (count($settings) < 0)
                                            @can('site-settings-create')
                                                    <button type="button" class="theme-btn print-btn text-light"
                                                        data-bs-toggle="modal" data-bs-target="#modal-default"><span
                                                            class="fas fa-plus"></span>
                                                        {{ __('Add New') }}
                                                    </button>
                                                @endcan
                                            @endif
                                        </div>

                                        <div class="responsive-table m-0">
                                            <table class="table" id="datatable">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('SL') }}.</th>
                                                        <th>{{ __('Title') }}</th>
                                                        <th>{{ __('Name') }}</th>
                                                        <th>{{ __('Short Name') }}</th>
                                                        <th>{{ __('Footer Content') }}</th>
                                                        <th>{{ __('Play Store URL') }}</th>
                                                        <th>{{ __('App Store URL') }}</th>
                                                        <th class="maanaction">{{ __('Action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($settings as $setting)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $setting->title }} </td>
                                                            <td>{{ $setting->name }} </td>
                                                            <td>{{ $setting->short_name }} </td>
                                                            <td>{{ $setting->footer_content }} </td>
                                                            <td>{{ $setting->play_store_url }} </td>
                                                            <td>{{ $setting->app_store_url }} </td>

                                                            <td class="print-d-none">
                                                                <div class="dropdown table-action">
                                                                    <button type="button" data-bs-toggle="dropdown">
                                                                        <i class="far fa-ellipsis-v"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        @can('site-settings-update')
                                                                            <li>
                                                                                <a href="" class="edit-item"
                                                                                    id="edit-item_{{ $setting->id }}"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal-default-edit"
                                                                                    data-id ="{{ $setting->id }}"
                                                                                    data-title ="{{ $setting->title }}"
                                                                                    data-name ="{{ $setting->name }}"
                                                                                    data-short-name ="{{ $setting->short_name }}"
                                                                                    data-footer-content ="{{ $setting->footer_content }}"data-play-store-url="{{ $setting->play_store_url }}"
                                                                                    data-app-store-url="{{ $setting->app_store_url }}">
                                                                                    <i class="fal fa-pencil-alt"></i>
                                                                                    {{ __('Edit') }}
                                                                                </a>
                                                                            </li>
                                                                        @endcan
                                                                        @if ($loop->iteration > 1)
                                                                            @can('site-settings-delete')
                                                                                <li>
                                                                                    <a href="{{ route('admin.settings.destroy', $setting->id) }}"
                                                                                        class="confirm-action"
                                                                                        data-method="DELETE">
                                                                                        <i class="fal fa-trash-alt"></i>
                                                                                        {{ __('Delete') }}
                                                                                    </a>
                                                                                </li>
                                                                            @endcan
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{-- App name End --}}

                                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-profile-tab">

                                        <div class="table-header p-16">
                                            <h4>{{ __('Settings List') }}</h4>
                                            @if (count($settings) < 0)
                                            @can('site-settings-create')
                                                    <button type="button" class="theme-btn print-btn text-light"
                                                        data-bs-toggle="modal" data-bs-target="#modal-icon"><span
                                                            class="fas fa-plus"></span>
                                                        {{ __('Add Icon') }}
                                                    </button>
                                                @endcan
                                            @endif
                                        </div>

                                        <div class="responsive-table m-0">
                                            <table class="table" id="datatable">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('SL') }}.</th>
                                                        <th>{{ __('Favicon') }}</th>
                                                        <th>{{ __('Icon') }}</th>
                                                        <th>{{ __('Frontend Logo') }}</th>
                                                        <th class="maanaction">{{ __('Action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($settings as $setting)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td><img src="{{ asset($setting->favicon) }}"></td>
                                                            <td><img src="{{ asset($setting->icon) }}"></td>
                                                            <td><img src="{{ asset($setting->frontend_logo) }}"></td>

                                                            <td class="print-d-none">
                                                                <div class="dropdown table-action">
                                                                    <button type="button" data-bs-toggle="dropdown">
                                                                        <i class="far fa-ellipsis-v"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        @can('site-settings-update')
                                                                            <li>
                                                                                <a href="" class="edit-item-icon"
                                                                                    data-url="{{ route('admin.settings.update', $setting->id) }}"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal-icon-edit"
                                                                                    data-favicon ="{{ asset($setting->favicon) }}"
                                                                                    data-icon-update ="{{ asset($setting->icon) }}"
                                                                                    data-frontend-logo ="{{ asset($setting->frontend_logo) }}"
                                                                                    >
                                                                                    <i class="fal fa-pencil-alt"></i>
                                                                                    {{ __('Edit') }}
                                                                                </a>
                                                                            </li>
                                                                        @endcan
                                                                        @if ($loop->iteration > 1)
                                                                            @can('site-settings-delete')
                                                                                <li>
                                                                                    <a href="{{ route('admin.settings.destroy', $setting->id) }}"
                                                                                        class="confirm-action"
                                                                                        data-method="DELETE">
                                                                                        <i class="fal fa-trash-alt"></i>
                                                                                        {{ __('Delete') }}
                                                                                    </a>
                                                                                </li>
                                                                            @endcan
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                    {{-- App Icon End --}}

                                    <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-messages-tab">
                                        <div class="table-header p-16">

                                            <h4>{{ __('Settings List') }}</h4>
                                            <div class="col-2 text-end ">
                                                @if (count($settings) < 0)
                                                @can('site-settings-create')
                                                    <button type="button" class="theme-btn print-btn text-light"
                                                        data-bs-toggle="modal" data-bs-target="#modal-logo"><span
                                                            class="fas fa-plus"></span>
                                                        {{ __('Add Logo') }}
                                                    </button>
                                                @endcan
                                                @endif
                                            </div>
                                        </div>

                                        <div class="responsive-table m-0">
                                            <table class="table" id="datatable">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('SL') }}.</th>
                                                        <th>{{ __('Logo') }}</th>
                                                        <th>{{ __('Footer Logo') }}</th>
                                                        <th class="maanaction">{{ __('Action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($settings as $setting)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td><img src="{{ asset($setting->logo) }}"></td>
                                                            <td><img class="logo_footer"
                                                                    src="{{ asset($setting->logo_footer) }}"></td>
                                                            <td class="print-d-none">
                                                                <div class="dropdown table-action">
                                                                    <button type="button" data-bs-toggle="dropdown">
                                                                        <i class="far fa-ellipsis-v"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        @can('site-settings-update')
                                                                            <li>
                                                                                <a href="" class="edit-item-logo"
                                                                                    data-url="{{ route('admin.settings.update', $setting->id) }}"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal-logo-edit"
                                                                                    data-logo-update ="{{ asset($setting->logo) }}"
                                                                                    data-logo-footer-update ="{{ asset($setting->logo_footer) }}">
                                                                                    <i class="fal fa-pencil-alt"></i>
                                                                                    {{ __('Edit') }}
                                                                                </a>
                                                                            </li>

                                                                        @endcan
                                                                        @if ($loop->iteration > 1)
                                                                            @can('site-settings-delete')
                                                                                <li>
                                                                                    <a href="{{ route('admin.settings.destroy', $setting->id) }}"
                                                                                        class="confirm-action"
                                                                                        data-method="DELETE">
                                                                                        <i class="fal fa-trash-alt"></i>
                                                                                        {{ __('Delete') }}
                                                                                    </a>
                                                                                </li>
                                                                            @endcan
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

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

    <!-- Modal -->
    <div class="modal fade" id="modal-default" tabindex="-1" aria-labelledby="modalDefaultLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDefaultLabel">{{ __('Create Settings') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Form start -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.settings.store') }}" enctype="multipart/form-data"
                        class="ajaxform_instant_reload">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <label for="title" class="form-label">{{ __('Title') }}</label>
                                    <input type="text" class="form-control" placeholder="Enter Title" name="title"
                                        id="title">
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" placeholder="Enter Name" name="name"
                                        id="name">
                                </div>

                                <div class="form-group">
                                    <label for="short_name" class="form-label">{{ __('Short Name') }}</label>
                                    <input type="text" class="form-control" placeholder="Enter Short Name"
                                        name="short_name" id="short_name">
                                </div>

                                <div class="form-group">
                                    <label for="footer_content" class="form-label">{{ __('Footer Content') }}</label>
                                    <input type="text" class="form-control" placeholder="Enter Content"
                                        name="footer_content" id="footer_content">
                                </div>

                                <div class="form-group">
                                    <label for="play_store_url" class="form-label">{{ __('Play Store URL') }}</label>
                                    <input type="text" class="form-control" placeholder="Enter url"
                                        name="play_store_url" id="play_store_url">
                                </div>

                                <div class="form-group">
                                    <label for="app_store_url" class="form-label">{{ __('App Store URL') }}</label>
                                    <input type="text" class="form-control" placeholder="Enter app url"
                                        name="app_store_url" id="app_store_url">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="button-group text-center mt-4">
                                <button type="reset" class="theme-btn border-btn m-2">{{ __('Cancel') }}</button>
                                <button class="theme-btn m-2 submit-btn">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal edit-->

    <div class="modal fade" id="modal-default-edit" tabindex="-1" aria-labelledby="modal-default-edit-label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-default-edit-label">{{ __('Edit Settings') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- form start -->
                <div class="modal-body">
                    <form id="editformname" method="POST" action="" enctype="multipart/form-data"
                        class="ajaxform_instant_reload">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="form-group">
                                <label for="faviconicon">{{ __('Title') }}</label>
                                <input type="text" class="form-control" placeholder="Enter Title" name="title"
                                    id="edit_title">
                            </div>
                            <div class="form-group">
                                <label for="contentimage">{{ __('Name') }}</label>
                                <input type="text" class="form-control" placeholder="Enter Name" name="name"
                                    id="edit_name">
                            </div>
                            <div class="form-group">
                                <label for="contentimage">{{ __('Short Name') }}</label>
                                <input type="text" class="form-control" placeholder="Enter short name"
                                    name="short_name" id="edit_short_name">
                            </div>
                            <div class="form-group">
                                <label for="edit_footer_content">{{ __('Footer Content') }}</label>
                                <input type="text" class="form-control" placeholder="Enter Content"
                                    name="footer_content" id="edit_footer_content">
                            </div>
                            <div class="form-group">
                                <label for="edit_footer_content">{{ __('Play Store URL') }}</label>
                                <input type="text" class="form-control" placeholder="Enter url" name="play_store_url"
                                    id="edit_play_store_url">
                            </div>
                            <div class="form-group">
                                <label for="edit_footer_content">{{ __('App Store URL') }}</label>
                                <input type="text" class="form-control" placeholder="Enter url" name="app_store_url"
                                    id="edit_app_store_url">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="button-group text-center mt-4">
                                <button type="reset" class="theme-btn border-btn m-2">{{ __('Cancel') }}</button>
                                <button class="theme-btn m-2 submit-btn">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-icon" tabindex="-1" aria-labelledby="modal-icon-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-icon-label">{{ __('New Icon') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- form start -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.settings.store') }}" enctype="multipart/form-data"
                        class="ajaxform_instant_reload">
                        @csrf

                        <div class="row">
                            <div class="form-group">
                                <label for="faviconicon">{{ __('Favicon') }}</label>
                                <input type="file" class="form-control" name="favicon" id="favicon">
                            </div>
                            <div class="form-group">
                                <label for="contentimage">{{ __('Icon') }}</label>
                                <input type="file" class="form-control" name="icon" id="icon">
                            </div>

                            <div class="form-group">
                                <label for="contentimage">{{ __('Frontend Logo') }}</label>
                                <input type="file" class="form-control" name="frontend_logo" id="frontend_logo">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="button-group text-center mt-4">
                                <button type="reset" class="theme-btn border-btn m-2">{{ __('Cancel') }}</button>
                                <button class="theme-btn m-2 submit-btn">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <!-- modal icon-->
    <!-- modal icon edit-->
    <div class="modal fade" id="modal-icon-edit" tabindex="-1" aria-labelledby="modal-icon-edit-label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-icon-edit-label">{{ __('Edit Icon') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- form start -->

                <div class="modal-body">
                    <form id="updateIcon" method="POST" action="" enctype="multipart/form-data"
                        class="ajaxform_instant_reload">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-lg-10 mt-2">
                                <label>{{ __('Favicon') }}</label>
                                <input type="file" name="favicon" accept="image/*" onchange="document.getElementById('edit_favicon').src = window.URL.createObjectURL(this.files[0])" class="form-control">
                            </div>

                            <div class="col-lg-2 mt-4 align-self-center">
                                <img class="table-img" id="edit_favicon" src="">
                            </div>

                            <div class="col-lg-10 mt-2">
                                <label>{{ __('Icon') }}</label>
                                <input type="file" name="icon" accept="image/*" onchange="document.getElementById('update_icon').src = window.URL.createObjectURL(this.files[0])" class="form-control">
                            </div>

                            <div class="col-lg-2 mt-4 align-self-center">
                                <img class="table-img" id="update_icon" src="">
                            </div>

                            <div class="col-lg-10 mt-2">
                                <label>{{ __('Frontend Logo') }}</label>
                                <input type="file" name="frontend_logo" accept="image/*" onchange="document.getElementById('edit_frontend_logo').src = window.URL.createObjectURL(this.files[0])" class="form-control">
                            </div>

                            <div class="col-lg-2 mt-4 align-self-center">
                                <img class="table-img" id="edit_frontend_logo" src="">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="button-group text-center mt-4">
                                <button type="reset" class="theme-btn border-btn m-2">{{ __('Cancel') }}</button>
                                <button class="theme-btn m-2 submit-btn">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- modal icon edit-->
    <!-- modal logo-->

    <div class="modal fade" id="modal-logo" tabindex="-1" aria-labelledby="modal-logo-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-logo-label">{{ __('New Logo') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- form start -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.settings.store') }}" enctype="multipart/form-data"
                        class="ajaxform_instant_reload">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <label for="edit_logo">{{ __('Logo') }}</label>
                                <span class="image-size-alert">{{ __('( logo max size 200 x 200 )') }}</span>
                                <input type="file" class="form-control" name="logo" id="edit_logo">
                            </div>
                            <div class="form-group">
                                <label for="edit_logo_footer">{{ __('Footer Logo') }}</label>
                                <span class="image-size-alert">{{ __('( footer logo max size 200 x 200 )') }}</span>
                                <input type="file" class="form-control" name="logo_footer" id="edit_logo_footer">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="button-group text-center mt-4">
                                <button type="reset" class="theme-btn border-btn m-2">{{ __('Cancel') }}</button>
                                <button class="theme-btn m-2 submit-btn">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <!-- modal logo edit-->

    <div class="modal fade" id="modal-logo-edit" tabindex="-1" aria-labelledby="modal-logo-edit-label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-logo-edit-label">{{ __('Edit Logo') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- form start -->
                <div class="modal-body">
                    <form id="updateLogo" method="POST" action="" enctype="multipart/form-data"
                        class="ajaxform_instant_reload">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-lg-10 mt-2">
                                <label>{{ __('Logo') }}</label>
                                <input type="file" name="logo" accept="image/*" onchange="document.getElementById('edit_setting_logo').src = window.URL.createObjectURL(this.files[0])" class="form-control">
                            </div>

                            <div class="col-lg-2 mt-4 align-self-center">
                                <img class="table-img" id="edit_setting_logo" src="">
                            </div>

                            <div class="col-lg-10 mt-2">
                                <label>{{ __('Footer Logo') }}</label>
                                <input type="file" name="logo_footer" accept="image/*" onchange="document.getElementById('edit_setting_logo_footer').src = window.URL.createObjectURL(this.files[0])" class="form-control">
                            </div>

                            <div class="col-lg-2 mt-4 align-self-center">
                                <img class="table-img" id="edit_setting_logo_footer" src="" alt="Footer Logo">
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div class="button-group text-center mt-4">
                                <button type="reset" class="theme-btn border-btn m-2">{{ __('Cancel') }}</button>
                                <button class="theme-btn m-2 submit-btn">{{ __('Save') }}</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
