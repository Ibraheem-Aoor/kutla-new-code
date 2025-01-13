@foreach ($reporters as $reporter)
    <tr>
        @can('repoters-delete')
        <td class="w-60 checkbox text-start">
            <label class="table-custom-checkbox">
                <input type="checkbox" name="ids[]" class="table-hidden-checkbox checkbox-item"
                    value="{{ $reporter->id }}" data-url="{{ route('admin.reporter.delete-all') }}">
                <span class="table-custom-checkmark custom-checkmark"></span>
            </label>
        </td>
        @endcan
        <td>{{ $loop->iteration }}</td>
        <td class="maanimage">
            <img class="table-img" src="{{ asset($reporter->image ?? 'assets/images/icons/default-user.png') }}" alt="{{ $reporter->user_name }}">
        </td>
        <td>{{ $reporter->first_name }} {{ $reporter->last_name }}</td>
        <td>{{ $reporter->email }} </td>
        <td>{{ $reporter->phone }}</td>

        <td class="print-d-none">
            <div class="dropdown table-action">
                <button type="button" data-bs-toggle="dropdown">
                    <i class="far fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu">
                    @can('repoters-update')
                    <li>
                        <a href="{{ route('admin.reporter.edit', $reporter->id) }}"><i class="fal fa-pencil-alt"></i>{{ __('Edit') }}</a>
                    </li>
                   @endcan
                   @can('repoters-delete')
                    <li>
                        <a href="{{ route('admin.reporter.destroy', $reporter->id) }}" class="confirm-action"
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
