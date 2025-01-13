@extends('layouts.master')

@section('title')
    {{ __('Create Video') }}
@endsection

@section('main_content')
    <div class="erp-table-section">
        <div class="container-fluid">
            <div class="card">
                <div class="card-bodys">
                    <div class="table-header p-16">
                        <h4>{{ __('Add New Video') }}</h4>
                        <div>
                            <a href="{{ route('admin.videogallery') }}" class="theme-btn print-btn text-light active">
                                <i class="fas fa-list me-1"></i>
                                {{ __('View List') }}
                            </a>
                        </div>
                    </div>

                    <div class="tab-content order-summary-tab p-3">
                        <div class="tab-pane fade show active" id="add-new-user">
                            <div class="order-form-section">
                                <form method="POST" action="{{ route('admin.videogallery') }}" enctype="multipart/form-data" class="ajaxform_instant_reload">
                                    @csrf
                                    <div class="add-suplier-modal-wrapper">
                                        <div class="row">
                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Title') }}</label>
                                                <input type="text" class="form-control" name="title" id="title"
                                                    placeholder="{{ __('Enter name') }}" required>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Description') }}</label>
                                                <textarea class="form-control" name="description" id="description" placeholder="{{ __('Enter Description') }}" required></textarea>

                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Publish / Unpublish') }}</label>
                                                <div class="gpt-up-down-arrow position-relative">
                                                    <select name="status" required=""
                                                        class="form-control select-dropdown">
                                                        <option value="">{{ __('Select a status') }}</option>
                                                        <option value="1">{{ __('Active') }}</option>
                                                        <option value="0">{{ __('Deactive') }}</option>
                                                    </select>
                                                    <span></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label for="publish">{{ __('Video Options') }}</label>
                                                <div class="gpt-up-down-arrow position-relative">
                                                    <select class="form-control select2bs4" name="video_option"
                                                    id="video_option" autocomplete="off">
                                                    <option value="">{{ __('Select') }}</option>
                                                    <option value="Upload Video">{{ __('Upload Video') }}</option>
                                                    <option value="Share Link">{{ __('Share Link') }}</option>
                                                </select>
                                                <span></span>
                                                </div>

                                            </div>

                                            <div class="col-lg-6 mt-3" id="videosorucediv">
                                                <label for="ShareShite">{{ __('Sharing Site') }}</label>
                                               <div class="gpt-up-down-arrow position-relative">
                                                <select class="form-control select2bs4" name="video_source"
                                                id="video_source">
                                                <option value="">{{ __('Select') }}</option>
                                                <option value="Youtube">{{ __('Youtube') }}</option>
                                                <option value="Dailymotion">{{ __('Dailymotion') }}</option>
                                            </select>
                                            <span></span>
                                               </div>
                                            </div>

                                            <div class="col-lg-6 mt-3" id="linkdiv">
                                                <label for="publish">{{ __('Link') }}</label>
                                                <input type="text" class="form-control" name="share_link"
                                                    id="share_link">

                                            </div>

                                            <div class="mt-2" id="videodiv">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="img-label" for="exampleInputVideo">{{ __('Video') }}</label>
                                                        <input type="file" accept="video/*" name="video" class="form-control file-input-change" data-id="video">
                                                    </div>
                                                    <div class="col-2 align-self-center mt-3">
                                                        <img src="{{ asset('assets/images/icons/upload.png') }}" id="video" class="table-img">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-2" id="imagediv">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="img-label" for="exampleInputVideo">{{ __('Image') }}</label>
                                                        <input type="file" accept="image/*" name="image" class="form-control file-input-change" data-id="image">
                                                    </div>
                                                    <div class="col-2 align-self-center mt-3">
                                                        <img src="{{ asset('assets/images/icons/upload.png') }}" id="image" class="table-img">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="button-group text-center mt-5">
                                                <a href=""
                                                    class="theme-btn border-btn m-2">{{ __('Cancel') }}</a>
                                                <button class="theme-btn m-2 submit-btn">{{ __('Save') }}</button>
                                            </div>
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
