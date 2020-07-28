@extends('layouts.layouts')
@section('content')


      <div class="content">


          <div class="titlepizza m-b-sm">
              Create a Pizza
          </div>


          <div class="container p-t-md p-b-md sectionBackgroundGray aboutTitle">

            <form action="{{ url('/pizzas') }}" method="POST">
              @csrf
              <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" id="name" name="name" placeholder="Name">
                </div>
              </div>
              <div class="col-md-12 p-b-sm">
                <div class="form-group">
                    <label for="type">Type</label>
                    <select class="form-control" id="type" name="type" >

                      <option value="margarita">Margarita</option>
                      <option value="hawaiian">Hawaiian</option>
                      <option value="veggie">Veggie</option>

                    </select>
                </div>
              </div>
              <div class="col-md-12 p-b-sm">
                <div class="form-group">
                    <label for="base">Base</label>
                    <select class="form-control" id="base" name="base" >

                      <option value="cheesecrust">Cheese Crust</option>
                      <option value="Vegan">Vegan</option>
                      <option value="StuffedCrust">Stuff Crust</option>

                    </select>
                </div>
              </div>
              <div class="col-md-12 p-b-sm">
                <div class="form-group">
                    <label for="toppings">Toppings</label>
                    <fieldset class="form-control" id="toppings" >

                      <input type="checkbox" name="toppings[]" value="mushrooms">Mushrooms</input>
                      <input type="checkbox" name="toppings[]" value="ham">Ham</input>
                      <input type="checkbox" name="toppings[]" value="pineapple">Pineapple</input>
                      <input type="checkbox" name="toppings[]" value="peppers">Peppers</input>
                      <input type="checkbox" name="toppings[]" value="extra cheese">Extra Cheese</input>


                    </fieldset>
                </div>
              </div>
              <div class="col-md-12 p-b-sm">
                <button type="submit" value="OrderPizza" class="btn btn-primary btn-block">Order</button>
              </div>
            </form>
            <div class="row">
              <div class="col-md-12">
                <a href="{{ url('/pizzas') }}" class="back"><button class="btn btn-danger" > Cancel</button></a>
              </div>
            </div>
          </div>



      </div>

@endsection
