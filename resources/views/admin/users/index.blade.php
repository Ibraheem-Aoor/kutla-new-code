@extends('layouts.master')

@section('title')
    {{ __('User') }}
@endsection

@section('main_content')
    <div class="erp-table-section">
        <div class="container-fluid">
            <div class="card">

                <div class="card-bodys">
                    <div class="table-header p-16">
                        <h4>{{ __('User List') }}</h4>

                       @can('users-create')
                       <a href="{{ route('admin.user.create') }}" class="theme-btn print-btn text-light">
                        <i class="far fa-plus" aria-hidden="true"></i>
                        {{ __('Add New User') }}
                       </a>
                       @endcan
                    </div>

                    <div class="table-top-form p-16-0">
                        <form action="{{ route('admin.user.filter') }}" method="post" class="filter-form"
                            table="#users-data">
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
                                @can('users-delete')
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
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Role') }}</th>
                                <th class="">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody id="users-data">
                            @include('admin.users.datas')
                        </tbody>
                    </table>
                </div>

                <nav>
                    <ul class="pagination">
                        <li class="page-item">{{ $users->links('pagination::bootstrap-5') }}</li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>

    @push('modal')
        @include('admin.users.view')
    @endpush
@endsection

@push('modal')
    @include('admin.components.multi-delete-modal')
@endpush
