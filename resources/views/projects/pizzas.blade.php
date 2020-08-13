@extends('layouts.layouts')

@section('title', 'Mnierste Pizza Project')

@section('content')


<div class="content p-b-md sectionBackgroundGrey">

    <div class="titlepizza aboutTitle m-b-sm pizzacolor";>
        Pizza Place Project
    </div>



    <div class="justify-content-center pizzalogoline">

      <span>
        <img class="pizzalogo" src="{{ asset('/images/PizzaProjectLogo.png') }}">
      </span>
    </div>

    @if ($message = Session::get('mssg'))
    <div class="alert alert-success alert-block">
     <button type="button" class="close" data-dismiss="alert">×</button>
       <p class="mssg">{{ session('mssg') }}</p>

    </div>
    @endif

    <div class="container ">
      <div class="col-12">
        <p class="aboutTitle">This is a CRUD app with pizzas. You can use the demo information
          to login and see the Orders page.</p>

        <p class="aboutTitle m-a-0">Dummy account: Test@testing.com </p>
        <p class="aboutTitle">Dummy password: Testingaccount123 </p>
      </div>
    </div>
    <div class="container justify-content-center">
      <div class="row">
        <div class="col-6">
          <form action="{{ url('/pizzas/create') }}" method="get">
            <button type="submit" class="btn btn-success"><h4>Order A Pizza</h4></button>
          </form>
        </div>
        <div class="col-6">
          <form action="{{ url('/pizzaorders') }}" method="get">
            <button type="submit" class="btn btn-primary"><h4>See Pizza Orders</h4></button>
          </form>
        </div>
      </div><!-- end row -->
    </div>




</div>
@endsection
