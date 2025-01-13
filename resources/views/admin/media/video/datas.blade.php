@foreach ($videogalleries as $videogallery)
    <tr>
        @can('videos-delete')
        <td class="w-60 checkbox text-start">
            <label class="table-custom-checkbox">
                <input type="checkbox" name="ids[]" class="table-hidden-checkbox checkbox-item"
                    value="{{ $videogallery->id }}" data-url="{{ route('admin.videogallery.delete-all') }}">
                <span class="table-custom-checkmark custom-checkmark"></span>
            </label>
        </td>
        @endcan
        <td>{{ $loop->iteration }}</td>

        <td>
            @if ($videogallery->video_option == 'Upload Video')
                <div class="embed-responsive embed-responsive-16by9">
                    <video controls="true" class="embed-responsive-item custom-video">
                        <source class="table-img" src="{{ asset($videogallery->video) }}" type="video/mp4" />
                    </video>
                </div>
            @else
                <iframe src="{{ asset($videogallery->video) }}" allow="fullscreen"></iframe>
            @endif
        </td>
        <td>{{ Str::limit($videogallery->title, 20, '...') }}</td>

        <td class="text-center">
            <label class="switch">
                <input type="checkbox" {{ $videogallery->status == 1 ? 'checked' : '' }} class="status"
                    data-url="{{ route('admin.videogallery.status',$videogallery->id) }}">
                <span class="slider round"></span>
            </label>
        </td>

        <td class="print-d-none">
            <div class="dropdown table-action">
                <button type="button" data-bs-toggle="dropdown">
                    <i class="far fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu">
                    @can('videos-update')
                    <li>
                        <a href="{{ route('admin.videogallery.edit', $videogallery->id) }}"><i class="fal fa-pencil-alt"></i>{{ __('Edit') }}</a>
                    </li>
                    @endcan
                   @can('videos-delete')
                    <li>
                        <a href="{{ route('admin.videogallery.destroy', $videogallery->id) }}" class="confirm-action"
                            data-method="DELETE">
                            <i class="fal fa-trash-alt"></i>
                            {{ __('Delete') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </div>
        </td>

    </tr>
@endforeach
