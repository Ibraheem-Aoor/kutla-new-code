@extends('layouts.master')

@section('title')
    {{ __('Edit Video') }}
@endsection

@section('main_content')
    <div class="erp-table-section">
        <div class="container-fluid">
            <div class="card">
                <div class="card-bodys">

                    <div class="table-header p-16">
                        <h4>{{ __('Edit Video') }}</h4>
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
                                <form method="POST" action="{{ route('admin.videogallery.update', $videogallery->id) }}"
                                    enctype="multipart/form-data" class="ajaxform_instant_reload">
                                    @csrf
                                    @method('PUT')
                                    <div class="add-suplier-modal-wrapper">
                                        <div class="row">

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Title') }}</label>
                                                <input type="text" class="form-control" name="title" id="title"
                                                    placeholder="{{ __('Enter title') }}" value="{{ $videogallery->title }}" required>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Description') }}</label>
                                                <textarea class="form-control" name="description" id="description" placeholder="{{ __('Enter Description') }}" required>{{ old('description') }}{{ $videogallery->description }}</textarea>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Publish / Unpublish') }}</label>
                                                <div class="gpt-up-down-arrow position-relative">
                                                    <select name="status" class="form-control">
                                                        <option value="">{{ __('Select Status') }}</option>
                                                        <option value="1" @selected($videogallery->status == 1)>
                                                            {{ __('Active') }}
                                                        </option>
                                                        <option value="0" @selected($videogallery->status == 0)>
                                                            {{ __('Deactive') }}</option>
                                                    </select>
                                                    <span></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Video Options') }}</label>
                                                <div class="gpt-up-down-arrow position-relative">
                                                    <select class="form-control select2bs4" name="video_option"
                                                        id="video_option">
                                                        <option value="">{{ __('Select') }}</option>
                                                        <option value="Upload Video"
                                                            @if ($videogallery->video_option == 'Upload Video') selected @endif>
                                                            {{ __('Upload Video') }}</option>
                                                        <option value="Share Link"
                                                            @if ($videogallery->video_option == 'Share Link') selected @endif>
                                                            {{ __('Share Link') }}</option>
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
                                                        <option
                                                            value="Youtube"@if ($videogallery->video_source == 'Youtube') selected @endif>
                                                            {{ __('Youtube') }}</option>
                                                        <option
                                                            value="Dailymotion"@if ($videogallery->video_source == 'Dailymotion') selected @endif>
                                                            {{ __('Dailymotion') }}</option>
                                                    </select>
                                                    <span></span>
                                                </div>

                                            </div>
                                            <div class="col-lg-6 mt-3" id="linkdiv">
                                                <label for="publish">{{ __('Link') }}</label>
                                                <input type="text" class="form-control" name="share_link" id="share_link" value="{{ $videogallery->video }}">
                                            </div>

                                            {{-- <div class="col-lg-6 mt-3 row" id="videodiv">
                                                <label class="col-sm-3 col-md-3 col-form-label"
                                                    for="exampleInputVideo">{{ __('Video') }}</label>
                                                @if ($videogallery->video)
                                                    <iframe class="table-img" src="{{ asset($videogallery->video) }}"></iframe>
                                                @endif
                                                <div class="col-sm-8 col-md-8 mt-3">
                                                    <input type="file" class="form-control" name="video" accept="video/*">
                                                </div>

                                            </div> --}}

                                            <div class="mt-2" id="videodiv">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <label class="img-label">{{ __('Video') }}</label>
                                                        <input type="file" name="video"
                                                            class="form-control file-input-change" data-id="image">
                                                    </div>
                                                    <div class="col-1 align-self-center mt-3">
                                                        @if ($videogallery->video)
                                                            <img class="table-img" id="video" src="{{ asset($videogallery->video) }}"></img>
                                                        @else
                                                            <p>{{ __('No image found') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-2">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <label class="img-label">{{ __('Image') }}</label>
                                                        <input type="file" accept="image/*" name="image[]"
                                                            class="form-control file-input-change" data-id="image">
                                                    </div>
                                                    <div class="col-1 align-self-center mt-3">
                                                        @if ($videogallery->image)
                                                            <img class="table-img" id="image" src="{{ asset($videogallery->image) }}"></img>
                                                        @else
                                                            <p>{{ __('No image found') }}</p>
                                                        @endif
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

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
