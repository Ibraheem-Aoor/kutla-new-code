@foreach ($specialities as $speciality)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td class=''>{{ $speciality->name }}</td>

    <td class="print-d-none">
        <div class="dropdown table-action">
            <button type="button" data-bs-toggle="dropdown">
                <i class="far fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu">
               @can('specialities-update')
                <li>
                    <a href="#edit-speciality" class="edit-speciality-btn" data-bs-toggle="modal"
                        data-url="{{ route('admin.news.speciality.update', $speciality->id) }}"
                        data-name="{{ $speciality->name }}">
                        <i class="fal fa-edit"></i>
                        {{ __('Edit') }}
                    </a>
                </li>
                @endcan
            </ul>
        </div>
    </td>
</tr>
@endforeach
