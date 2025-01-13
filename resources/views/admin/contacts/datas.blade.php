@foreach ($contacts as $contact)
<tr>
    @can('contact-delete')
    <td class="w-60 checkbox text-start">
        <label class="table-custom-checkbox">
            <input type="checkbox" name="ids[]" class="table-hidden-checkbox checkbox-item"
                value="{{ $contact->id }}" data-url="{{ route('admin.contact.delete-all') }}">
            <span class="table-custom-checkmark custom-checkmark"></span>
        </label>
    </td>
    @endcan
    <td>{{ $loop->iteration }}</td>
    <td>{{ $contact->name }}</td>
    <td>{{ $contact->email }}</td>
    <td>{{ Str::limit($contact->message, 20, '...') }}</td>

    <td class="print-d-none">
        <div class="dropdown table-action">
            <button type="button" data-bs-toggle="dropdown">
                <i class="far fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu">
                @can('contact-delete')
                <li>
                    <a href="{{ route('admin.contact.destroy', $contact->id) }}" class="confirm-action"
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
