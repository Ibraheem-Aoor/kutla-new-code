@foreach ($photogalleries as $photogallery)
<tr>
    @can('photos-delete')
    <td class="w-60 checkbox text-start">
        <label class="table-custom-checkbox">
            <input type="checkbox" name="ids[]" class="table-hidden-checkbox checkbox-item"
                value="{{ $photogallery->id }}" data-url="{{ route('admin.photogalleries.delete-all') }}">
            <span class="table-custom-checkmark custom-checkmark"></span>
        </label>
    </td>
    @endcan
    <td>{{ $loop->iteration }}</td>
    <td>
        <img class="table-img" src="{{ asset($photogallery->image) }}" alt="photo">
    </td>
    <td>{{ Str::limit($photogallery->title, 20, '...') }}</td>

    <td class="text-center">
        <label class="switch">
            <input type="checkbox" {{ $photogallery->status == 1 ? 'checked' : '' }} class="status"
                data-url="{{ route('admin.photogalleries.status', $photogallery->id) }}">
            <span class="slider round"></span>
        </label>
    </td>

    <td class="print-d-none">
        <div class="dropdown table-action">
            <button type="button" data-bs-toggle="dropdown">
                <i class="far fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu">
                @can('photos-update')
                <li>
                    <a href="#edit-photo" class="photo-edit-btn" data-bs-toggle="modal"
                        data-url="{{ route('admin.photogalleries.update', $photogallery->id) }}"
                        data-title="{{ $photogallery->title }}"
                        data-status="{{ $photogallery->status }}"
                        data-description="{{ $photogallery->description }}"
                        data-image="{{ asset($photogallery->image) ?? '' }}">
                        <i class="fal fa-pencil-alt"></i>
                        {{ __('Edit') }}
                    </a>
                </li>
                @endcan
                @can('photos-delete')
                <li>
                    <a href="{{ route('admin.photogalleries.destroy', $photogallery->id) }}" class="confirm-action"
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
