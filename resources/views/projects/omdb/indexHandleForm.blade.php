@extends('layouts.layouts')

@section('title', 'Max Nierste API response page')

@section('content')

  <div class="container">

    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            @if(isset($response->Poster))
              <img src="{{ $response->Poster }}" alt="{{ $response->Title }}" style="max-width:150px;max-height:100%;">
            @else
              <p>No Movie Poster</p>
            @endif
          </div>
          <div class="col-md-8 col-sm-12">
            @if($response->Response == True)
              <h2 style="padding-top:15%;"> {{ $response->Title }} </h2>
            @else
              <h2> No Title Found </h2>
            @endif

          </div>
        </div>
      </div>
      <div class="card-body">
        <ul>
          <!--cycle through other details-->
          @foreach($response as $key => $val)
            <!--Ratings is array cycle through-->

            @if($key == "Ratings")
              <li> <span style="font-weight:bold;">{{ $key }}</span></li>
              <ul>
              @foreach($val as $v)
                <li> {{ $v->Source }} : {{ $v->Value }} </li>
              @endforeach
              </ul>
            @elseif($key == "Poster" || $key == "Response")

            @else
              <li> <span style="font-weight:bold;">{{ $key }} </span>-> {{ $val }} </li>
            @endif
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endsection
