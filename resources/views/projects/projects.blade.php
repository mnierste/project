@extends('layouts.layouts')

@section('title', 'Max Nierste Projects')

@section('content')

<div class="jumbotron text-center coverImage">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 style="font-size:60px;color:white;text-shadow: 4px 4px black;">
          <strong>PROJECTS</strong>
          <span><a href="{{ url('https://github.com/mnierste/')}}"
            target="_blank" class="fa fa1 fa-github github"></a>
          </span>
        </h1>
      </div>

    </div>
  </div>
</div>

<!-- Projects -->
<div class="container">
  <div class="row">
    <div class="row text-center">
      <div class="col-md-4">
      <!--project 1-->
        <div class="card1 p-t-sm">
          <div class="projectpPlaceholder5">
            <img class="card-img-top responsive"
            src="{{ asset('/images/contacts.png') }}" alt="contacts crud">
          </div>
          <div class="card-body">
            <h5 class="card-title">Contacts Crud</h5>
            <p class="card-text">MVC OOP CRUD w/ Auth for contacts - <strong style="color:red;">log into demo user</strong> to add individual or mass add contacts via csv file.</p>
            <a href="{{ url('/contacts') }}" class="btn btn-primary">View Contacts</a>
          </div>
        </div>

      </div>
      <div class="col-md-4">
      <!-- project 2-->
        <div class="card1 p-t-sm">
          <div class="projectpPlaceholder7">
            <img class="card-img-top responsive"
            src="{{ asset('/images/APIproject.png') }}" alt="Movie finder app">
          </div>
          <div class="card-body">
            <h5 class="card-title">Api Movie Finder /Adder</h5>
            <p class="card-text">API project w/ Guzzle as a dependency using Composer to get and push data with external APIs OMDB and Beeceptor</p>
            <a href="{{ url('/apipage') }}" class="btn btn-primary">View API Project</a>
          </div>
        </div>


      </div>
      <div class="col-md-4">
        <!-- project 3-->
        <div class="card1 p-t-sm">
          <div class="projectpPlaceholder3">
            <img class="card-img-top responsive"
            src="{{ asset('/images/dataproject.png') }}" alt="data project app">
          </div>
          <div class="card-body">
            <h5 class="card-title">Data Dashboard</h5>
            <p class="card-text">Display '19-20 sales data in a dashboard using Mockaroo</p>
            <a href="{{ url('/dataproject') }}" class="btn btn-primary">View Data Project</a>
          </div>
        </div>
      </div>

    </div>
  </div><!-- row -->
  <div class="row text-center">
    <div class="col-md-4">
      <!-- project 4-->
      <div class="card1 p-t-sm">
        <div class="projectpPlaceholder6">
          <img class="card-img-top responsive"
          src="{{ asset('/images/landingpage.png') }}" alt="landingpage">
        </div>
        <div class="card-body">
          <h5 class="card-title">Landing Page</h5>
          <p class="card-text">Basic Landing page with different css border styles</p>
          <a href="{{ url('/landingpage') }}" class="btn btn-primary">View Landing Page</a>
        </div>
      </div>

    </div>

    <div class="col-md-4">
      <div class="card1 p-t-sm">
        <div class="projectpPlaceholder">
          <img class="card-img-top responsive"
          src="{{ asset('/images/PizzaProjectLogo.png') }}" alt="pizza place app">
        </div>
        <div class="card-body">
          <h5 class="card-title">Pizza Place</h5>
          <p class="card-text">
            MVC OOP CRUD app for Pizzas with real time JS pizza builder
          </p>
          <a href="{{ url('/pizzas') }}" class="btn btn-primary">View Pizza Place</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card1 p-t-sm">
        <div class="projectpPlaceholder8">
          <img class="card-img-top responsive"
          src="{{ asset('/images/popup.png') }}" alt="Modal Page">
        </div>
        <div class="card-body">
          <h5 class="card-title">Modal Madness</h5>
          <p class="card-text">Pop up Modal Examples</p>
          <a href="{{ url('/popups') }}" class="btn btn-primary">View Popups Page</a>
        </div>
      </div>

    </div>
  </div>

  <div class="row text-center">
    <div class="col-md-4">
      <!-- project 4-->

      <div class="card1 p-t-sm">
        <div class="projectpPlaceholder4" style="padding-top:60px;">
          <i class="card-img-top responsive devicon-vuejs-plain-wordmark"
          style="font-size:100px;color:#000;"></i>
        </div>
        <div class="card-body">
          <h5 class="card-title">Vue Js Examples</h5>
          <p class="card-text"> Simple component examples in Vue js</p>
          <a href="{{ url('/demos/tasks') }}" class="btn btn-primary">View the Vue</a>
        </div>
      </div>

    </div>

    <div class="col-md-4">
      <div class="card1 p-t-sm">
        <div class="projectpPlaceholder2">
          <img class="card-img-top responsive"
          src="{{ asset('/images/foodfinder.png') }}" alt="food finder">
        </div>
        <div class="card-body">
          <h5 class="card-title">Food Finder</h5>
          <p class="card-text">
            API search & Map markers display for food near you.
          </p>
          <a href="{{ url('/foodfinder') }}" class="btn btn-primary">View Food Finder</a>
        </div>
      </div>

    </div>

    <div class="col-md-4">
      <div class="card1 p-t-sm">
        <div class="projectpPlaceholder9">
          <img class="card-img-top responsive"
          src="{{ asset('/images/Pokemon.png') }}" alt="food finder">
        </div>
        <div class="card-body">
          <h5 class="card-title">Pokemon Api</h5>
          <p class="card-text">
            Pokemon api for Tito
          </p>
          <a href="{{ url('/pokemonSearch') }}" class="btn btn-primary">View Food Finder</a>
        </div>
      </div>

    </div>


  </div>

</div>

@endsection
