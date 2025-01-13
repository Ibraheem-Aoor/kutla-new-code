@extends('layouts.master')

@section('title')
    {{ __('Create Blog') }}
@endsection

@section('main_content')
    <div class="erp-table-section">
        <div class="container-fluid">
            <div class="card">
                <div class="card-bodys">

                    <div class="table-header p-16">
                        <h4>{{ __('Add New Blog') }}</h4>
                        <div>
                            <a href="{{ route('admin.blog') }}" class="theme-btn print-btn text-light active">
                                <i class="fas fa-list me-1"></i>
                                {{ __('Blog List') }}
                            </a>
                        </div>
                    </div>


                    <div class="tab-content order-summary-tab p-3">
                        <div class="tab-pane fade show active" id="add-new-user">
                            <div class="order-form-section">
                                <form method="POST" action="{{ route('admin.blog') }}" enctype="multipart/form-data" class="ajaxform_instant_reload">
                                    @csrf
                                    <div class="add-suplier-modal-wrapper">
                                        <div class="row">

                                            <div class="col-lg-6 mt-2">
                                                <label>{{ __('Title') }}</label>
                                                <input type="text" class="form-control" name="title" placeholder="{{ __('Enter title') }}" required>
                                            </div>

                                            <div class="col-lg-6 mt-2">
                                                <label>{{ __('Summary') }}</label>
                                                <textarea class="form-control" name="summary" placeholder="{{ __('Enter Summary') }}"></textarea>
                                            </div>

                                            <div class="col-lg-6 mt-2">
                                                <label>{{ __('Description') }}</label>
                                                <textarea class="form-control" name="description" id="summernote"> </textarea>
                                            </div>

                                            <div class="col-lg-6 mt-2">
                                                <label>{{ __('Blog Category') }}</label>
                                                <div class="gpt-up-down-arrow position-relative">
                                                <select class="form-control select2bs4" name="category_id"
                                                    id="blogcategory_id">
                                                    <option value="">{{ __('Select') }}</option>
                                                    @foreach ($blogcategories as $blogcategory)
                                                        <option value="{{ $blogcategory->id }}">{{ $blogcategory->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-2">
                                                <label>{{ __('Blog Sub-category') }}</label>
                                                <div class="gpt-up-down-arrow position-relative">
                                                <select class="form-control select2bs4" name="subcategory_id"
                                                    id="blogsubcategory_id">
                                                    <option>{{ __('Select') }}</option>
                                                </select>
                                                <span></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-2">
                                                <label>{{ __('Date') }}</label>
                                                <input type="date" name="date" class="form-control">
                                            </div>

                                            <div class="col-lg-6 mt-2">
                                                <label>{{ __('Tags') }}</label>
                                                <input type="text" class="form-control" name="tags" id="tags" placeholder="{{ __('Enter Tags') }}">
                                            </div>

                                            <div class="col-lg-6 mt-2">
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
                                            <div class="mt-2">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="img-label">{{ __('Image') }}</label>
                                                        <input type="file" accept="image/*" name="image[]"
                                                            class="form-control file-input-change" data-id="image">
                                                    </div>
                                                    <div class="col-2 align-self-center mt-3">
                                                        <img src="{{ asset('assets/images/icons/upload.png') }}" id="image"
                                                            class="table-img">
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
    </div>

    <script>
        "use strict";
        // global app configuration object
        var config = {
            routes: {
                blogcategory: "{{ URL::to('admin/blog/create') }}"
            }
        };
    </script>
@endsection
