@extends('layouts.master')

@section('title')
    {{ __('Gallery List') }}
@endsection
@push('css')
    <!-- FilePond CSS -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endpush
@section('main_content')
    <!-- Main content -->
    <div class="erp-table-section min-vh-100">
        <div class="container-fluid">
            <div class="card">

                <div class="card-bodys">
                    <div class="table-header p-16">
                        <h4>{{ __('Gallery List') }}</h4>
                        @can('photos-read')
                            <a href="#create-photo" class="theme-btn print-btn text-light" data-bs-toggle="modal">
                                <i class="far fa-plus" aria-hidden="true"></i>
                                {{ __('Add Gallery') }}
                            </a>
                        @endcan
                    </div>
                    <div class="table-top-form p-16-0">
                        <form action="{{ route('admin.photogalleries.filter') }}" method="post" class="filter-form"
                            table="#photogallery-data">
                            @csrf
                            <div class="table-top-left d-flex gap-3 margin-l-16">
                                <div class="gpt-up-down-arrow position-relative">
                                    <select name="per_page" class="form-control">
                                        <option value="10">{{ __('Show- 10') }}</option>
                                        <option value="25">{{ __('Show- 25') }}</option>
                                        <option value="50">{{ __('Show- 50') }}</option>
                                        <option value="100">{{ __('Show- 100') }}</option>
                                        <option value="1000">{{ __('Show All') }}</option>
                                    </select>
                                    <span></span>
                                </div>

                                <div class="table-search position-relative">
                                    <input class="form-control" type="text" name="search"
                                        placeholder="{{ __('Search...') }}" value="{{ request('search') }}">
                                    <span class="position-absolute">
                                        <img src="{{ asset('assets/images/search.svg') }}" alt="">
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="responsive-table m-0">
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                @can('photos-delete')
                                    <th>
                                        <div class="d-flex align-items-center gap-1">
                                            <label class="table-custom-checkbox">
                                                <input type="checkbox" class="table-hidden-checkbox selectAllCheckbox">
                                                <span class="table-custom-checkmark custom-checkmark"></span>
                                            </label>
                                            <i class="fal fa-trash-alt delete-selected"></i>
                                        </div>
                                    </th>
                                @endcan
                                <th>{{ __('SL') }}.</th>
                                <th>{{ __('Photo') }}</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Publish Status') }}</th>
                                <th class="maanaction">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody id="photogallery-data">
                            @include('admin.media.photo.datas')
                        </tbody>
                    </table>
                </div>

                <nav>
                    <ul class="pagination">
                        <li class="page-item">{{ $photogalleries->links('pagination::bootstrap-5') }}</li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>

    @push('modal')
        @include('admin.media.photo.create')
        @include('admin.media.photo.edit')
    @endpush
@endsection

@push('modal')
    @include('admin.components.multi-delete-modal')
@endpush
{{-- At the bottom of your create.blade.php, before closing body tag --}}
@push('js')
    <!-- FilePond plugins -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

    <!-- FilePond core -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <script>
        // Register plugins
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType
        );

        // Initialize FilePond
        const inputElement = document.querySelector('input[type="file"].filepond');
        const pond = FilePond.create(inputElement, {
            acceptedFileTypes: ['image/*'],
            allowMultiple: true,
            maxFiles: 20,
            labelIdle: "اختر الصورة او اسحب الملفات",
            server: {
                process: {
                    url: "{{ route('admin.filepond.process') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
            }

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editModal = document.getElementById('edit-photo'); // Replace with your modal ID
            let pond;

            // Listen for the modal show event
            editModal.addEventListener('shown.bs.modal', function(e) {
                const inputElement = editModal.querySelector(
                'input[type="file"].filepond'); // File input inside modal

                // Destroy the existing FilePond instance if it exists
                if (pond) {
                    pond.destroy();
                }

                // Initialize FilePond
                pond = FilePond.create(inputElement, {
                    acceptedFileTypes: ['image/*'],
                    allowMultiple: true,
                    maxFiles: 20,
                    imagePreview: true,
                    labelIdle: "اختر الصورة او اسحب الملفات",
                    server: {
                        process: {
                            url: "{{ route('admin.filepond.process') }}",
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        },
                        remove: (source, load, error, options) => {
                            // AJAX request to delete the image
                            fetch("{{ route('admin.filepond.remove') }}", {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({
                                        id: source,
                                    }) // Pass image ID for deletion
                                })
                                .then(response => console.log(response.json())
                                )
                                .then(load)
                                .catch(error);
                        }
                    }
                });

                // Populate FilePond with preloaded images (without uploading)
                const galleryData = JSON.parse(e.relatedTarget.dataset.gallery || '[]');
                pond.removeFiles(); // Clear any existing files

                galleryData.forEach(image => {
                    // Add the preloaded file without uploading it again
                    pond.addFile(image.options.source , {type:'local' , imagePreview: true});
                });
            });

            // Cleanup FilePond when modal is hidden
            editModal.addEventListener('hidden.bs.modal', function() {
                if (pond) {
                    pond.destroy();
                    pond = null;
                }
            });
        });
    </script>
@endpush
