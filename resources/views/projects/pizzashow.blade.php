@extends('layouts.layouts')
@section('content')


<div class="container pizza-details">
  <div class="row">
    <div class="col-md-12">
      <h1>Order for {{ $pizza->name }}</h1>

      <table class="table table-bordered">
        <thead>
          <th>Type</th>
          <th>Base</th>
          <th>Active</th>
          <th>Toppings</th>
        </thead>
        <tbody>
          <tr>
            <td>{{ $pizza->type }}</td>
            <td>{{ $pizza->base }}</td>
            <td>{{ $pizza->active }}</td>
            <td>
              <ul class="form-group">
                @foreach($pizza->toppings as $topping)
                  <li>{{ $topping }}</li>
                @endforeach

              </ul>
            </td>
          </tr>


        </tbody>
      </table>


    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-4">
      <a href="{{ url('/pizzas') }}" class="back"><button class="btn btn-primary" >Back to All Pizzas</button></a>
    </div>
    <div class="col-md-4">
      <form action="{{ url('/pizzas/'. $pizza->id) }}" method="POST">

        @csrf

        @method('PUT')
        <button class="btn btn-warning" >Inactivate Order</button>
      </form>
    </div>
    <div class="col-md-4">

      <form action="{{ url('/pizzas/'.$pizza->id) }}" method="POST">

        @csrf

        @method('DELETE')
        <button class="btn btn-danger" >Delete Order</button>
      </form>
      <!-- end delete -->
    </div>
  </div>
</div>

@endsection
