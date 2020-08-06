@extends('layouts.layouts')
@section('content')


<div class="content p-b-md sectionBackgroundGrey">

    <div class="titlepizza aboutTitle m-b-sm" style="background-color:red;">
        Pizza Place Project
    </div>
    <div class="container ">
      <div class="col-12">
        <p class="aboutTitle">This is a CRUD app with pizzas. You can log in with the demo login
          to see the Orders page.</p>
          <br>
          <p class="aboutTitle m-a-0">Dummy account: Test@testing.com </p>
          <p class="aboutTitle">Dummy password: Testingaccount123 </p>
      </div>
    </div>
    <div class="container">
      <form action="{{ url('/pizzas/create') }}" method="get">
        <button type="submit" class="btn btn-success"><h4>Order A Pizza</h4></button>
      </form>
    </div>



    @if ($message = Session::get('mssg'))
    <div class="alert alert-success alert-block">
     <button type="button" class="close" data-dismiss="alert">×</button>
       <p class="mssg">{{ session('mssg') }}</p>

    </div>
    @endif
</div>
@endsection
