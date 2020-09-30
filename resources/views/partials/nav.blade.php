
<header class="header-nav">
    <div class="top">
        <div class="container-nav">
            <ul class="lang ul-nav">
                <!-- <li><a href="#"><img src="lang1.png"></a></li>
                <li><a href="#"><img src="lang2.png"></a></li>
                <li><a href="#"><img src="lang3.png"></a></li> -->
            </ul>
            <ul class="social ul-nav">
                <li><a href="#"><i class="far fa-envelope a-nav"></i></a></li>
                <li><a href="#"><i class="fab fa-facebook-f a-nav"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram a-nav"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube a-nav"></i></a></li>
            </ul>
        </div>
    </div>

    <nav class="nav-logo">
        <div class="container-nav">
            <a href="{{ route('pages.home') }}" class="logo">
                <img src="/img/logo.png">
            </a>

            <input type="checkbox" id="menu">
            <label for="menu"><i class="far fa-bars"></i></label>
            <ul class="menuList ul-nav">
{{--                <li>--}}
{{--                    <a href="{{ route('pages.home') }}" class="{{ setActiveRoute('pages.home')}}">{{ __('Home')}}</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{ route('pages.about') }}" class="{{ setActiveRoute('pages.about')}}">{{ __('About')}}</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{ route('pages.archive') }}" class="{{ setActiveRoute('pages.archive')}}">{{__('Archive')}}</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{ route('pages.contact') }}" class="{{ setActiveRoute('pages.contact') }}">{{ __('Contact')}}</a>--}}
{{--                </li>--}}
                <li><a class="a-nav" href="{{ route('pages.home') }}">{{ __('Home')}}</a></li>
                <li><a class="a-nav" href="{{ route('pages.about') }}">{{ __('About')}}</a></li>
                <li><a class="" href="#"></a></li>
                <li><a class="" href="#"></a></li>
                {{--                <li><a class="a-nav" href="#">Contact</a></li> --}}
                <li><a class="a-nav" href="{{ route('pages.archive') }}">{{__('Archive')}}</a></li>
                <li><a class="a-nav" href="{{ route('pages.contact') }}">{{ __('Contact')}}</a></li>


            </ul>
        </div>
    </nav>
</header>
