<div class="modal modal-md fade" id="create-social-share" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Create Social Share') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.social.store') }}" method="post" class="ajaxform_instant_reload">
                    @csrf

                    <div class="mt-2">
                        <label>{{ __('URL') }}</label>
                        <input type="text" class="form-control" name="url" placeholder="{{ __('Enter url') }}" required>
                    </div>

                    <div class="mt-2">
                        <label>{{ __('Social Icon') }}</label>
                        <input type="text" class="form-control" name="icon_code" placeholder="{{ __('Enter icon') }}" required>
                    </div>

                    <div class="mt-2">
                        <label>{{ __('Followers') }}</label>
                        <input type="number" class="form-control" name="follower" placeholder="{{ __('Enter follower') }}" required>
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
