@extends('layouts.layouts')

@section('title', 'Mnierste Create Pizza')

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

  <div class="row">
    <div class="col-4">
      <img class="pizzaMaker" id="crust" style="width:100%;" src="{{ asset('/images/crust.png') }}">
      <img class="pizzaMaker hide pizzaMakerSauce" id="sauceImage" style="width:90%;" src="{{ asset('/images/sauce.png') }}">
      <img class="pizzaMaker hide pizzaMakerCheese" id="cheeseImage" style="width:95%;" src="{{ asset('/images/cheese.png') }}">
      <img class="pizzaMaker hide" id="pepperoniImage" style="width:100%;" src="{{ asset('/images/pepperoni.png') }}">
      <img class="pizzaMaker hide" id="meatballImage" style="width:100%;" src="{{ asset('/images/meat.png') }}">
      <img class="pizzaMaker hide" id="veggiesImage" style="width:100%;" src="{{ asset('/images/veggies.png') }}">
      <img class="pizzaMaker hide" id="tomatoImage" style="width:100%;" src="{{ asset('/images/tomato.png') }}">
      <img class="pizzaMaker hide" id="chickenImage" style="width:100%;" src="{{ asset('/images/chicken.png') }}">

    </div>
    <div class="col-8">
      <div class="container p-t-md p-b-md sectionBackgroundGray aboutTitle">

        <form action="{{ url('/pizzas') }}" method="POST" class="align-left p-t-sm">
          @csrf
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                  <label for="firstname">First Name <span style="color:red;">*</span></label>
                  <input required class="form-control" id="firstname" name="firstname" placeholder="First Name">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                  <label for="lastname">Last Name <span style="color:red;">*</span></label>
                  <input required class="form-control" id="lastname" name="lastname" placeholder="Last Name">
              </div>
            </div>
          </div><!--end row-->
          <div class="row">
            <div class="col-4 p-b-sm">
              <div class="form-group">
                  <label for="crust">Crust</label>
                  <select class="form-control" id="crust" name="crust" >
                    <option selected disabled>Select Crust</option>
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
                  <select class="form-control" id="sauce" name="sauce" onchange="pizzaSauceShow()">
                    <option selected disabled>Select Sauce</option>
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
                  <select class="form-control" id="cheese" name="cheese" onchange="pizzaCheeseShow()" >
                    <option selected disabled>Select Cheese</option>
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

                    @php
                    $Meat = array("Meatball", "Beef", "Pork", "Italian Sausage", "Human");
                    $Veg = array("Onions", "Red Onions", "Olives", "Bell Peppers", "Jalapeno",
                    "Spinach", "Mushrooms", "Banana Peppers", "Pineapple");
                    $Tomato = array("Bacon", "Ham", "Roma Tomatoes", "Sundried Tomatoes");
                    $Chicken = array("Chicken", "Buffalo Chicken", "Gouda", "Feta", "Riccota");

                    @endphp

                    <div class="row">
                    @for($i=0;$i< count($toppings);$i++)


                      @if($i % 6 == 0)
                      </div>
                      <div class="row">

                      @endif
                        <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                          @if ($toppings[$i] == 'Pepperoni')
                            <input type="checkbox" onclick="pizzaPepperoniShow()" name="toppings[]" value="{{ $toppings[$i] }}"> {{ $toppings[$i] }}</input>
                          @elseif(in_array($toppings[$i], $Meat))
                            <input type="checkbox" onclick="pizzaMeatShow()" name="toppings[]" value="{{ $toppings[$i] }}"> {{ $toppings[$i] }}</input>
                          @elseif(in_array($toppings[$i], $Veg))
                            <input type="checkbox" onclick="pizzaVeggiesShow()" name="toppings[]" value="{{ $toppings[$i] }}"> {{ $toppings[$i] }}</input>
                          @elseif(in_array($toppings[$i], $Tomato))
                            <input type="checkbox" onclick="pizzaTomatoShow()" name="toppings[]" value="{{ $toppings[$i] }}"> {{ $toppings[$i] }}</input>
                          @elseif(in_array($toppings[$i], $Chicken))
                            <input type="checkbox" onclick="pizzaChickenShow()" name="toppings[]" value="{{ $toppings[$i] }}"> {{ $toppings[$i] }}</input>

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
  </div>
</div>

@endsection

@section('scripts')
  <script>

  function pizzaSauceShow() {
    //get id for onchange event
    var sauce = document.getElementById("sauce");
    //get style of sauce
    var sauceselected = sauce.options[sauce.selectedIndex].value;
    //get image
    var image = document.getElementById("sauceImage");
    //logic to show sauce
    if(sauceselected != 'None'){
      image.classList.remove("hide");
    }else{
      image.classList.add("hide");
    };
  };

  function pizzaCheeseShow() {
    //get id for onchange event
    var cheese = document.getElementById("cheese");
    //get style of cheese
    var cheeseselected = cheese.options[cheese.selectedIndex].value;
    //get image
    var image = document.getElementById("cheeseImage");
    //logic to show sauce
    if(cheeseselected != 'None'){
      image.classList.remove("hide");
    }else{
      image.classList.add("hide");
    };
  };

  function pizzaPepperoniShow() {
    var image = document.getElementById("pepperoniImage");
    image.classList.toggle("hide");
  }
  function pizzaMeatShow() {
    var image = document.getElementById("meatballImage");
    image.classList.toggle("hide");
  }

  function pizzaTomatoShow() {
    var image = document.getElementById("tomatoImage");
    image.classList.toggle("hide");
  }

  function pizzaVeggiesShow() {
    var image = document.getElementById("veggiesImage");
    image.classList.toggle("hide");
  }

  function pizzaChickenShow() {
    var image = document.getElementById("chickenImage");
    image.classList.toggle("hide");
  }

  </script>
@endsection
