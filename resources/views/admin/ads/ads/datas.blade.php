@foreach ($advertisements as $advertisement)
<tr>
    <td class="w-60 checkbox text-start">
        <label class="table-custom-checkbox">
            <input type="checkbox" name="ids[]" class="table-hidden-checkbox checkbox-item"
            value="{{ $advertisement->id }}" data-url="{{ route('admin.ads.advertisement.delete-all') }}" >
            <span class="table-custom-checkmark custom-checkmark"></span>
        </label>
    </td>

    <td>{{ $loop->iteration }}</td>
    <td>{!! $advertisement->header_ads !!} </td>
    <td>{!! $advertisement->sidebar_ads !!}</td>
    <td>{!! $advertisement->before_post_ads !!} </td>
    <td>{!! $advertisement->after_post_ads !!}</td>

    <td class="print-d-none">
        <div class="dropdown table-action">
            <button type="button" data-bs-toggle="dropdown">
                <i class="far fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu">

                <li>
                    <a href="#edit-ads-modal" class="edit-ads-btn" data-bs-toggle="modal"
                        data-url="{{ route('admin.ads.update', $advertisement->id) }}"
                        data-header-ads ="{{$advertisement->header_ads}}"
                        data-sidebar-ads ="{{$advertisement->sidebar_ads}}"
                        data-before-post-ads ="{{$advertisement->before_post_ads}}"
                        data-after-post-ads ="{{$advertisement->after_post_ads}}"
                        >
                        <i class="fal fa-pencil-alt"></i>
                        {{ __('Edit') }}
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.ads.destroy', $advertisement->id) }}" class="confirm-action"
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
