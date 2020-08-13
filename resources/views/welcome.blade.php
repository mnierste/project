@php
  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){ $protocol = "https://".$_SERVER['HTTP_HOST']; } else{ $protocol='http://'.$_SERVER['HTTP_HOST']; }
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Max Nierste Portfolio</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!--bootstrap-->
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

        <!--tables-->


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

      <div class="flex-center position-ref full-height">
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

          <div class="content">

              <div class="title m-b-sm">
                  Max Nierste
              </div>
              <div class="m-b-md">
                Full-stack Developer
              </div>

              <div class="links">
                <a href="{{ url('/about') }}">About Me</a>
                <a href="{{ url('/projects') }}">Projects</a>
                <a href="{{ url('/contactme') }}">Contact</a>
              </div>

          </div>

      </div>

    </body>
</html>
