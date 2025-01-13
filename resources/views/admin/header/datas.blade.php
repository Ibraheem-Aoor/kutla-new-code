@foreach ($headers as $header)
<tr>
    @can('headers-delete')
    <td class="w-60 checkbox text-start">
        <label class="table-custom-checkbox">
            <input type="checkbox" name="ids[]" class="table-hidden-checkbox checkbox-item"
                value="{{ $header->id }}" data-url="{{ route('admin.header.delete-all') }}">
            <span class="table-custom-checkmark custom-checkmark"></span>
        </label>
    </td>
    @endcan
    <td>{{ $loop->iteration }}</td>
    <td class="list-image-rectangular">
        @if ($header->image)
            <img class="table-img" src="{{ asset($header->image) }} " alt="{{ $header->user_name }}">
        @else
            <img src="{{ asset('maan/images/user-icon.png') }} "
                alt="{{ $header->user_name }}">
        @endif
    </td>
    <td>{{ $header->name }}</td>

    @can('headers-update')
    <td class="text-center">
        <label class="switch">
            <input type="checkbox" {{ $header->is_active == 1 ? 'checked' : '' }} class="toggle-is-active"
                data-url="{{ route('admin.header.is.active',$header->id) }}">
            <span class="slider round"></span>
        </label>
    </td>
    @endcan

    @can('headers-update')
    <td class="text-center">
        <label class="switch">
            <input type="checkbox" {{ $header->status == 1 ? 'checked' : '' }} class="status"
                data-url="{{ route('admin.header.status', $header->id) }}">
            <span class="slider round"></span>
        </label>
    </td>
    @endcan

    <td class="print-d-none">
        <div class="dropdown table-action">
            <button type="button" data-bs-toggle="dropdown">
                <i class="far fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu">
                @can('headers-update')
                <li>
                    <a href="{{ route('admin.header.edit', $header->id) }}"><i class="fal fa-pencil-alt">
                        </i>{{ __('Edit') }}</a>
                </li>
                @endcan
                @can('headers-delete')
                <li>
                    <a href="{{ route('admin.header.destroy', $header->id) }}" class="confirm-action"
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
