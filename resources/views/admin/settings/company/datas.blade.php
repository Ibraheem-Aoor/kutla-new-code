@foreach ($companies as $company)
<tr>
    @can('company-settings-delete')
    <td class="w-60 checkbox text-start">
        <label class="table-custom-checkbox">
            <input type="checkbox" name="ids[]" class="table-hidden-checkbox checkbox-item"
                value="{{ $company->id }}" data-url="{{ route('admin.company.delete-all') }}">
            <span class="table-custom-checkmark custom-checkmark"></span>
        </label>
    </td>
    @endcan
    <td>{{ $loop->iteration }}</td>
    <td>{{ $company->value['name'] }}</td>
    <td>{{ $company->value['address_line1'] }}</td>
    <td>{{ $company->value['address_line2'] }}</td>
    <td>{{ $company->value['email'] }}</td>
    <td>{{ $company->value['phone'] }}</td>
    <td>{{ Str::limit($company->value['message'], 20, '...') }}</td>

    @can('company-settings-update')
    <td class="text-center">
        <label class="switch">
            <input type="checkbox" {{ $company->status == 1 ? 'checked' : '' }} class="status"
                data-url="{{ route('admin.company.status', $company->id) }}">
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
                @can('company-settings-update')
                <li>
                    <a href="#edit-company-info" class="edit-company-btn" data-bs-toggle="modal"
                        data-url="{{ route('admin.company.update',$company->id) }}"
                        data-company-name="{{ $company->value['name'] }}"
                        data-company-address-line1="{{ $company->value['address_line1'] }}"
                        data-company-address-line2="{{ $company->value['address_line2'] }}"
                        data-company-phone="{{ $company->value['phone'] }}"
                        data-company-email="{{ $company->value['email'] }}"
                        data-company-location_map="{{ $company->value['location_map'] }}"
                        data-company-message="{{ $company->value['message'] }}"
                        data-company-copyright="{{ $company->value['copyright'] }}"
                        data-company-version="{{ $company->value['version'] }}"
                        >
                        <i class="fal fa-pencil-alt"></i>
                        {{ __('Edit') }}
                    </a>
                </li>
                @endcan

                @can('company-settings-delete')
                <li>
                    <a href="{{ route('admin.company.destroy', $company->id) }}" class="confirm-action"
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
