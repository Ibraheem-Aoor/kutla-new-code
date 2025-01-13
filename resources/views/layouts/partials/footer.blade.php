<footer
    class="container-fluid d-flex align-items-center justify-content-center justify-content-sm-between flex-wrap py-3 mt-4 ms-0 bg-white">
    <p class="mb-0 me-3">
        {{ __('Copyright') }} &copy; {{ get_option('company-info')['copyright'] ?? '' }}
    </p>

    <p class="mb-0">{{ __('Version') }}</p>{{ get_option('company-info')['version'] ?? '' }}
</footer>
