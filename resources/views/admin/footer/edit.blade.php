@extends('layouts.master')

@section('title')
    {{ __('Edit Footer') }}
@endsection

@section('main_content')
    <div class="erp-table-section">
        <div class="container-fluid">
            <div class="card">
                <div class="card-bodys">
                    <div class="table-header p-16">
                        <h4>{{ __('Edit Footer') }}</h4>
                        <div>
                            <a href="{{ route('admin.footer.index') }}" class="theme-btn print-btn text-light active">
                                <i class="fas fa-list me-1"></i>
                                {{ __('Footer List') }}
                            </a>
                        </div>
                    </div>

                    <div class="tab-content order-summary-tab p-3">
                        <div class="tab-pane fade show active" id="add-new-user">
                            <div class="order-form-section">
                                <form method="POST" action="{{ route('admin.footer.update', $footer->id) }}"
                                    enctype="multipart/form-data" class="ajaxform_instant_reload">
                                    @csrf
                                    <div class="add-suplier-modal-wrapper">
                                        <div class="row">

                                            <div class="col-lg-6 mt-3">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <label class="img-label">{{ __('Image') }}</label>
                                                        <input type="file" accept="image/*" name="image"
                                                            class="form-control file-input-change" data-id="image">
                                                    </div>
                                                    <div class="col-2 align-self-center mt-3">
                                                        <img src="{{ asset($footer->image ?? 'assets/images/icons/upload.png') }}"
                                                            id="image" class="table-img">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Footer Name') }}</label>
                                                <div class="gpt-up-down-arrow position-relative">
                                                    <select class="form-control" name="name" id="name" required>
                                                        <option value="">{{ __('Select footer') }}</option>
                                                        <option value="Footer 1"
                                                            {{ 'Footer 1' == $footer->name ? 'selected' : '' }}>
                                                            {{ __('Footer 1') }}
                                                        </option>
                                                        <option value="Footer 2"
                                                            {{ 'Footer 2' == $footer->name ? 'selected' : '' }}>
                                                            {{ __('Footer 2') }}</option>
                                                        <option value="Footer 3"
                                                            {{ 'Footer 3' == $footer->name ? 'selected' : '' }}>
                                                            {{ __('Footer 3') }}</option>
                                                        <option value="Footer 4"
                                                            {{ 'Footer 4' == $footer->name ? 'selected' : '' }}>
                                                            {{ __('Footer 4') }}</option>
                                                        <option value="Footer 5"
                                                            {{ 'Footer 5' == $footer->name ? 'selected' : '' }}>
                                                            {{ __('Footer 5') }}</option>
                                                        <option value="Footer 6"
                                                            {{ 'Footer 6' == $footer->name ? 'selected' : '' }}>
                                                            {{ __('Footer 6') }}</option>
                                                        <option value="Footer 7"
                                                            {{ 'Footer 7' == $footer->name ? 'selected' : '' }}>
                                                            {{ __('Footer 7') }}</option>
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
