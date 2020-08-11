@extends('layouts.layouts')
@section('content')


      <div class="content">


          <div class="aboutTitle titlepizza m-b-sm pizzacolor">
              <div class="col-12">
                <div class="">
                  <img class="pizzalogolittle float-left" src="{{ asset('/images/PizzaProjectLogo.png') }}">
                </div>
                <div class="col-12">
                  <div style="text-align:center;padding-right:80px;">Create a Pizza</div>
                </div>
              </div>

          </div>


          <div class="container p-t-md p-b-md sectionBackgroundGray aboutTitle">

            <form action="{{ url('/pizzas') }}" method="POST" class="align-left p-t-sm">
              @csrf
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                      <label for="name">First Name</label>
                      <input class="form-control" id="firstname" name="firstname" placeholder="First Name">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                      <label for="name">Last Name</label>
                      <input class="form-control" id="firstname" name="lastname" placeholder="Last Name">
                  </div>
                </div>
              </div><!--end row-->
              <div class="row">
                <div class="col-4 p-b-sm">
                  <div class="form-group">
                      <label for="crust">Crust</label>
                      <select class="form-control" id="crust" name="crust" >

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
                              <input type="checkbox" name="toppings[]" value="{{ $toppings[$i] }}"> {{ $toppings[$i] }}</input>
                            </div>
                        @endfor


                      </div><!--end row-->

                      </fieldset>
                  </div>
                </div>
              </div><!--end row -->
              <div class=" p-b-sm">
                <button type="submit" value="OrderPizza" class="btn btn-success btn-block">Order</button>
              </div>
            </form>
            <div class="row p-b-sm">
              <div class="col-md-12">
                <a href="{{ url('/pizzas') }}" class="back"><button class="btn btn-danger" > Cancel</button></a>
              </div>
            </div>
          </div>



      </div>

@endsection
