@foreach ($users as $user)
    <tr>
        @can('users-delete')
        <td class="w-60 checkbox text-start">
            <label class="table-custom-checkbox">
                <input type="checkbox" name="ids[]" class="table-hidden-checkbox checkbox-item"
                    value="{{ $user->id }}" data-url="{{ route('admin.user.delete-all') }}">
                <span class="table-custom-checkmark custom-checkmark"></span>
            </label>
        </td>
        @endcan
        <td>{{ $loop->index + 1 }}</td>
        <td>
            <img class="table-img" src="{{ asset($user->image ?? 'assets/images/icons/default-user.png') }}" alt="img">
        </td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ $user->role }}</td>
        <td class="print-d-none">
            <div class="dropdown table-action">
                <button type="button" data-bs-toggle="dropdown">
                    <i class="far fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu">
                    @can('users-read')
                    <li>
                        <a href="#user-view" data-bs-toggle="modal" class="staff-view-btn"
                            data-staff-view-name="{{ $user->name ?? 'N/A' }}"
                            data-staff-view-phone-number="{{ $user->phone ?? 'N/A' }}"
                            data-staff-view-email-number="{{ $user->email ?? 'N/A' }}"
                            data-staff-view-role="{{ $user->role ?? 'N/A' }}"> <i
                                class="fal fa-eye"></i>{{ __('View') }}</a>
                        </li>
                    @endcan
                    @can('users-update')
                    <li>
                        <a href="{{ route('admin.user.edit', [$user->id, 'users' => $user->role]) }}"><i class="fal fa-pencil-alt"></i>{{ __('Edit') }}</a>
                    </li>
                    @endcan
                    @can('users-delete')
                    <li>
                        <a href="{{ route('admin.user.destroy', $user->id) }}" class="confirm-action"
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
