@foreach ($categories as $category)
    <tr>
        @can('categories-delete')
        <td class="w-60 checkbox text-start">
            <label class="table-custom-checkbox">
                <input type="checkbox" name="ids[]" class="table-hidden-checkbox checkbox-item"
                    value="{{ $category->id }}" data-url="{{ route('admin.news.category.delete-all') }}">
                <span class="table-custom-checkmark custom-checkmark"></span>
            </label>
            <i class=""></i>
        </td>
        @endcan
        <td>{{ $loop->iteration }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->slug }}</td>
        <td>
            <img class="table-img" src="{{ asset($category->image) }}">
        </td>
        <td class="text-center">
            <label class="switch">
                <input type="checkbox" {{ $category->menu_publish == 1 ? 'checked' : '' }} class="toggle-status"
                    data-url="{{ route('admin.news.category.menu.status', $category->id) }}">
                <span class="slider round"></span>
            </label>
        </td>


        <td class="print-d-none">
            <div class="dropdown table-action">
                <button type="button" data-bs-toggle="dropdown">
                    <i class="far fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu">
                    @can('categories-update')
                    <li>
                        <a href="#edit-category" class="edit-category-btn" data-bs-toggle="modal"
                            data-url="{{ route('admin.news.category.update', $category->id) }}"
                            data-name="{{ $category->name }}" data-slug-title="{{ $category->slug }}"
                            data-type="{{ $category->type }}" data-images="{{ asset($category->image) ?? '' }}">
                            <i class="fal fa-pencil-alt"></i>
                            {{ __('Edit') }}
                        </a>
                    </li>
                    @endcan
                   @can('categories-delete')
                    <li>
                        <a href="{{ route('admin.news.category.destroy', $category->id) }}" class="confirm-action"
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
