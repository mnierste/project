@extends('layouts.layouts')

@section('title', 'Max Nierste Projects')

@section('content')


<div class="jumbotron text-center coverImage">
  <div class="container">

    <h1 style="font-size:60px;color:white;text-shadow: 4px 4px black;"><strong>PROJECTS</strong></h1>

  </div>
</div>

<!-- Projects -->
<div class="container">
  <div class="row">


    <div class="row text-center">
      <div class="col-md-3">
      <!--project 1-->
        <div class="card1 p-t-sm">
          <div class="projectpPlaceholder">
            <img class="card-img-top responsive" src="{{ asset('/images/PizzaProjectLogo.png') }}" alt="pizza place app">
          </div>
          <div class="card-body">
            <h5 class="card-title">Pizza Place</h5>
            <p class="card-text">CRUD for Pizzas - Log into the test account to see orders</p>
            <a href="{{ url('/pizzas') }}" class="btn btn-primary">Pizza Place</a>
          </div>
        </div>

      </div>
      <div class="col-md-3">
      <!-- project 2-->
        <div class="card1 p-t-sm">
          <div class="projectpPlaceholder2">
            <img class="card-img-top responsive" src="{{ asset('/images/foodfinder.png') }}" alt="food finder app">
          </div>
          <div class="card-body">
            <h5 class="card-title">Food Finder</h5>
            <p class="card-text">API project to provide basic map & restaurant information near you</p>
            <a href="{{ url('/foodfinder') }}" class="btn btn-primary">Food Finder</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <!-- project 3-->
        <div class="card1 p-t-sm">
          <div class="projectpPlaceholder3">
            <img class="card-img-top responsive" src="{{ asset('/images/dataproject.png') }}" alt="data project app">
          </div>
          <div class="card-body">
            <h5 class="card-title">Data Dashboard</h5>
            <p class="card-text">Display fake '19-20 sales data in a dashboard</p>
            <a href="{{ url('/dataproject') }}" class="btn btn-primary">Data Project</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <!-- project 3-->
        <div class="card1 p-t-sm">
          <div class="projectpPlaceholder4" style="padding-top:25%;">
            <img class="card-img-top responsive" src="{{ asset('/images/vuejs.png') }}" ></img>
          </div>
          <div class="card-body">
            <h5 class="card-title">Vue Js Examples</h5>
            <p class="card-text"> Simple examples in Vue js</p>
            <a href="{{ url('/demos/tasks') }}" class="btn btn-primary">View the Vue</a>
          </div>
        </div>
      </div>
    </div>
  </div><!-- row -->
</div>


@endsection
