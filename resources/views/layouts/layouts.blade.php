<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- fa -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

        <!-- devicons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/konpa/devicon@master/devicon.min.css">


        @yield('css')

        <!--include custom css (public/css/main.css)-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" >
        <!-- Styles -->
        <style>
        .coverImage{
            background-image:url('{{ asset('/images/space.jpeg') }}');
            background-size:     cover;
            background-repeat:   no-repeat;
            background-position: center center;
        }


        </style>
    </head>
    <body class="">

      <div class="position-ref">

          <nav class="navbar navbar-expand-md navbar-light ">

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler float-left" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
              <ul class="navbar-nav">


                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/about') }}">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/projects') }}">Projects</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/contactme') }}">Contact</a>
                </li>
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
                    <li class="nav-item">
                      <a id="navbarDropdown" class="dropdown-toggle nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ url('/home') }}" >Dashboard</a>
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
          </nav>


      </div>


      @yield('content')
      <footer class="sectionBackgroundWhite p-t-sm">
        <p class="flex-center ">Built using MAMP (laravel), Heroku, gitHub, Atom</p>
      </footer>
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

      @yield('scripts')
    </body>

  </html>
