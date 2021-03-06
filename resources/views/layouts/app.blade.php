<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    <link rel="stylesheet" href="{{asset('semantic-ui/semantic.min.css')}}">
    <link rel="stylesheet" href="{{asset('alertify/css/alertify.min.css')}}">
    <link rel="stylesheet" href="{{asset('alertify/css/themes/semantic.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('DataTable/datatables.min.css')}}"> --}}
  
    @stack('styles')
    <style></style>
</head>
<body>
    <div id="app">

        @auth
        <div class="ui pointing menu  fixed">
            <a href="{{route('home.index')}}" class="item popup" data-content="">
                <img src="https://pbs.twimg.com/profile_images/1248592527705305088/R-_o1_GO.jpg" alt="" class="img-fluid" style="width:50px;">
            </a>
        
            <div class="right menu">
                <a href="{{route('home.index')}}" class="item popup homeuser"><i class="icon home large" ></i></a>
                @if (Auth::user()->group->admin == 1) 
                    <a href="{{route('users.index')}}" class="item popup usuarios"><i class="icon key large" data-content="Usuários"></i></a>
                @endif
                <a href="{{route('friends.index')}}" class="item popup amigos"><i class="icon users large" data-content="Amigos"></i></a>
                <a href="{{route('user.profile')}}" class="item popup profile"><i class="icon user large" data-content="Seu Perfil"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
               
                <a onclick="document.getElementById('logout-form').submit();" class="item popup sair"><i class="icon sign-out large" data-content="Sair"></i></a>
                
               
            </div>
           
        </div>
        <div style="text-align:right;margin-right:20px;margin-bottom:10px;">
            Olá,<strong> {{Auth::user()->name}}</strong> você está logado.
        </div>
        @endauth
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}
        
            <main style="margin-top:100px;">
                @yield('content')
            </main>  
         
       
    </div>
  
    <script src="{{asset('js/app.js')}}" ></script>
    <script src="{{asset('semantic-ui/semantic.min.js')}}" defer></script>
    <script src="{{asset('js/global.js')}}"></script>
    <script src="{{asset('alertify/alertify.min.js')}}"></script>
    {{-- <script src="{{asset('DataTable/datatables.min.js')}}"></script> --}}
    
    
    <script>
        alertify.defaults.transition = "zoom";
        alertify.defaults.theme.ok = "ui positive button";
        alertify.defaults.theme.cancel = "ui black button";
        $( document ).ready(function() {
            // $(".").popup({
            //     position : 'top center',
            // });
            $('.homeuser')
            .popup({
                position : 'top center',
                content  : 'Home'
            })
            $('.usuarios')
            .popup({
                position : 'top center',
                content  : '[ Somente Administradores ]'
            })
            $('.amigos')
            .popup({
                position : 'top center',
                content  : 'Amigos'
            })
            $('.profile')
            .popup({
                position : 'top center',
                content  : 'Seu Profile'
            })
            $('.sair')
            .popup({
                position : 'top center',
                content  : 'Sair'
            })
            ;
        });
       
        
    </script>
    @stack('scripts')
</body>
</html>
