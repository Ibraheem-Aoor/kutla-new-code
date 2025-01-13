<div class="modal modal-md fade" id="edit-header" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Edit Header') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editHeaderForm" method="post" enctype="multipart/form-data" class="ajaxform_instant_reload">
                    @csrf
                    @method('PUT')

                    <div class="mt-2">
                        <label>{{ __('Google Analytics') }}</label>
                        <input type="text" class="form-control" name="google_analytics" id="googleAnalytics" placeholder="{{ __('Enter Analytics') }}" required>
                    </div>

                    <div class="col-lg-12">
                        <div class="button-group text-center mt-2">
                            <button type="reset" class="theme-btn border-btn m-2">{{ __('Cancel') }}</button>
                            <button class="theme-btn m-2 submit-btn">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
