<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PoleStar</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>

    <div class="container">

        <nav class="navbar navbar-light bg-light py-3 pb-5">
            <h1>PoleStar</h1>
            <form class="form-inline">
                <div class="input-group">
                    <div class="input-group-prepend">
                            <button><span class="input-group m-2" id="inputGroupPrepend2"><i class="fa fa-search"></i></span></button>
                    </div>
                    <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Search" aria-describedby="inputGroupPrepend2" required>
                </div>
            </form>
        </nav>


        <nav class="navbar navbar-expand-lg navbar-light bg-primary my-5">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                  <ul class="navbar-nav w-100 nav-justified">
                        @if (Route::has('login'))
                        @auth
                    <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">HOME<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          PLATFORMS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('platforms') }}">Faith</a>
                          <a class="dropdown-item" href="{{ route('platforms') }}">Fashion</a>
                          <a class="dropdown-item" href="{{ route('platforms') }}">Life Issues</a>
                          <a class="dropdown-item" href="{{ route('platforms') }}">Programming</a>
                          <a class="dropdown-item" href="{{ route('platforms') }}">Sports</a>
                          <a class="dropdown-item" href="{{ route('platforms') }}">Travels & Tours</a>
                          <a class="dropdown-item" href="{{ route('platforms') }}">Trending</a>
                        </div>


                        <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                FUN & GAMES
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="">Memory Card Game</a>
                                      <a class="dropdown-item" href="{{ route('login') }}">Interactive Tic-Tac-Toe</a>
                              </div>

                      </li>


                      <li class="nav-item">
                        <a class="nav-link" href="#" aria-disabled="true">ABOUT US</a>
                      </li>

                      <li class="nav-item">
                              <a class="nav-link" href="#" aria-disabled="true">CONTACT US</a>
                            </li>

                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" aria-disabled="true">DASHBOARD</a>
                          </li>

                        <li class="nav-item">
                                <a class="nav-link" href="#" aria-disabled="true">LOGOUT</a>
                        </li>

                    {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>
                    </li> --}}


                    @else

                    <li class="nav-item links">
                      <a class="nav-link" href="{{ url('/') }}">HOME<span class="sr-only">(current)</span></a>
                    </li>



                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        PLATFORMS
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('login') }}">Faith</a>
                        <a class="dropdown-item" href="{{ route('login') }}">Fashion</a>
                        <a class="dropdown-item" href="{{ route('login') }}">Life Issues</a>
                        <a class="dropdown-item" href="{{ route('login') }}">Programming</a>
                        <a class="dropdown-item" href="{{ route('login') }}">Sports</a>
                        <a class="dropdown-item" href="{{ route('login') }}">Travels & Tours</a>
                        <a class="dropdown-item" href="{{ route('login') }}">Trending</a>
                      </div>


                      <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              FUN & GAMES
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="">Memory Card Game</a>
                                    <a class="dropdown-item" href="{{ route('login') }}">Interactive Tic-Tac-Toe</a>
                            </div>

                    </li>


                    <li class="nav-item">
                      <a class="nav-link" href="#" aria-disabled="true">ABOUT US</a>
                    </li>

                    <li class="nav-item">
                            <a class="nav-link" href="#" aria-disabled="true">CONTACT US</a>
                          </li>

                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}" aria-disabled="true">LOGIN</a>
                          </li>

                    @if (Route::has('register'))
                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}" aria-disabled="true">REGISTER</a>
                          </li>
                          @endif
                @endauth

                  </ul>
                  @endif

                </div>
              </nav>

</body>

</html>
