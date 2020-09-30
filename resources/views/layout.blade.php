<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('meta-title',  config('app.name') )</title>

    <meta name="description" content="@yield('meta-description', 'Este es el blog test')">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/framework.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link rel="stylesheet" href="/css/all.css">
    <link rel="stylesheet" href="/css/navbar.css">
    @include('partials.favicon')
    <link rel="manifest" href="/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    @stack('style')



    <script src="{{ mix('js/app.js')}}"></script>

    @stack('script')
</head>
<body>
<div id="app">

    <div class="preload"></div>

    @include('partials.nav')




    {{-- Inicio del contenido --}}
    @yield('content')
    {{-- fin del contenido --}}

    <section class="footer">
        <footer>
            <div class="container">
                <figure class="logo"><img src="/img/logo.png" alt=""></figure>
                <nav>
                    <ul class="container-flex space-center list-unstyled">
                        <li>
                            <a href="{{ route('pages.home') }}" class="text-uppercase c-white {{ setActiveRoute('pages.home')}}">{{ __('Home')}}</a>
                        </li>
                        <li>
                            <a href="{{ route('pages.about') }}" class="text-uppercase c-white {{ setActiveRoute('pages.about')}}">{{ __('About')}}</a>
                        </li>
                        <li>
                            <a href="{{ route('pages.archive') }}" class="text-uppercase c-white {{ setActiveRoute('pages.archive')}}">{{__('Archive')}}</a>
                        </li>
                        <li>
                            <a href="{{ route('pages.contact') }}" class="text-uppercase c-white {{ setActiveRoute('pages.contact') }}">{{ __('Contact')}}</a>
                        </li>
                    </ul>
                </nav>
                <div class="divider-2"></div>
                <p>Nunc placerat dolor at lectus hendrerit dignissim. Ut tortor sem, consectetur nec hendrerit ut, ullamcorper ac odio. Donec viverra ligula at quam tincidunt imperdiet. Nulla mattis tincidunt auctor.</p>
                <div class="divider-2" style="width: 80%;"></div>
                <p>© 2020 - una vez más vcp. Todos los derechos reservados. Diseñado y desarrollado by <span class="c-white">Fabian A. Gallardo</span></p>
                <ul class="social-media-footer list-unstyled">
                    <li><a href="#" class="fb"></a></li>
                    <li><a href="#" class="tw"></a></li>
                    <li><a href="#" class="in"></a></li>
                    <li><a href="#" class="pn"></a></li>
                </ul>
            </div>
        </footer>
    </section>
</div>


</body>
</html>

