@extends('layouts.master')

@section('title')
    {{ __('Create News') }}
@endsection

@section('main_content')
    <div class="erp-table-section">
        <div class="container-fluid">
            <div class="card">
                <div class="card-bodys">

                    <div class="table-header p-16">
                        <h4>{{ __('Create News') }}</h4>
                        <div>
                            <a href="{{ route('admin.news') }}" class="theme-btn print-btn text-light active">
                                <i class="fas fa-list me-1"></i>
                                {{ __('News List') }}
                            </a>
                        </div>
                    </div>

                    <div class="tab-content order-summary-tab p-3">
                        <div class="tab-pane fade show active" id="add-new-user">
                            <div class="order-form-section">
                                <form method="POST" action="{{ route('admin.news') }}" enctype="multipart/form-data" class="ajaxform_instant_reload">
                                    @csrf
                                    <div class="add-suplier-modal-wrapper">
                                        <div class="row">

                                            <div class="col-lg-12 mt-3">
                                                <label>{{ __('Title') }}</label>
                                                <input type="text" class="form-control" name="title" id="title"
                                                    placeholder="{{ __('Enter title') }}" required>
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <label>{{ __('Summary') }}</label>
                                                <textarea class="form-control" name="summary" placeholder="{{ __('Enter Summary') }}"></textarea>
                                            </div>

                                            <div class="col-lg-12 mt-3">
                                                <label>{{ __('Description') }}</label>
                                                <textarea class="form-control summernote" name="description"> </textarea>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('News Category') }}</label>
                                                <div class="gpt-up-down-arrow position-relative">
                                                    <select class="form-control select2bs4" name="category_id"
                                                        id="newscategory_id">
                                                        <option value="">{{ __('Select') }}</option>
                                                        @foreach ($newscategories as $newscategory)
                                                            <option value="{{ $newscategory->id }}">
                                                                {{ $newscategory->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('News Sub-category') }}</label>
                                                <div class="gpt-up-down-arrow position-relative">
                                                    <select class="form-control" name="subcategory_id"
                                                        id="newssubcategory_id">
                                                        <option value="">{{ __('Select') }}</option>
                                                    </select>
                                                    <span></span>
                                                </div>
                                            </div>


                                            <!-- Date -->
                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Date') }}</label>
                                                <input type="date" name="date" class="form-control">
                                            </div>


                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Tags') }}</label>
                                                <input type="text" class="form-control" name="tags[]"
                                                    placeholder="{{ __('tags') }}">
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('News Speciality') }}</label>
                                                <div class="gpt-up-down-arrow position-relative">
                                                    <select class="form-control" name="speciality_id">
                                                        <option value="">{{ __('Select') }}</option>
                                                        @foreach ($newsspecialities as $newsspeciality)
                                                            <option value="{{ $newsspeciality->id }}">
                                                                {{ $newsspeciality->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('News Reporter') }}</label>
                                                <div class="gpt-up-down-arrow position-relative">
                                                    <select class="form-control" name="reporter_id" id="reporter_id">
                                                        <option value="">{{ __('Select') }}</option>
                                                        @foreach ($newsreporters as $newsreporter)
                                                            <option value="{{ $newsreporter->id }}">
                                                                {{ $newsreporter->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span></span>
                                                </div>
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
                                                <label>{{ __('Breaking News') }}</label>
                                                <div class="gpt-up-down-arrow position-relative">
                                                    <select name="breaking_news" required=""
                                                        class="form-control select-dropdown">
                                                        <option value="">{{ __('Select a status') }}</option>
                                                        <option value="1">{{ __('Active') }}</option>
                                                        <option value="0">{{ __('Deactive') }}</option>
                                                    </select>
                                                    <span></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <label class="img-label">{{ __('Image') }}</label>
                                                        <input type="file" accept="image/*" name="image[]"
                                                            class="form-control file-input-change" data-id="image" multiple>
                                                    </div>
                                                    <div class="col-2 align-self-center mt-3">
                                                        <img src="{{ asset('assets/images/icons/upload.png') }}"
                                                            id="image" class="table-img">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Meta keyword') }}</label>
                                                <input type="text" class="form-control" name="meta_keyword"
                                                    id="meta_keyword">
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Meta Description') }}</label>
                                                <textarea class="form-control" name="meta_description" id="meta_description"></textarea>
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


    <script>
        "use strict";
        var config = {
            routes: {
                newscategory: "{{ URL::to('admin/news/create') }}"
            }
        };
    </script>


@endsection

@push('js')
<script src="{{ asset('assets/js/summernote-lite.js') }}"></script>
<script>
    $(document).ready(function() {
        // Initialize Summernote
        $('.summernote').summernote({
            height: 300,
        });

        // Sync Summernote content to textarea on form submit
        $('.submit-btn').click(function() {
            $('.summernote').each(function() {
                $(this).val($(this).summernote('code'));
            });
        });
    });
</script>
@endpush

