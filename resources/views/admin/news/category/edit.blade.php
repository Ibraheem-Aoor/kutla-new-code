<div class="modal modal-md fade" id="edit-category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Edit Category') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" class="ajaxform_instant_reload" enctype="multipart/form-data"
                    id="editCategoryForm">
                    @csrf
                    @method('PUT')
                    <div class="mt-2">
                        <label>{{ __('Name') }}</label>
                        <input type="text" class="form-control" name="name" placeholder="{{ __('Enter Name') }}" id="name" required>
                    </div>

                    <div class="mt-2">
                        <label>{{ __('Slug') }}</label>
                        <input type="text" class="form-control" name="slug" placeholder="{{ __('Enter slug') }}" id="slugTitle" required>
                    </div>

                    <div class="row">
                        <div class="col-lg-10 mt-2">
                            <label>{{ __('Image') }}</label>
                            <input type="file" name="image" accept="image/*" onchange="document.getElementById('images').src = window.URL.createObjectURL(this.files[0])" class="form-control">
                        </div>

                        <div class="col-lg-2 mt-4 align-self-center">
                            <img class="table-img" id="images" src="">
                        </div>
                    </div>

                    <div class="mt-2">
                        <label>{{ __('Type') }}</label>
                        <div class="gpt-up-down-arrow position-relative">
                            <select class="form-control" name="type" id="type">
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
