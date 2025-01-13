
@foreach(breakingnews() as $breaking_news)
    <div class="swiper-slide">
        <p>
            <a href="@if($breaking_news->news_category) @if(Route::has(strtolower($breaking_news->news_categoryslug)))
                 {{ route('news.details', ['category_name' => $breaking_news->news_categoryslug, 'id' => $breaking_news->id]) }}
                @endif @endif ">
                {{ $breaking_news->title }}
            </a>
        </p>
    </div>

@endforeach
