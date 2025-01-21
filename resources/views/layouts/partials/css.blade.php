
<link rel="shortcut icon" type="image/x-icon" href="{{ asset(get_option('general')['favicon'] ?? 'assets/images/logo/favicon.png')}}">
<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<!-- Fontawesome -->
<link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
{{-- jquery-confirm --}}
<link rel="stylesheet" href="{{ asset('assets/plugins/jquery-confirm/jquery-confirm.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/summernote-lite.css') }}">
<!-- Lily -->
<link rel="stylesheet" href="{{ asset('assets/css/lity.css') }}">
<!-- Style -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v=0.01">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/maan-custom.css') }}?v=0.01">
<!-- Toaster -->
<link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
@stack('css')

@if (app()->getLocale() == 'ar')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('assets/css/arabic.css') }}?v=0.01">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.rtl.min.css') }}">
@endif

