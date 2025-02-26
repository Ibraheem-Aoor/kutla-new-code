@extends('layouts.master')

@section('main_content')
    <!-- Main content -->
    <div class="erp-table-section">
        <div class="container-fluid">
            <div class="card">
                <div class="card-bodys">

                    <div class="table-header p-16">
                        <h4>{{ __('Edit Reporter') }}</h4>
                        <div>
                            <a href="{{ route('admin.reporter') }}" class="theme-btn print-btn text-light active">
                                <i class="fas fa-list me-1"></i>
                                {{ __('Reporter List') }}
                            </a>
                        </div>
                    </div>

                    <div class="tab-content order-summary-tab p-3">
                        <div class="tab-pane fade show active" id="add-new-user">
                            <div class="order-form-section">
                                <form method="POST" action="{{ route('admin.reporter.update', $reporter->id) }}"
                                    enctype="multipart/form-data" class="ajaxform_instant_reload">
                                    @csrf
                                    @method('PUT')
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
                                                        <img src="{{ asset($reporter->image ?? 'assets/images/icons/upload.png') }}"
                                                            id="image" class="table-img">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('First Name') }}</label>
                                                <input type="text" class="form-control" name="first_name"
                                                    placeholder="{{ __('First Name') }}" value="{{ $reporter->first_name }}" required>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Last Name') }}</label>
                                                <input type="text" class="form-control" name="last_name"
                                                    placeholder="{{ __('Last Name') }}" value="{{ $reporter->last_name }}" required>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Email') }}</label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    placeholder="{{ __('Email') }}" value="{{ $reporter->email }}" required>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label">{{ __('Phone') }}</label>
                                                    <input type="text" class="form-control" name="phone" id="phone"
                                                        placeholder="{{ __('Phone') }}" value="{{ $reporter->phone }}" required>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('National ID') }}</label>
                                                <input type="text" class="form-control" name="national_id"
                                                    placeholder="{{ __('National ID') }}" value="{{ $reporter->national_id }}"
                                                    required>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Father Name') }}</label>
                                                <input type="text" class="form-control" name="father_name"
                                                    placeholder="{{ __('Father Name') }}" value="{{ $reporter->father_name }}"
                                                    required>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Mother Name') }}</label>
                                                <input type="text" class="form-control" name="mother_name"
                                                    placeholder="{{ __('Mother Name') }}" value="{{ $reporter->mother_name }}"
                                                    required>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Present Address') }}</label>
                                                <textarea class="form-control" name="present_address" id="present_address"> {{ $reporter->present_address }}</textarea>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Permanent Address') }}</label>
                                                <textarea class="form-control" name="permanent_address" id="permanent_address"> {{ $reporter->permanent_address }}</textarea>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Appointed Date') }}</label>
                                                <input type="date" name="appointed_date" value="{{ $reporter->appointed_date }}" class="form-control">
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Password') }}</label>
                                                <input type="password" class="form-control" name="password" placeholder="******">
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{ __('Confirm Password') }}</label>
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="******">
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>{{__('Role')}}</label>
                                                <div class="gpt-up-down-arrow position-relative">
                                                    <select name="role" required class="form-control" >
                                                        <option value=""> {{__('Select a role')}}</option>
                                                        @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}" @selected($reporter->role == $role->name)> {{ ucfirst($role->name) }} </option>
                                                        @endforeach
                                                    </select>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="button-group text-center mt-5">
                                                <a href=""
                                                    class="theme-btn border-btn m-2">{{ __('Cancel') }}</a>
                                                <button class="theme-btn m-2 submit-btn">{{ __('Save') }}</button>
                                            </div>
                                        </div>>

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
