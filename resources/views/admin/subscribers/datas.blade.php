@foreach ($subscribers as $subscriber)
<tr>
    @can('users-delete')
    <td class="w-60 checkbox text-start">
        <label class="table-custom-checkbox">
            <input type="checkbox" name="ids[]" class="table-hidden-checkbox checkbox-item"
                value="{{ $subscriber->id }}" data-url="{{ route('admin.subscriber.delete-all') }}">
            <span class="table-custom-checkmark custom-checkmark"></span>
        </label>
        <i class=""></i>
    </td>
    @endcan
    <td>{{ $loop->iteration }}</td>
    <td>{{ $subscriber->email }}</td>

    <td class="print-d-none">
        <div class="dropdown table-action">
            <button type="button" data-bs-toggle="dropdown">
                <i class="far fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu">
               @can('users-delete')
                <li>
                    <a href="{{ route('admin.subscriber.destroy', $subscriber->id) }}" class="confirm-action"
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
