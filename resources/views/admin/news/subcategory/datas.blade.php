@foreach ($subcategories as $subcategory)
    <tr>
        @can('sub-categories-delete')
        <td class="w-60 checkbox text-start">
            <label class="table-custom-checkbox">
                <input type="checkbox" name="ids[]" class="table-hidden-checkbox checkbox-item"
                    value="{{ $subcategory->id }}" data-url="{{ route('admin.news.subcategory.delete-all') }}">
                <span class="table-custom-checkmark custom-checkmark"></span>
            </label>
        </td>
        @endcan
        <td>{{ $loop->iteration }}</td>
        <td>{{ $subcategory->newsCategory->name }}</td>
        <td>{{ $subcategory->name }}</td>

        <td class="print-d-none">
            <div class="dropdown table-action">
                <button type="button" data-bs-toggle="dropdown">
                    <i class="far fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu">
                    @can('sub-categories-update')
                    <li>
                        <a href="#edit-subcategory" class="edit-subcategory-btn" data-bs-toggle="modal"
                            data-url="{{ route('admin.news.subcategory.update', $subcategory->id) }}"
                            data-name="{{ $subcategory->name }}"
                            data-category-id="{{ $subcategory->category_id }}">
                            <i class="fal fa-pencil-alt"></i>
                            {{ __('Edit') }}
                        </a>
                    </li>
                    @endcan
                    @can('sub-categories-delete')
                    <li>
                        <a href="{{ route('admin.news.subcategory.destroy', $subcategory->id) }}" class="confirm-action"
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
