<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Max Nierste</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
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
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .m-b-sm {
                margin-bottom: 15px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
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
                    Pizza List Project

                </div>
                <div class="m-b-md">
                  Max Nierste Full-stack Developer
                </div>


                <div class="links">
                  <p> {{ $type }} - {{ $base }} - {{ $price }}</p>
                  @if($price > 15)
                    <p>this pizza is expensive</p>
                  @elseif($price < 5)
                    <p>this pizza is cheap</p>
                  @else
                    <p>Normally priced pizza</p>
                  @endif

                  @unless($base == 'stuffed crust')
                    <p>you dont have stuffed crust!</p>
                  @endunless

                  @php
                    $name = 'Shawn';
                    echo $name;
                  @endphp

                  <!-- @for($i=0; $i<5 ;$i++)
                    <p>the value is i: {{ $i }}</p>
                  @endfor -->


                  @for($i=0;$i< count($pizzas);$i++)
                    <p>{{ $pizzas[$i]['type'] }}</p>
                  @endfor

                  @foreach($pizzas as $pizza)
                    <div>
                      {{ $pizza['type'] }} -- {{ $pizza['base'] }}
                    </div>
                  @endforeach

<!-- if statement in loop -->
                  @foreach($pizzas as $pizza)
                    <div>
                      {{ $loop->index }} {{ $pizza['type'] }} -- {{ $pizza['base'] }}
                      @if($loop->first)
                        <span>first in the loop</span>

                      @endif
                      @if($loop->last)
                        <span>last in the loop</span>
                      @endif
                    </div>
                  @endforeach

                </div>
            </div>
        </div>
    </body>
</html>
