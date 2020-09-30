
@extends('layout')
{{--titulo que sale de la pestaña del navegador--}}

@section('meta-title', $post->title )

{{--descripcion del texto que saldra en el navegador--}}
@section('meta-description', $post->excerpt )



@section('content')
    <section class="post container">

        @include($post->viewType())

        <div class="content-post">
            @include('posts.header')
            <h1>{{ $post->title }}</h1>
            <div class="divider"></div>
            <div class="image-w-text">
               {!! $post->body !!}
            </div>

            <footer class="container-flex space-between">
                @include('partials.social-links', ['description' => $post->title])
                <div class="tags container-flex">

                    @include('posts.tags')
                </div>
            </footer>
            <div class="comments">
                <div class="divider"></div>
                <div id="disqus_thread"></div>
                    @include('partials.disqus-script')
            </div><!-- .comments -->
        </div>
    </section>
@stop

@push('style')

    <link href="{{ asset('css/twitter-bootstrap.css') }}" rel="stylesheet">
@endpush
@push( 'script')

    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
    <script type="text/javascript" src="{{ asset('js/twitter-bootstrap.min.js') }}"></script>
    <script>
        $('.carousel').carousel({
            interval: 500
        })
    </script>
@endpush
