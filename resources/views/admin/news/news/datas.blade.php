@foreach ($newsall as $news)
    <tr>
        @can('news-delete')
        <td class="w-60 checkbox text-start">
            <label class="table-custom-checkbox">
                <input type="checkbox" name="ids[]" class="table-hidden-checkbox checkbox-item"
                    value="{{ $news->id }}" data-url="{{ route('admin.news.delete-all') }}">
                <span class="table-custom-checkmark custom-checkmark"></span>
            </label>
            <i class=""></i>
        </td>
        @endcan
        <td>{{ $loop->iteration }}</td>
        @php
            $images = json_decode($news->image, true);
        @endphp

        <td>
            @if ($images != '')
                @foreach ($images as $image)
                    @if (File::exists($image))
                        <img class="table-img" src="{{ asset($image) }}" alt="news image">
                    @endif
                @endforeach
            @endif
        </td>
        <td>{{ Str::limit($news->title, 20, '...') }}</td>
        <td>{{ Str::limit($news->summary, 20, '...') }}</td>
        <td class="text-center">
            <label class="switch">
                <input type="checkbox" {{ $news->status == 1 ? 'checked' : '' }} class="status" data-url="{{ route('admin.news.status',$news->id) }}">
                <span class="slider round"></span>
            </label>
        </td>

        <td class="text-center">
            <label class="switch">
                <input type="checkbox" {{ $news->breaking_news == 1 ? 'checked' : '' }} class="toggle-breaking" data-url="{{ route('admin.breaking.news',$news->id) }}">
                <span class="slider round"></span>
            </label>
        </td>
        <td class="text-center">
            <label class="switch">
                <input type="checkbox" {{ $news->is_in_home == 1 ? 'checked' : '' }} class="status" data-url="{{ route('admin.news.in_home',$news->id) }}">
                <span class="slider round"></span>
            </label>
        </td>

        <td class="print-d-none">
            <div class="dropdown table-action">
                <button type="button" data-bs-toggle="dropdown">
                    <i class="far fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu">
                   @can('news-update')
                    <li>
                        <a href="{{ route('admin.news.edit', $news->id) }}" class="">
                            <i class="fal fa-edit"></i>
                            {{ __('Edit') }}
                        </a>
                    </li>
                    @endcan
                    @can('news-delete')
                    <li>
                        <a href="{{ route('admin.news.destroy', $news->id) }}" class="confirm-action"
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
