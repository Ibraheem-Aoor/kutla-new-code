@foreach ($themes as $theme)
    <div class="col-lg-4">
        <div class="card">
            <div>
                <img class="theme-img" src="{{ asset($theme->image) }}" class="card-img-top" alt="theme-img">
            </div>
            <div class="card-body theme-discription-body">
                <h3 class="card-title">{{ $theme->title }}</h3>
                <p class="card-text">{{ __('Author:') }} {{ $theme->author }} </p>
                <p class="card-text">{{ __('Version:') }} {{ $theme->version }}</p>
                <p class="card-text">{{ __('Description:') }} {{ $theme->description }}</p>

                <div class="mt-3">

                    @if ($theme->is_active == 1)
                        <button class="btn btn-success news-theme-btn status-item active-btn m-0"
                            id="theme_active_{{ $theme->id }}" data-id ="{{ $theme->id }}"
                            data-is-active="{{ $theme->is_active }}" data-status-text="Theme Active"
                            disabled>{{ __('Activated') }}</button>
                    @else
                        <button class="btn news-theme-btn status-item deactive-btn m-0"
                            id="theme_active_{{ $theme->id }}" data-id ="{{ $theme->id }}"
                            data-is-active="{{ $theme->is_active }}"
                            data-status-text="Theme Active">{{ __('Deactivated') }}</button>
                    @endif

                    @can('theme-settings-update')
                        <a href="#edit-theme" class="btn btn-primary edit-theme-btn" data-bs-toggle="modal"
                            data-url="{{ route('admin.theme.update', $theme->id) }}" data-title ="{{ $theme->title }}"
                            data-author ="{{ $theme->author }}" data-description ="{{ $theme->description }}"
                            data-page ="{{ $theme->page }}" data-version ="{{ $theme->version }}"
                            data-theme-image="{{ $theme->image ? asset($theme->image) : asset('default/image/path.jpg') }}">
                            <i class="fal fa-pencil-alt"></i>
                            {{ __('Edit') }}
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endforeach
