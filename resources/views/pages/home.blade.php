@extends('layout')


@section('content')

    @if( isset($title))

        <section class="posts container">
            <article class="post">
                <div class="content-post">
                    <h1 class="text-center">{{ $title }}</h1>
                    <div class="divider"></div>
                </div>
            </article>
        </section>
    @endif

    @forelse( $posts as $post)

        <section class="posts container">
            @include($post->viewType('home'))
                <div class="content-post">
                    @include('posts.header')

                    <h1>{{ $post->title }}</h1>
                    <div class="divider"></div>
                    {{  $post->excerpt }}
                    <footer class="container-flex space-between">
                        <div class="read-more">
                            <a href="{{ route('posts.show', $post) }}" class="text-uppercase c-green">{{ __('read more') }}</a>
                        </div>
                        @include('posts.tags')

                    </footer>
                </div>
            </article>

        </section><!-- fin del div.posts.container -->
    @empty

        <section class="posts container">
            <article class="post">
                <div class="content-post">
                    @include('posts.header')

                    <h1>No hay publicaciones todavia</h1>



                </div>
            </article>

        </section><!-- fin del div.posts.container -->
    @endforelse

    {{ $posts->appends(request()->all())->links('vendor.pagination.default') }}


@stop
