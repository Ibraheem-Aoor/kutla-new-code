<div class="modal modal-md fade" id="create-photo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Create Gallery') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.photogalleries.store') }}" method="post" enctype="multipart/form-data"
                    class="ajaxform_instant_reload">
                    @csrf

                    <div class="mt-2">
                        <label>{{ __('Title') }}</label>
                        <input type="text" class="form-control" name="title" placeholder="{{ __('Enter Name') }}"
                            required>
                    </div>

                    <div class="mt-2">
                        <label>{{ __('Publish / Unpublish') }}</label>
                        <div class="gpt-up-down-arrow position-relative">
                            <select name="status" required="" class="form-control select-dropdown">
                                <option value="">{{ __('Select a status') }}</option>
                                <option value="1">{{ __('Active') }}</option>
                                <option value="0">{{ __('Deactive') }}</option>
                            </select>
                            <span></span>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="row">
                            <div class="col-10">
                                <label class="img-label">{{ __('Image') }}</label>
                                <input type="file" accept="image/*" name="image[]"
                                    class="form-control file-input-change" data-id="image">
                            </div>
                            <div class="col-2 align-self-center mt-3">
                                <img src="{{ asset('assets/images/icons/upload.png') }}" id="image"
                                    class="table-img">
                            </div>
                        </div>
                    </div>
                    {{-- Update your file input in create.blade.php --}}
                    <div class="mt-2">
                        <div class="row">
                            <div class="col-12">
                                <label class="img-label">{{ __('Gallery') }}</label>
                                <input type="file" class="filepond" name="gallery[]" accept="image/*" multiple>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2">
                        <label>{{ __('Description') }}</label>
                        <textarea class="form-control" name="description" placeholder="{{ __('Enter Description') }}"></textarea>
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
