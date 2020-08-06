@extends('layouts.layouts')
@section('content')


<div class="content p-b-md">

    <div class="titlepizza aboutTitle m-b-sm" style="background-color:red;">
        Pizza Place Orders
    </div>



    <div class="container" >
      <div class="row">
        <div class="col-md-12 ">
          <h3>Current Orders</h3>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">

          <table class="table table-bordered table-hover">
            <thead>
              <th class="text-center">#</th>
              <th class="text-center">Name</th>
              <th class="text-center">Pizza</th>
              <th class="text-center">Crust</th>
              <th class="text-center">Details</th>
            </thead>
            <tbody>
            @foreach($pizzas as $pizza)
              <tr>
                <td>
                  {{ $loop->index + 1}}
                </td>
                <td>
                  {{ $pizza->name }}
                </td>
                <td>
                  {{ $pizza->type }}
                </td>
                <td>
                  {{ $pizza->base }}
                </td>
                <td>
                  <a href="{{ url('/pizzas/' . $pizza->id) }}">Details</a>
                </td>
              </tr>
            @endforeach
          </table>
        </div>
      </div><!--row-->
    </div>
    <hr>

    <div class="container p-b-md">
      <h3>Inactive Orders</h3>
      <table class="table table-bordered table-hover">
        <thead>
          <th class="text-center">#</th>
          <th class="text-center">Name</th>
          <th class="text-center">Pizza</th>
          <th class="text-center">Crust</th>
          <th class="text-center">Details</th>
        </thead>
        <tbody>
        @foreach($inactivePizzas as $inactivePizza)
          <tr>
            <td>
              {{ $loop->index + 1}}
            </td>
            <td>
              {{ $inactivePizza->name }}
            </td>
            <td>
              {{ $inactivePizza->type }}
            </td>
            <td>
              {{ $inactivePizza->base }}
            </td>
            <td>
              <a href="{{ url('/pizzas/' . $inactivePizza->id) }}">Details</a>
            </td>
          </tr>
        @endforeach
      </table>
      <div class="row justify-content-center m-b-sm">
        <form action="{{ url('/pizzas/create') }}" method="get">
          <button type="submit" class="btn btn-success"><h4>Order A Pizza</h4></button>
        </form>
      </div>

    </div>
</div>
@endsection
