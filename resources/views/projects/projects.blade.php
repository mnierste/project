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
        <h3 class="aboutTitle m-b-md"></span> Projects</h3>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
        <!--project 1-->
          <div class="card1 p-t-sm">
            <img class="card-img-top projectpPlaceholder responsive" src="{{ asset('/images/maxproject1.jpeg') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Pizza Project</h5>
              <p class="card-text">Quick project for Blade basics in a pizza app site </p>
              <a href="{{ url('/pizzas') }}" class="btn btn-primary">Pizza Place</a>
            </div>
          </div>

        </div>
        <div class="col-md-4">
        <!-- project 2-->
          <div class="card1 p-t-sm">
            <img class="card-img-top projectpPlaceholder responsive" src="{{ asset('/images/geolocation.png') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Geo Location Project</h5>
              <p class="card-text">API project to provide basic map location, tax, and weather details for a searched address</p>
              <a href="{{ url('/geocode') }}" class="btn btn-primary">Address look up project</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <!-- project 3-->
          <div class="card1 p-t-sm">
            <img class="card-img-top projectpPlaceholder responsive" src="{{ asset('/images/crud.png') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Crud App</h5>
              <p class="card-text"> Starting as basic crud app to add contacts. also with oauth login /register pages</p>
              <a href="{{ url('/contacts') }}" class="btn btn-primary">CRUD</a>
            </div>
          </div>
        </div>
      </div>
    </div><!-- row -->
  </div>


@endsection
