<div class="modal modal-md fade" id="edit-subcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Edit Sub Category') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" class="ajaxform_instant_reload" id="editSubCategoryForm">
                    @csrf
                    @method('PUT')

                    <div class="mt-2">
                        <label>{{ __('Name') }}</label>
                        <input type="text" class="form-control" name="name" placeholder="{{ __('Enter Name') }}"
                            id="name" required>
                    </div>

                    <div class="mt-2">
                        <label>{{ __('Category') }}</label>
                        <div class="gpt-up-down-arrow position-relative">
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="">{{ __('Select One') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span></span>
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
