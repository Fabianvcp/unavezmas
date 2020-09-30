
<header class="container-flex space-between">
    <div class="date">
        <span class="c-gris">{{ optional($post->published_at)->locale('es')->translatedFormat('l d \d\e F') }}/ {{ $post->owner->name }}</span>
    </div>
    @if($post->category)
        <div class="post-category">
            <span class="category"><a href="{{ route('categories.show',$post->category) }}">{{ $post->category->name }}</a></span>
        </div>
    @endif
</header>


{{--<header class="container-flex space-between">--}}

{{--    <div class="date">--}}
{{--        <span class="c-gris">{{ $post->published_at->locale('es')->translatedFormat('l d \d\e F') }} / {{ $post->owner->name }}</span>--}}
{{--    </div>--}}
{{--    <div class="post-category">--}}
{{--        --}}{{--                          llamo a propiedad de la categoria--}}
{{--        <span class="category text-capitalize">--}}
{{--                                <a href="{{ route('categories.show',$post->category) }}">{{ $post->category->name }}</a>--}}
{{--                            </span>--}}
{{--    </div>--}}
{{--</header>--}}
