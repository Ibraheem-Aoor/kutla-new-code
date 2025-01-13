@extends('layouts.master')

@section('title')
    {{ __('Blog Sub Category') }}
@endsection

@section('main_content')
    <!-- Main content -->
    <div class="erp-table-section">
        <div class="container-fluid">
            <div class="card">

                <div class="card-bodys">
                    <div class="table-header p-16">
                        <h4>{{ __('Sub-category List') }}</h4>
                         @can('blog-sub-categories-create')
                         <a href="#create-blog-subcategory" class="theme-btn print-btn text-light" data-bs-toggle="modal">
                            <i class="far fa-plus" aria-hidden="true"></i>
                            {{ __('Add Sub-category') }}
                        </a>
                        @endcan
                    </div>

                    <div class="table-top-form p-16-0">
                        <form action="{{ route('admin.blog.subcategory.filter') }}" method="post" class="filter-form" table="#blog-subcategory-data">
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

                <div class="responsive-table m-0">
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                             @can('blog-sub-categories-delete')
                                <th>
                                    <div class="d-flex align-items-center gap-1">
                                        <label class="table-custom-checkbox">
                                            <input type="checkbox" class="table-hidden-checkbox selectAllCheckbox">
                                            <span class="table-custom-checkmark custom-checkmark"></span>
                                        </label>
                                        <i class="fal fa-trash-alt delete-selected"></i>
                                    </div>
                                </th>
                                @endcan
                                <th>{{ __('SL') }}.</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th class="maanaction">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody id="blog-subcategory-data">
                            @include('admin.blog.subcategory.datas')
                        </tbody>
                    </table>
                </div>

                <nav>
                    <ul class="pagination">
                        <li class="page-item">{{ $subcategories->links('pagination::bootstrap-5') }}</li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>

    @push('modal')
        @include('admin.blog.subcategory.create')
        @include('admin.blog.subcategory.edit')
    @endpush
@endsection

@push('modal')
    @include('admin.components.multi-delete-modal')
@endpush