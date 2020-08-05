<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Max Nierste</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- fa -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

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

        .mapImage{
            background-image:url('{{ asset('/images/map.jpeg') }}');
            background-size:     cover;
            background-repeat:   no-repeat;
            background-position: center center;
        }
        </style>
    </head>
    <body class="">
      <div class="flex-center position-ref">
          @if (Route::has('login'))
              <div class="top-right links">
                  @auth
                      <a href="{{ url('/home') }}">Dashboard</a>
                  @else
                      <a href="{{ route('login') }}">Login</a>

                      @if (Route::has('register'))
                          <a href="{{ route('register') }}">Register</a>
                      @endif
                  @endauth
              </div>
          @endif

          <div class="content p-t-sm p-b-sm">
              <div class="links">
                  <a href="{{ url('/') }}">Home</a>
                  <a href="{{ url('/about') }}">About</a>
                  <a href="{{ url('/projects') }}">Projects</a>
                  <a href="{{ url('/contactme') }}">Contact</a>

              </div>
          </div>
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
