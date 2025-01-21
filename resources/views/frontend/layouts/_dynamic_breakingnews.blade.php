
@foreach(breakingnews() as $breaking_news)
    <div class="swiper-slide">
        <p >
            <a href="@if($breaking_news->news_category) @if(Route::has(strtolower($breaking_news->news_categoryslug)))
                 {{ return_post_link($breaking_news) }}
                @endif @endif " class="text-success">
                {{ $breaking_news->title }}
            </a>
        </p>
    </div>

@endforeach
