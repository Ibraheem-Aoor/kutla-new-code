{{-- <div class="modal modal-md fade" id="edit-theme" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Edit Theme') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" class="ajaxform_instant_reload" id="updateThemeForm">
                    @csrf
                    @method('PUT')

                    <div class="mt-2">
                        <label>{{ __('Title') }}</label>
                        <input type="text" class="form-control" name="title" id="themeTitle" placeholder="{{ __('Enter title') }}" required>
                    </div>

                    <div class="mt-2">
                        <label>{{ __('Author') }}</label>
                        <input type="text" class="form-control" name="author" id="themeAuthor" placeholder="{{ __('Enter title') }}" required>
                    </div>

                    <div class="mt-2">
                        <label>{{ __('Description') }}</label>
                        <textarea class="form-control" name="description" id="themeDescription"></textarea>
                    </div>

                    <div class="mt-2">
                        <label>{{ __('Version') }}</label>
                        <input type="text" class="form-control" name="version" id="themeVersion"
                            placeholder="{{ __('Enter version') }}" required>
                    </div>

                    <div class="mt-2">
                        <label>{{ __('Choose Home Page') }}</label>
                        <div class="gpt-up-down-arrow position-relative">
                            <select class="form-control" name="page" id="themePage" required>
                                <option value="">{{ __('Select page') }}</option>
                                <option value="Home 1" {{ 'Home 1' == old('name') ? 'selected' : '' }}>
                                    {{ __('Home 1') }}</option>
                                <option value="Home 2" {{ 'Home 2' == old('name') ? 'selected' : '' }}>
                                    {{ __('Home 2') }}</option>
                                <option value="Home 3" {{ 'Home 3' == old('name') ? 'selected' : '' }}>
                                    {{ __('Home 3') }}</option>
                                <option value="Home 4" {{ 'Home 4' == old('name') ? 'selected' : '' }}>
                                    {{ __('Home 4') }}</option>
                                <option value="Home 5" {{ 'Home 5' == old('name') ? 'selected' : '' }}>
                                    {{ __('Home 5') }}</option>
                                <option value="Home 6" {{ 'Home 6' == old('name') ? 'selected' : '' }}>
                                    {{ __('Home 6') }}</option>
                                <option value="Home 7" {{ 'Home 7' == old('name') ? 'selected' : '' }}>
                                    {{ __('Home 7') }}</option>
                            </select>
                            <span></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <label>{{ __('Image') }}</label>
                            <input type="file" name="image" accept="image/*" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" class="form-control">
                        </div>

                        <div class="col-lg-4 align-self-center mt-3">
                            <img class="table-img" id="themeImage" src="">
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
</div> --}}


<div class="modal modal-md fade" id="edit-theme" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Edit Theme') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" class="ajaxform_instant_reload" id="updateThemeForm">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="name">{{ __('Title') }}</label>
                            <input type="text" class="form-control" name="title" id="themeTitle"
                                placeholder="{{ __('Enter title') }}" value="{{ old('title') }}" required>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="name">{{ __('Author') }}</label>
                            <input type="text" class="form-control" name="author" id="themeAuthor"
                                placeholder="{{ __('Enter title') }}" value="{{ old('title') }}" required>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="name">{{ __('Version') }}</label>
                            <input type="text" class="form-control" name="version" id="themeVersion"
                                placeholder="{{ __('Enter version') }}" value="{{ old('version') }}" required>
                        </div>


                        <div class="mt-2">
                            <label>{{ __('Choose Home Page') }}</label>
                            <div class="gpt-up-down-arrow position-relative">
                                <select class="form-control" name="page" id="themePage" required>
                                    <option value="">{{ __('Select page') }}</option>
                                    <option value="Home 1" {{ 'Home 1' == old('name') ? 'selected' : '' }}>
                                        {{ __('Home 1') }}</option>
                                    <option value="Home 2" {{ 'Home 2' == old('name') ? 'selected' : '' }}>
                                        {{ __('Home 2') }}</option>
                                    <option value="Home 3" {{ 'Home 3' == old('name') ? 'selected' : '' }}>
                                        {{ __('Home 3') }}</option>
                                    <option value="Home 4" {{ 'Home 4' == old('name') ? 'selected' : '' }}>
                                        {{ __('Home 4') }}</option>
                                    <option value="Home 5" {{ 'Home 5' == old('name') ? 'selected' : '' }}>
                                        {{ __('Home 5') }}</option>
                                    <option value="Home 6" {{ 'Home 6' == old('name') ? 'selected' : '' }}>
                                        {{ __('Home 6') }}</option>
                                    <option value="Home 7" {{ 'Home 7' == old('name') ? 'selected' : '' }}>
                                        {{ __('Home 7') }}</option>
                                </select>
                                <span></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-8">
                                <label>{{ __('Image') }}</label>
                                <input type="file" name="image" accept="image/*"
                                    onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                    class="form-control">
                            </div>

                            <div class="col-lg-4 align-self-center mt-3">
                                <img class="table-img" id="themeImage" src="">
                            </div>
                        </div>


                        <div class="form-group col-lg-12">
                            <label for="name">{{ __('Description') }}</label>
                            <textarea class="form-control" name="description" id="themeDescription">{{ old('description') }}</textarea>
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
