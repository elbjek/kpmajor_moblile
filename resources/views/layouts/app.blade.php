<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name='viewport' content='width=device-width,
            initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no' />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'kupujemprodajem') }}</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://kit.fontawesome.com/64fabadd2d.js"></script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css" />
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    </head>
    <body>
        <div id="app" style="overflow-x:hidden">
            <nav class="navigation navbar navbar-expand-md  navbar-light" id="nav3">
                <div class="container">
                    <logo-component></logo-component>
                    <button class="nav-button" id="nav" type="button">
                    <i class="fas fa-bars"></i>
                    </button>
                    <div class="drop-navigaton">
                        <!-- Right Side Of Navbar -->
                        <ul class="nav-list ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="navigation-item">
                                <router-link to="/login">
                                    <i class="fas fa-sign-in-alt"></i>
                                    <span>Prijavi se</span>
                                </router-link>
                            </li>
                            @if (Route::has('register'))
                            <li class="navigation-item">
                                <router-link to="/register">
                                    <i class="far fa-list-alt"></i>
                                    <span>Register</span>
                                </router-link>
                            </li>
                            @endif @else
                            <li class="navigation-item"> 
                                <router-link class="" to="/users/{{Auth::id()}}">
                                    <i class="far fa-user"></i>
                                    <span>Profil</span>
                                </router-link>
                            </li>
                            <li class="navigation-item">
                                <router-link class="" to="/products/create">
                                    <i class="far fa-sticky-note"></i>
                                    <span>Postavi oglas</span>
                                </router-link>
                            </li>
                            <li class="navigation-item">
                                <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                   <i class="fas fa-sign-out-alt"></i>
                                   <span>Odjavi se</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-4">
                <!-- @yield('content') -->
                <main-layout></main-layout>
            </main>
        </div>
    </body>
</html>