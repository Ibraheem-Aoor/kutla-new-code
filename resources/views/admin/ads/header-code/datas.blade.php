@foreach ($googleanalytics as $googleanalytic)
<tr>
    <td class="w-60 checkbox text-start">
        <label class="table-custom-checkbox">
            <input type="checkbox" name="ids[]" class="table-hidden-checkbox checkbox-item" >
            <span class="table-custom-checkmark custom-checkmark"></span>
        </label>
    </td>

    <td>{{ $loop->iteration }}</td>
    <td>{{ $googleanalytic->google_analytics }} </td>

    <td class="print-d-none">
        <div class="dropdown table-action">
            <button type="button" data-bs-toggle="dropdown">
                <i class="far fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu">

                <li>
                    <a href="#edit-header" class="edit-header-code-btn" data-bs-toggle="modal"
                        data-url="{{ route('admin.ads.googleanalytics.update', $googleanalytic->id) }}"
                        data-google-analytics-text="{{ $googleanalytic->google_analytics }}">
                        <i class="fal fa-pencil-alt"></i>
                        {{ __('Edit') }}
                    </a>
                </li>


                <li>
                    <a href="{{ route('admin.ads.googleanalytics.destroy', $googleanalytic->id) }}" class="confirm-action"
                        data-method="DELETE">
                        <i class="fal fa-trash-alt"></i>
                        {{ __('Delete') }}
                    </a>
                </li>

            </ul>
        </div>
    </td>
</tr>
@endforeach
