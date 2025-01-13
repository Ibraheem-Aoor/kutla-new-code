@foreach ($categories as $category)
<tr>
    @can('blog-categories-delete')
    <td class="w-60 checkbox text-start">
        <label class="table-custom-checkbox">
            <input type="checkbox" name="ids[]" class="table-hidden-checkbox checkbox-item"
                value="{{ $category->id }}" data-url="{{ route('admin.blog.category.delete-all') }}">
            <span class="table-custom-checkmark custom-checkmark"></span>
        </label>
    </td>
    @endcan
    <td>{{ $loop->iteration }}</td>
    <td>{{ $category->name }}</td>

    <td class="print-d-none">
        <div class="dropdown table-action">
            <button type="button" data-bs-toggle="dropdown">
                <i class="far fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu">
                @can('blog-categories-update')
                <li>
                    <a href="#edit-update-blog-category" class="blog-category-edit-btn" data-bs-toggle="modal"
                        data-url="{{ route('admin.blog.category.update', $category->id) }}"
                        data-blog-category-name="{{ $category->name }}">
                        <i class="fal fa-pencil-alt"></i>
                        {{ __('Edit') }}
                    </a>
                </li>
                @endcan
                @can('blog-categories-delete')
                <li>
                    <a href="{{ route('admin.blog.category.destroy', $category->id) }}" class="confirm-action"
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
