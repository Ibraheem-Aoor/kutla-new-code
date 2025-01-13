@foreach ($seooptimizations as $seooptimization)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $seooptimization->keywords }} </td>
    <td>{{ $seooptimization->author }} </td>
    <td>{{ $seooptimization->meta_title }} </td>
    <td>{{ $seooptimization->meta_description }} </td>
    <td>{{ $seooptimization->google_analytics }} </td>

    <td class="print-d-none">
        <div class="dropdown table-action">
            <button type="button" data-bs-toggle="dropdown">
                <i class="far fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu">
                @can('seo-update')
                <li>
                    <a href="#edit-seo" class="edit-seo-btn" data-bs-toggle="modal"
                        data-url="{{ route('admin.seo.update',$seooptimization->id) }}"
                        data-seo-keyword="{{ $seooptimization->keywords }}"
                        data-seo-author-name="{{ $seooptimization->author }}"
                        data-seo-meta-title="{{ $seooptimization->meta_title }}"
                        data-seo-meta-description="{{ $seooptimization->meta_description }}"
                        data-seo-google-analytics="{{ $seooptimization->google_analytics }}"
                        >
                        <i class="fal fa-pencil-alt"></i>
                        {{ __('Edit') }}
                    </a>
                </li>
                @endcan

                @can('seo-delete')
                <li>
                    <a href="{{ route('admin.seo.destroy', $seooptimization->id) }}" class="confirm-action"
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
