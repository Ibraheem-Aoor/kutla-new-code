<div class="modal fade" id="edit-seo" tabindex="-1" aria-labelledby="modalDefaultLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalDefaultLabel">{{ __('Edit Seo') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- form start -->
            <form method="POST" action="" enctype="multipart/form-data" id="editSeoForm" class="ajaxform_instant_reload">
                @csrf
                @method('PUT')
                <div class="modal-body">
                        <div class="form-group">
                            <label for="keywords">{{ __('Keywords') }}</label>
                            <textarea class="form-control" name="keywords" id="keyword" cols="30" placeholder="{{ __('keywords,news') }}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="author">{{ __('Author') }}</label>
                            <input type="text" class="form-control" name="author" id="authorName">
                        </div>
                        <div class="form-group">
                            <label for="meta_title">{{ __('Meta Title') }}</label>
                            <input type="text" class="form-control" name="meta_title" id="metaTitle">
                        </div>
                        <div class="form-group">
                            <label for="meta_description">{{ __('Meta Description') }}</label>
                            <textarea class="form-control" name="meta_description" id="metaDescription"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="google_analytics">{{ __('Google Analytics') }}</label>
                            <textarea class="form-control" name="google_analytics" id="googleAnalytics"></textarea>
                        </div>
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
