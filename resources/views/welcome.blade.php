@php
  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){ $protocol = "https://".$_SERVER['HTTP_HOST']; } else{ $protocol='http://'.$_SERVER['HTTP_HOST']; }
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Max Nierste Portfolio</title>
        <link rel="shortcut icon" href="https://maxnierste.herokuapp.com/images/favicon-16x16.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!--include custom css (public/css/main.css)-->
        <!--<link rel="stylesheet" type="text/css" href="http://localhost:8888/project/public/css/bubbles.css" >-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bubbles.css') }}" >-->
        <!-- Styles -->
        <style>

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
        .btn {
          display: inline-block;
          font-weight: 400;
          color: #212529;
          text-align: center;
          vertical-align: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
          background-color: transparent;
          border: 1px solid transparent;
          padding: .375rem .75rem;
          font-size: 1rem;
          line-height: 1.5;
          border-radius: .25rem;
          transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        .btn-grad{
          position: relative;
          color: #fff;
          background-image: linear-gradient(360deg, #6303B1, #ff0099);
          border-color: #fff;
          z-index: 0;
        }

        .m-b-md {
          margin-bottom: 30px;
        }

        .m-b-sm {
          margin-bottom: 15px;
        }
        </style>
    </head>
    <body id="bubbleArea" class="background-wrap">

      <div class="flex-center position-ref full-height" style="z-index:4;">
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

              <div class="links m-b-md">
                <a href="{{ url('/about') }}">About Me</a>
                <a href="{{ url('/projects') }}">Projects</a>
                <a href="{{ url('/contactme') }}">Contact</a>
              </div>
              <div class="row">
                <div class="col-12">
                  <button onclick="bubbles()" class="btn btn-grad">Create Bubble</button>
                </div>
              </div>
          </div>

        </div>

      <script>

      //make a bubble

      function bubbles(){
        var bubble = document.createElement('div');
        //make it look like bubble css
        bubble.className = "bubble";
        //add animation class
        var classNum = randomInteger(1, 4);
        bubble.classList.add("x" + classNum);

        if( classNum == 1 ){
          var speed = randomInteger(20, 35);
          var side = randomInteger(2, 3);
          var size = randomInteger(5, 10) / 10;
          var placement = randomInteger(-5, 95);
          var placementV = randomInteger(70, 110);
        }else if( classNum == 2 ){
          var speed = randomInteger(30, 40);
          var side = randomInteger(4, 6);
          var size = randomInteger(5, 10) / 10;
          var placement = randomInteger(-5, 95);
          var placementV = randomInteger(70, 110);
        }else if( classNum == 3 ){
          var speed = randomInteger(25, 35);
          var side = randomInteger(2, 6);
          var size = randomInteger(5, 10) / 10;
          var placement = randomInteger(-5, 95);
          var placementV = randomInteger(70, 110);
        }else {
          var speed = randomInteger(35, 40);
          var side = randomInteger(1, 2);
          var size = randomInteger(5, 10) / 10;
          var placement = randomInteger(-5, 95);
          var placementV = randomInteger(50, 60);
        }

        bubble.style.setProperty('--animation-time', speed +'s');
        bubble.style.setProperty('--animation-size', size);
        bubble.style.setProperty('--animation-left', placement +'%');
        bubble.style.setProperty('--animation-top', placementV +'vh');


        document.getElementById("bubbleArea").appendChild(bubble);
      }

      //random speed for bubbles
      function randomInteger(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
      }

      setInterval(bubbles(), 300);
      setInterval(bubbles(), 600);
      setInterval(bubbles(), 900);
      setInterval(bubbles(), 1200);
      </script>

    </body>
</html>
