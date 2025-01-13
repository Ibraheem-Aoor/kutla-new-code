@foreach ($socials as $key => $social)
<tr>
    @can('socials-delete')
    <td class="w-60 checkbox text-start">
        <label class="table-custom-checkbox">
            <input type="checkbox" name="ids[]" class="table-hidden-checkbox checkbox-item"
                value="{{ $social->id }}" data-url="{{ route('admin.social.delete-all') }}">
            <span class="table-custom-checkmark custom-checkmark"></span>
        </label>
    </td>
    @endcan
    <td>{{ $loop->iteration }}</td>
    <td>{{ $social->url }}</td>
    <td>{{ $social->icon_code }}</td>
    <td>{{ $social->follower }}</td>
    <td class="print-d-none">
        <div class="dropdown table-action">
            <button type="button" data-bs-toggle="dropdown">
                <i class="far fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu">
                @can('socials-update')
                <li>
                    <a href="#edit-social-share" class="edit-social-share-btn" data-bs-toggle="modal"
                        data-url="{{ route('admin.social.update',$social->id) }}"
                        data-social-url="{{ $social->url }}"
                        data-icon-code="{{ $social->icon_code }}"
                        data-social-follower="{{ $social->follower }}"
                        >
                        <i class="fal fa-pencil-alt"></i>
                        {{ __('Edit') }}
                    </a>
                </li>
                @endcan
                @can('socials-delete')
                <li>
                    <a href="{{ route('admin.social.destroy', $social->id) }}" class="confirm-action"
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
