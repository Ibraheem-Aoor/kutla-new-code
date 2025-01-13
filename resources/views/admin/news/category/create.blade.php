<div class="modal modal-md fade" id="create-category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Create Category') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.news.category') }}" method="post" enctype="multipart/form-data"
                    class="ajaxform_instant_reload">
                    @csrf

                    <div class="mt-2">
                        <label>{{ __('Name') }}</label>
                        <input type="text" class="form-control" name="name" placeholder="{{ __('Enter Name') }}"
                            required>
                    </div>

                    <div class="mt-2">
                        <label>{{ __('Slug') }}</label> <span
                            class="size-alert">{{ __('( slug must be english & lowercase )') }}</span>
                        <input type="text" class="form-control" name="slug" id="slug"
                            placeholder="{{ __('Enter slug') }}" required>
                    </div>

                    <div class="mt-2">
                        <div class="row">
                            <div class="col-10">
                                <label class="img-label">{{ __('Image') }}</label>
                                <input type="file" accept="image/*" name="image"
                                    class="form-control file-input-change" data-id="image">
                            </div>
                            <div class="col-2 align-self-center mt-3">
                                <img src="{{ asset('assets/images/icons/upload.png') }}" id="image"
                                    class="table-img">
                            </div>
                        </div>
                    </div>

                    <div class="mt-2">
                        <label>{{ __('Type') }}</label>
                        <div class="gpt-up-down-arrow position-relative">
                            <select class="form-control" name="type">
                                <option value="">{{ __('Select') }}</option>
                                <option value="{{ __('home') }}">{{ __('Home') }}</option>
                                <option value="{{ __('contact') }}">{{ __('Contact') }}</option>
                                <option value="{{ __('news') }}">{{ __('News') }}</option>
                            </select>
                            <span></span>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="button-group text-center mt-5">
                            <button type="reset" class="theme-btn border-btn m-2">{{ __('Cancel') }}</button>
                            <button class="theme-btn m-2 submit-btn">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
