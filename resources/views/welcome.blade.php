@php
  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){ $protocol = "https://".$_SERVER['HTTP_HOST']; } else{ $protocol='http://'.$_SERVER['HTTP_HOST']; }
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Max Nierste Portfolio</title>
<link rel="shortcut icon" href="{{ asset('images/favicon-16x16.png') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
        .coverImage{
          background-image:url('{{ asset('/images/space.jpeg') }}');
          background-size:     cover;
          background-repeat:   no-repeat;
          background-position: center center;
        }
        html,
        body {
          background-color: #fff;
          color: #636b6f;
          font-family: "Nunito", sans-serif;
          font-weight: 200;
          height: 100vh;
          margin: 0;
        }

        .full-height {
          height: 100vh;
        }

        .flex-center {
          align-items: center;
          display: flex;
          justify-content: center;
        }

        .position-ref {
          position: relative;
        }

        .top-right {
          position: absolute;
          right: 10px;
          top: 18px;
        }

        .content {
          text-align: center;
        }

        .title {
          font-size: 84px;
        }
        .links > a {
          color: #636b6f;
          padding: 0 25px;
          font-size: 13px;
          font-weight: 600;
          letter-spacing: 0.1rem;
          text-decoration: none;
          text-transform: uppercase;
        }
        .m-t-md {
          margin-top: 30px;
        }

        .m-t-sm {
          margin-top: 15px;
        }

        .p-t-md {
          padding-top: 30px;
        }

        .p-t-sm {
          padding-top: 15px;
        }

        .p-b-md {
          padding-bottom: 30px;
        }

        .p-b-sm {
          padding-bottom: 15px;
        }

        .m-b-md {
          margin-bottom: 30px;
        }

        .m-b-sm {
          margin-bottom: 15px;
        }

        .m-b-img {
          margin-bottom: 5px;
        }

        .m-t-footer {
          margin-top: 120px;
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
