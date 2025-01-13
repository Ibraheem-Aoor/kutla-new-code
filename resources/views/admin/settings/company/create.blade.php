<div class="modal modal-md fade" id="create-company-info" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Create Company') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.company.store') }}" method="post" class="ajaxform_instant_reload ">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 mt-2">
                            <label>{{ __('Name') }}</label>
                            <input type="text" class="form-control" name="name" placeholder="{{ __('Enter name') }}" required>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label>{{ __('Address Line 1') }}</label>
                            <input type="text" class="form-control" name="address_line1" placeholder="{{ __('Enter address') }}" required>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label>{{ __('Address Line 2') }}</label>
                            <input type="text" class="form-control" name="address_line2" placeholder="{{ __('Enter address') }}">
                        </div>

                        <div class="col-lg-6 mt-2">
                            <label>{{ __('Phone Number') }}</label>
                            <input type="text" class="form-control" name="phone" placeholder="{{ __('Enter phone') }}" required>
                        </div>

                        <div class="col-lg-6 mt-2">
                            <label>{{ __('Email') }}</label>
                            <input type="text" class="form-control" name="email" placeholder="{{ __('Enter email') }}" required>
                        </div>

                        <div class="col-lg-6 mt-2">
                            <label>{{ __('location Map') }}</label>
                            <textarea class="form-control" name="location_map" placeholder="{{ __('map url') }}"></textarea>
                        </div>

                        <div class="col-lg-6 mt-2">
                            <label>{{ __('Message') }}</label>
                            <textarea class="form-control" name="message" required></textarea>
                        </div>

                        <div class="col-lg-6 mt-2">
                            <label>{{ __('Copyright') }}</label>
                            <textarea class="form-control" name="copyright" id="copyright" required></textarea>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label for="exampleInputDescription">{{ __('Version') }}</label>
                            <input class="form-control" name="version" required>
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
