<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FutLinks') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- <script src="{{ asset('js/jquery.js') }}" defer></script> -->
    
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('stylesheet')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm pb-4 pt-3">
            <div class="container">
                <a class="navbar-brand " href="{{ url('/') }}">
                    <span class=" h1 text-success">FutLinks</span>
                </a>
            </div>

            <div class="my-navar-contol">
                @if(Auth::check())
                    <span class="my-navar-item">@if(Auth::user()->role==0)一般@else チーム管理者 @endif</span>
                    /
                    <span class="my-navar-item">{{Auth::user()->name}}</span>
                    /
                    <a href="#" id="logout" class="my-navar-item">ログアウト</a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;"> 
                        @csrf
                    </form>
                    <script>
                        document.getElementById('logout').addEventListener('click', function(event){
                        event.preventDefault();
                        document.getElementById('logout-form').submit();
                        });
                    </script>
                    @if(Auth::user()->role==0)
                    <div class="row mt-2">
                        <div class="col-5"></div>
                        <a class="my-navar-item " href="{{route('favorite')}}">お気に入り一覧</a>    
                    </div>
                    @endif        
                @else
                    <a class="my-navar-item " href="{{route('login')}}">ログイン</a>
                     /   
                    <a class="my-navar-item " href="{{route('register')}}">会員登録</a>   
                 @endif

            </div>
        </nav>
        @yield('content')
    </div>
    
    
</body>
</html>