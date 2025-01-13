@extends('layouts.master')

@section('title')
    {{ __('Edit Header') }}
@endsection

@section('main_content')
    <div class="erp-table-section">
        <div class="container-fluid">
            <div class="card">
                <div class="card-bodys">

                    <div class="table-header p-16">
                        <h4>{{ __('Edit Header') }}</h4>
                        <div>
                            <a href="{{ route('admin.header.index') }}" class="theme-btn print-btn text-light active">
                                <i class="fas fa-list me-1"></i>
                                {{ __('Header List') }}
                            </a>
                        </div>
                    </div>

                    <div class="tab-content order-summary-tab p-3">
                        <div class="tab-pane fade show active" id="add-new-user">
                            <div class="order-form-section">
                                <form method="POST" action="{{ route('admin.header.update', $header->id) }}"
                                    enctype="multipart/form-data" class="ajaxform_instant_reload">
                                    @csrf
                                    <div class="add-suplier-modal-wrapper">
                                        <div class="row">

                                            <div class="col-lg-6 mt-2">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <label class="img-label">{{ __('Image') }}</label>
                                                        <input type="file" accept="image/*" name="image"
                                                            class="form-control file-input-change" data-id="image">
                                                    </div>
                                                    <div class="col-2 align-self-center mt-3">
                                                        <img src="{{ asset($header->image ?? 'assets/images/icons/upload.png') }}"
                                                            id="image" class="table-img">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-6 mt-2">
                                                <label>{{ __('Header Name') }}</label>
                                                <div class="gpt-up-down-arrow position-relative">
                                                    <select class="form-control" name="name" required>
                                                        <option value="">{{ __('Select header') }}</option>
                                                        <option value="Header 1"
                                                            {{ 'Header 1' == $header->name ? 'selected' : '' }}>
                                                            {{ __('Header 1') }}
                                                        </option>
                                                        <option value="Header 2"
                                                            {{ 'Header 2' == $header->name ? 'selected' : '' }}>
                                                            {{ __('Header 2') }}</option>
                                                        <option value="Header 3"
                                                            {{ 'Header 3' == $header->name ? 'selected' : '' }}>
                                                            {{ __('Header 3') }}</option>
                                                        <option value="Header 4"
                                                            {{ 'Header 4' == $header->name ? 'selected' : '' }}>
                                                            {{ __('Header 4') }}</option>
                                                        <option value="Header 5"
                                                            {{ 'Header 5' == $header->name ? 'selected' : '' }}>
                                                            {{ __('Header 5') }}</option>
                                                        <option value="Header 6"
                                                            {{ 'Header 6' == $header->name ? 'selected' : '' }}>
                                                            {{ __('Header 6') }}</option>
                                                        <option value="Header 7"
                                                            {{ 'Header 7' == $header->name ? 'selected' : '' }}>
                                                            {{ __('Header 7') }}</option>
                                                    </select>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="button-group text-center mt-5">
                                            <a href="" class="theme-btn border-btn m-2">{{ __('Cancel') }}</a>
                                            <button class="theme-btn m-2 submit-btn">{{ __('Save') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
