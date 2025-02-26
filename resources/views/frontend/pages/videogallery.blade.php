@extends('frontend.master')
@push('styles')
    <style>
        .hover-shadow {
            transition: all 0.3s ease;
        }

        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        }

        .object-fit-cover {
            object-fit: cover;
        }

        .page-link {
            padding: 0.75rem 1rem;
            margin: 0 0.25rem;
            border-radius: 8px !important;
            transition: all 0.3s ease;
        }

        .page-link:focus {
            box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25);
        }

        .hover-green:hover {
            background-color: #28a745;
            color: white !important;
        }

        .page-item.disabled .page-link {
            color: #6c757d;
        }
    </style>
@endpush
@section('main_content')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="py-3 bg-light">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ URL('/') }}" class="text-decoration-none">
                        <i class="fas fa-home me-1"></i>{{ __('Home') }}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __('Video Gallery') }}
                </li>
            </ol>
        </div>
    </nav>

    <!-- Video Gallery Section -->
    <section class="py-5">
        <div class="container">
            <!-- Section Header -->
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <div class="position-relative">
                        <h2 class="display-4 fw-bold mb-4">{{ __('Video Gallery') }}</h2>
                        <div class="border-bottom border-3 w-25 mx-auto"></div>
                    </div>
                </div>
            </div>

            <!-- Video Grid -->
            <div class="row g-4">
                @foreach ($videos as $video)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm hover-shadow transition">
                            <!-- Video Thumbnail -->
                            <div class="position-relative">
                                <img loading="lazy"
                                    src="{{ $video->image ? asset($video->image) : asset('/maan/images/26.png') }}"
                                    alt="{{ $video->title }}" class="card-img-top object-fit-cover" style="height: 240px;">



                                <!-- Play Button -->
                                <a class="position-absolute top-50 start-50 translate-middle my-video-gallery"
                                    data-autoplay="true" data-vbtype="video" data-gall="myvidgallery"
                                    href="{{ $video->video }}" data-href="{{ $video->video }}">

                                    <div class="btn btn-light rounded-circle p-3">
                                        <i class="fas fa-play fs-4"></i>
                                    </div>
                                </a>
                            </div>

                            <!-- Video Details -->
                            <div class="card-body">
                                <h5 class="card-title text-truncate mb-3">{{ $video->title }}</h5>
                                <p class="card-text text-muted">
                                    {{ Str::limit($video->description, 120) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="row mt-5">
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <div class="d-flex justify-content-center">
                            @if ($videos->hasPages())
                                <ul class="pagination pagination-lg">
                                    {{-- Previous Page Link --}}
                                    @if ($videos->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link border-0 bg-transparent">
                                                <i class="fas fa-chevron-left"></i>
                                            </span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link border-0 text-success"
                                                href="{{ $videos->previousPageUrl() }}" rel="prev">
                                                <i class="fas fa-chevron-left"></i>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($videos->getUrlRange(1, $videos->lastPage()) as $page => $url)
                                        @if ($page == $videos->currentPage())
                                            <li class="page-item active">
                                                <span class="page-link border-0 bg-success">{{ $page }}</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link border-0 text-success hover-green"
                                                    href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($videos->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link border-0 text-success" href="{{ $videos->nextPageUrl() }}"
                                                rel="next">
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link border-0 bg-transparent">
                                                <i class="fas fa-chevron-right"></i>
                                            </span>
                                        </li>
                                    @endif
                                </ul>
                            @endif
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize venobox after logging
            $('.venobox').venobox();
            $('.my-video-links').venobox();
            $('.my-video-gallery').venobox();
        });
    </script>
@endpush
