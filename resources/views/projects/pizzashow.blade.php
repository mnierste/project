@extends('layouts.layouts')
@section('content')

<div class="aboutTitle titlepizza m-b-sm pizzacolor">
    <div class="col-12">
      <div class="">
        <img class="pizzalogolittle float-left" src="{{ asset('/images/PizzaProjectLogo.png') }}">
      </div>
      <div class="col-12">
        <div style="text-align:center;padding-right:80px;">
          Order for {{ $pizza->firstname }}
        </div>
      </div>
    </div>

</div>

<div class="container pizza-details">
  @if ($message = Session::get('mssg'))
  <div class="alert alert-success alert-block">
   <button type="button" class="close" data-dismiss="alert">×</button>
     <p class="mssg">{{ session('mssg') }}</p>

  </div>
  @endif

  <div class="row">
    <div class="col-md-12">


      <form action="{{ url('/pizzas/' . $pizza->id) }}" method="POST" class="align-left p-t-sm">
        @csrf
        <div class="row">
          <div class="col-6">
            <div class="form-group">
                <label for="name">First Name</label>
                <input class="form-control" id="firstname" name="firstname" value="{{ $pizza->firstname }}">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
                <label for="name">Last Name</label>
                <input class="form-control" id="firstname" name="lastname" value="{{ $pizza->lastname }}">
            </div>
          </div>
        </div><!--end row-->
        <div class="row">
          <div class="col-4 p-b-sm">
            <div class="form-group">
                <label for="crust">Crust</label>
                <select class="form-control" id="crust" name="crust" >
                  <option value="{{ $pizza->crust }}">{{ $pizza->crust }}</option>
                  <option value="Pan">Pan</option>
                  <option value="Thin">Thin</option>
                  <option value="Stuffedcrust">Stuffed</option>
                  <option value="Hand">Hand-Tossed</option>
                  <option value="Cheesetopped">Cheese Crust</option>

                </select>
            </div>
          </div>
          <div class="col-4 p-b-sm">
            <div class="form-group">
                <label for="sauce">Sauce</label>
                <select class="form-control" id="sauce" name="sauce" >
                  <option value="{{ $pizza->sauce }}">{{ $pizza->sauce }}</option>
                  <option value="Heavy">Heavy</option>
                  <option value="Medium">Medium</option>
                  <option value="Light">Light</option>
                  <option value="None">None</option>

                </select>
            </div>
          </div>
          <div class="col-4 p-b-sm">
            <div class="form-group">
                <label for="cheese">Cheese</label>
                <select class="form-control" id="cheese" name="cheese" >
                  <option value="{{ $pizza->cheese }}">{{ $pizza->cheese }}</option>
                  <option value="Extra">Extra</option>
                  <option value="Medium">Medium</option>
                  <option value="Light">Light</option>
                  <option value="None">None</option>

                </select>
            </div>
          </div>
        </div><!--end row-->
        <div class="row">
          <div class="col-md-12 p-b-sm">
            <div class="form-group">
                <label for="toppings">Toppings</label>
                <fieldset class="form-control" style="height:100%;" id="toppings" >

                  <div class="row">
                  @for($i=0;$i< count($toppings);$i++)

                    @if($i % 6 == 0)
                    </div>
                    <div class="row">

                    @endif
                      <div class="col-lg-2 col-md-4 col-sm-6 col-12">

                        @if(in_array($toppings[$i], $pizza->toppings))
                        <input checked type="checkbox" name="toppings[]" value="{{ $toppings[$i] }}"> {{ $toppings[$i] }}</input>

                        @else
                        <input type="checkbox" name="toppings[]" value="{{ $toppings[$i] }}"> {{ $toppings[$i] }}</input>

                        @endif

                      </div>
                  @endfor


                </div><!--end row-->

                </fieldset>
            </div>
          </div>
        </div><!--end row -->
        <div class=" p-b-sm">
          <button type="submit" value="OrderPizza" class="btn btn-success btn-block">Update Order</button>
        </div>
      </form>

    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-4">
      <a href="{{ url('/pizzas') }}" class="back"><button class="btn btn-primary btn-block"> Back to Orders</button></a>
    </div>
    <div class="col-md-4">
      <form action="{{ url('/pizzas/'. $pizza->id) }}" method="POST">

        @csrf

        @method('PUT')
        <button class="btn btn-warning btn-block" >Inactivate Order</button>
      </form>
    </div>
    <div class="col-md-4">

      <form action="{{ url('/pizzas/'.$pizza->id) }}" method="POST">

        @csrf

        @method('DELETE')
        <button class="btn btn-danger btn-block" >Delete Order</button>
      </form>
      <!-- end delete -->
    </div>
  </div>
</div>

@endsection
