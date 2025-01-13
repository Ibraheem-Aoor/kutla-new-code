<div class="modal modal-md fade" id="edit-company-info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Edit Company') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" class="ajaxform_instant_reload" id="editCompanyForm">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-lg-6 mt-2">
                            <label>{{ __('Name') }}</label>
                            <input type="text" class="form-control" name="name" placeholder="{{ __('Enter name') }}"
                                id="companyName" required>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label>{{ __('Address Line 1') }}</label>
                            <input type="text" class="form-control" name="address_line1" placeholder="{{ __('Enter address') }}"
                                id="companyAddressLine1" required>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label>{{ __('Address Line 2') }}</label>
                            <input type="text" class="form-control" name="address_line2" placeholder="{{ __('Enter address') }}"
                                id="companyAddressLine2">
                        </div>

                        <div class="col-lg-6 mt-2">
                            <label>{{ __('Phone Number') }}</label>
                            <input type="text" class="form-control" name="phone" placeholder="{{ __('Enter phone') }}"
                                id="companyPhone" required>
                        </div>

                        <div class="col-lg-6 mt-2">
                            <label>{{ __('Email') }}</label>
                            <input type="text" class="form-control" name="email" placeholder="{{ __('Enter email') }}"
                                id="companyEmail" required>
                        </div>

                        <div class="col-lg-6 mt-2">
                            <label>{{ __('location Map') }}</label>
                            <textarea class="form-control" name="location_map" id="companyLocationMap" placeholder="{{ __('map url') }}"></textarea>
                        </div>

                        <div class="col-lg-6 mt-2">
                            <label>{{ __('Message') }}</label>
                            <textarea class="form-control" name="message" id="companyMessage" required></textarea>
                        </div>

                        <div class="col-lg-6 mt-2">
                            <label>{{ __('Copyright') }}</label>
                            <textarea class="form-control" name="copyright" id="companyCopyright" required></textarea>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label for="exampleInputDescription">{{ __('Version') }}</label>
                            <input class="form-control" name="version" required  id="companyVersion">
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
