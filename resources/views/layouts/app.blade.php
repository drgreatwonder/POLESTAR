<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PoleStar') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

         <script>

            @if(Session::has('success'))

            toastr.success('Success messages');

            //    toastr.success('{{ Session::get('success') }}')

           @endif
        </script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/welcome') }}">
                    <h3>{{ config('app.name', 'PoleStar') }}</h3>
                </a>
                {{-- <h3>PoleStar</h3> --}}

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

        <main class="py-4">


            <div class="container">

                <div class="row">

                    <div class="col-md-4">

                        <a href="{{ route('conversations.create') }}" class="form-control btn btn-primary my-4">Create a New Conversation
                        </a>

                        <div class="card mb-3 p-2">

                             <div class="card-body">

                                    <ul class="list-group">

                                        <div class="list-group-item">

                                            <a href="/platforms">Home</a>
                                        </div>

                                        <div class="list-group-item">

                                                <a href="/platforms?filter=me">My Conversations</a>
                                            </div>

                                            <div class="list-group-item">

                                                    <a href="/platforms?filter=solved">Concluded Conversations</a>
                                                </div>

                                                <div class="list-group-item">

                                                        <a href="/platforms?filter=unsolved">Open Conversations</a>
                                                    </div>
                                    </ul>
                                </div>
                        </div>

                        <div class="card mt-4">

                                <div class="card-header text-center">PlatForms</div>

                            <div class="card-body pt-2 py-4">

                                <ul class="list-group">

                                    @foreach ($medium as $media)

                                    <li class="list-group-item">
                                        {{-- {{ $media->title }} to echo out channel title --}}

                                        <a href="{{ route('medium', ['slug' => $media->slug]) }}">{{ $media->title }}</a>
                                    </li>

                                    @endforeach

                                </ul>

                            </div>
                        </div>


                    </div> {{-- col-md-4 --}}


                    <div class="col-md-8 my-3">
                        @yield('content')
                    </div>

                </div> {{-- row --}}

            </div> {{-- container --}}

        </main>

    </div>
</body>
</html>
