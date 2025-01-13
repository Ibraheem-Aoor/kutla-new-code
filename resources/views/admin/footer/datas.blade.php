@foreach ($footers as $footer)
<tr>
    @can('footers-delete')
    <td class="w-60 checkbox text-start">
        <label class="table-custom-checkbox">
            <input type="checkbox" name="ids[]" class="table-hidden-checkbox checkbox-item"
                value="{{ $footer->id }}" data-url="{{ route('admin.footer.delete-all') }}">
            <span class="table-custom-checkmark custom-checkmark"></span>
        </label>
    </td>
    @endcan
    <td>{{ $loop->iteration }}</td>
    <td class="list-image-rectangular">
        @if ($footer->image)
            <img class="table-img" src="{{ asset($footer->image) }} " alt="{{ $footer->user_name }}">
        @else
            <img src="{{ asset('maan/images/user-icon.png') }} "
                alt="{{ $footer->user_name }}">
        @endif
    </td>
    <td>{{ $footer->name }}</td>

    @can('footers-update')
    <td class="text-center">
        <label class="switch">
            <input type="checkbox" {{ $footer->is_active == 1 ? 'checked' : '' }} class="toggle-is-active"
                data-url="{{ route('admin.footer.is.active',$footer->id) }}">
            <span class="slider round"></span>
        </label>
    </td>
    @endcan

    @can('footers-update')
    <td class="text-center">
        <label class="switch">
            <input type="checkbox" {{ $footer->status == 1 ? 'checked' : '' }} class="status"
                data-url="{{ route('admin.footer.status', $footer->id) }}">
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
               @can('footers-update')
                <li>
                    <a href="{{ route('admin.footer.edit', $footer->id) }}"><i class="fal fa-pencil-alt"></i>{{ __('Edit') }}</a>
                </li>
                @endcan

                @can('footers-delete')
                <li>
                    <a href="{{ route('admin.footer.destroy', $footer->id) }}" class="confirm-action"
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
