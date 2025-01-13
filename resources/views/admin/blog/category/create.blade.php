<div class="modal modal-md fade" id="create-blog-category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Create Category') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.blog.category') }}" method="post" enctype="multipart/form-data" class="ajaxform_instant_reload">
                    @csrf

                    <div class="mt-2">
                        <label>{{ __('Name') }}</label>
                        <input type="text" class="form-control" name="name" placeholder="{{ __('Enter Name') }}" required>
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
