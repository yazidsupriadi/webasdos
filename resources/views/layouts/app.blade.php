<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Asdos Website</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 50%, rgba(0,212,255,1) 100%);">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
            <div class="container">
                <img  height="50px" src="data:image/jpeg;base64,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" alt="" srcset="">
                <a class="navbar-brand" href="{{ url('/') }}">
                   Website Asdos NF
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="margin: 100px;">
            @yield('content')
        </main>
    </div>
</body>
</html>
