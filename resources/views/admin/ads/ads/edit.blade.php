<div class="modal modal-md fade" id="edit-ads-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-default-edit-label">{{ __('Edit Ads') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="" class="ajaxform_instant_reload" id="editAdsForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="card-body">
                        <fieldset class="border p-2">
                            <legend class="w-auto"><span class="image-size-alert">{{ __('Header Ads') }}</span></legend>
                            <div class="mb-3">
                                <label for="edit_header_ads" class="form-label">{{ __('Create Add Code') }}</label>
                                <textarea class="form-control" name="header_ads" id="headerAds" cols="30" placeholder="{{ __('ads') }}"></textarea>
                            </div>
                        </fieldset>
                        <fieldset class="border p-2">
                            <legend class="w-auto"><span class="image-size-alert">{{ __('Sidebar Ads') }}</span></legend>
                            <div class="mb-3">
                                <label for="edit_sidebar_ads" class="form-label">{{ __('Sidebar Ads') }}</label>
                                <textarea class="form-control" name="sidebar_ads" id="sidebarAds" placeholder="{{ __('ads') }}"></textarea>
                            </div>
                        </fieldset>
                        <fieldset class="border p-2">
                            <legend class="w-auto"><span class="image-size-alert">{{ __('Before Post Ads') }}</span></legend>
                            <div class="mb-3">
                                <label for="edit_before_post_ads" class="form-label">{{ __('Before Post Ads') }}</label>
                                <textarea class="form-control" name="before_post_ads" id="beforePostAds" cols="30" placeholder="{{ __('ads') }}"></textarea>
                            </div>
                        </fieldset>
                        <fieldset class="border p-2">
                            <legend class="w-auto"><span class="image-size-alert">{{ __('After Post Ads') }}</span></legend>
                            <div class="mb-3">
                                <label for="edit_after_post_ads" class="form-label">{{ __('After Post Ads') }}</label>
                                <textarea class="form-control" name="after_post_ads" id="afterPostAds" cols="30" placeholder="{{ __('ads') }}"></textarea>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="button-group text-center">
                        <button type="reset" class="theme-btn border-btn m-2">{{ __('Cancel') }}</button>
                        <button class="theme-btn m-2 submit-btn">{{ __('Save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
