@extends('frontend.master')
@section('main_content')
    <!-- contact-section start  -->
@if($company)
    <section class="maan-contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="maan-contact-content">
                        <div class="maan-contact-title">
                            <h3>{{ get_option('manage-pages')['headings']['get_in_touch'] ?? '' }}</h3>
                            <p>{{ $company->message }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="maan-contact-content">
                        <div class="maan-contact-title">
                            <h3>{{ get_option('manage-pages')['headings']['contact_address'] ?? '' }}</h3>
                            <p>{{ $company->address_line1 }}{{ $company->address_line2 }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="maan-contact-content">
                        <div class="maan-contact-title">
                            <h3>{{ get_option('manage-pages')['headings']['contact_phone'] ?? '' }}</h3>
                            <p>{{ $company->phone }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="maan-contact-content">
                        <div class="maan-contact-title">
                            <h3>{{ get_option('manage-pages')['headings']['contact_email'] ?? '' }}</h3>
                            <p>{{ $company->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- contact-section end  -->

    <!-- Start Google Map
    ============================================= -->
    <div class="g-map-area">
        <div class="g-map--wrapper text-center">
            <iframe src="{{$company->location_map}}"></iframe>
        </div>
    </div>
    <!-- End Google Map -->
@endif
    <!-- Start Contactg US
    ============================================= -->
    <div class="maan-contact-us">
        <div class="container">
            <div class="contact-us-wpr">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="contact-us-content wow fadeInUp">
                            <form class="row g-5" action="{{ route('contactus.store') }}" method="POST">
                                @csrf
                                <div class="col-md-4">
                                    <input type="text" name="name" class="form-control input-style-2" placeholder="Name">
                                    @error('name')
                                    <span class="text-danger">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <input type="email" name="email" class="form-control input-style-2" placeholder="Email">
                                    @error('email')
                                    <span class="text-danger">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="website" class="form-control input-style-2" placeholder="Website">
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control input-style-2" placeholder="Message"></textarea>
                                    @error('message')
                                    <span class="text-danger">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <div class="login-btns">
                                        <button type="submit" class="btn-4 login-btn">
                                            {{ get_option('manage-pages')['headings']['contact_btn_text'] ?? '' }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Us -->

@endsection
