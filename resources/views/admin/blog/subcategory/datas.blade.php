@foreach ($subcategories as $subcategory)
<tr>
    @can('blog-sub-categories-delete')
    <td class="w-60 checkbox text-start">
        <label class="table-custom-checkbox">
            <input type="checkbox" name="ids[]" class="table-hidden-checkbox checkbox-item"
                value="{{ $subcategory->id }}" data-url="{{ route('admin.blog.subcategory.delete-all') }}">
            <span class="table-custom-checkmark custom-checkmark"></span>
        </label>
    </td>
    @endcan
    <td>{{ $loop->iteration }}</td>
    <td>{{ $subcategory->blogCategory->name }}</td>
    <td>{{ $subcategory->name }}</td>

    <td class="print-d-none">
        <div class="dropdown table-action">
            <button type="button" data-bs-toggle="dropdown">
                <i class="far fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu">
               @can('blog-sub-categories-update')
                <li>
                    <a href="#edit-blog-subcategory" class="edit-blog-subcategory-btn" data-bs-toggle="modal"
                        data-url="{{ route('admin.blog.subcategory.update', $subcategory->id) }}"
                        data-blog-sub-category-name="{{ $subcategory->name }}"
                        data-blog-sub-category-id="{{ $subcategory->category_id }}">
                        <i class="fal fa-pencil-alt"></i>
                        {{ __('Edit') }}
                    </a>
                </li>
                @endcan
               @can('blog-sub-categories-delete')
                <li>
                    <a href="{{ route('admin.blog.subcategory.destroy', $subcategory->id) }}" class="confirm-action"
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
