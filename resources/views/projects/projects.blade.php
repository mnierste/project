@extends('layouts.layouts')
@section('content')


  <div class="jumbotron text-center coverImage">
    <div class="container">
      <a href="/" class="lang-logo">
        <img src="{{ asset('/images/Max.jpg') }}">
      </a>
      <h1>Welcome to my website</h1>
      <p>My Name is Max Nierste and I'm a full-stack developer</p>

    </div>
  </div>

  <!-- Projects -->
  <div class="container">
    <div class="row">

      <div class="col-md-12 text-center">
        <h3 class="m-b-md">Projects</h3>
        <hr>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
        <!--project 1-->
          <div class="card1 p-t-sm">
            <img class="card-img-top projectpPlaceholder responsive" src="{{ asset('/images/maxproject1.jpeg') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Pizza Project</h5>
              <p class="card-text">CRUD app about Pizzas - Log in with the test account to see orders</p>
              <a href="{{ url('/pizzas') }}" class="btn btn-primary">Pizza Place</a>
            </div>
          </div>

        </div>
        <div class="col-md-4">
        <!-- project 2-->
          <div class="card1 p-t-sm">
            <img class="card-img-top projectpPlaceholder responsive" src="{{ asset('/images/geolocation.png') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Food Finder Project</h5>
              <p class="card-text">API project to provide basic map location, weather, and restaurant information near you</p>
              <a href="{{ url('/foodfinder') }}" class="btn btn-primary">Food Finder</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <!-- project 3-->
          <div class="card1 p-t-sm">
            <img class="card-img-top projectpPlaceholder responsive" src="{{ asset('/images/crud.png') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Data Project</h5>
              <p class="card-text"> Project to displayed data like a dashboard</p>
              <a href="{{ url('/geocode') }}" class="btn btn-primary">Data Project</a>
            </div>
          </div>
        </div>
      </div>
    </div><!-- row -->
  </div>


@endsection
