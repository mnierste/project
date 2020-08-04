@extends('layouts.layouts')

@section('css')

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

@endsection

@section('content')
<!--https://geodata.solutions/
geocoding.geo.census.gov
#leafletjs.com/
#mapbox
-->

<style>
  #mapid {
    height: 700px;
  }
</style>

<div class="mapImage p-t-md p-b-md " >
  <div class="container ">

    <div class="geoTitle flex-center title">
        Food Finder

    </div>
    <div class="geoTitle col-md-12 text-center p-b-md">
      <h1 class="font-weight-bold">Enter Address for Map, Tax, and Weather Information</h1>
    </div>

    <div class="row">
      <div class="col-md-12">

        <form class="form-signin" action="{{ url('/foodfindershow') }}" method="GET">
          @csrf
          <div class="form-group">
              <div class="row">
                <div class="col-md-12 ">
                  <input type="text" name="street" id="street" class="form-control" placeholder="Street" value="{{ $address['street']}}">
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-5 ">
                <input type="hidden" name="country" id="countryId" value="US"/>
                <label for="city" class="sr-only">City</label>
                <select name="city" class="cities order-alpha form-control" id="cityId" value="{{ $address['city'] }} ">
                    <option value="">Select City</option>
                </select>
              </div>
              <div class="col-md-3 ">
                <label for="state" class="sr-only">State</label>
                <select name="state" class="states order-alpha form-control" id="stateId" value=" {{ $address['state']}}">
                  <option value="">Select State</option>
                </select>
              </div>
              <div class="col-md-4 ">
                <label for="zip" class="sr-only">Zip</label>
                <input type="text" name="zip" id="zip" class="form-control" placeholder="Zip" value="{{ $address['zip'] }}">
              </div>
            </div><!-- end row -->

          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-block btn-lg btn-primary float-right" type="submit">Search for Food!</button>
                </div>
            </div>
          </div>

        </form>
      </div>
    </div><!-- row -->
  </div> <!-- container -->
</div> <!-- cover image -->


<div class="row">
  <div class="col-md-12">

    <div class="card-header text-center">

        <h1 class="aboutTitle" >
          Map
        </h1>

    </div>
    @php


    $Foods = JSON_decode($zomato->getBody(), true);

    @endphp
    <p><pre> {{print_r($Foods)}} </pre></p>

  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="col-md-12">
          {{ $Foods['location']['title'] }} {{$Foods['location']['city_name']  }}
        </div>
        <div class="col-md-12">
          <p>Resturants nearby: {{ count($Foods['popularity']['nearby_res']) }}
          <p>Top Options:</p>
          <ul>
            @foreach($Foods['popularity']['top_cuisines'] as $topchoice => $name)
              <li class="nav-pills">{{ $name }}</li>
            @endforeach

          </ul>
        </div>
      </div>
    </div><!--end col-12-->
  </div>
  <div clas="row">
    <div class="col-md-12">

      <h2> Nearby Resturants </h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">

    </div>
  </div>
</div><!--end container-->

<div class="map-section p-t-sm p-b-sm" >
  <div class="container">
    <div class="row ">
      <div class="col-md-4 p-a-0" style="margin:scroll;">
        @php
          $locations = array();
        @endphp


        @foreach($Foods['nearby_restaurants'] as $restaurant)


          @php
          $locations[$loop->index]['lat']=$restaurant["restaurant"]["location"]["latitude"];
          $locations[$loop->index]['long']=$restaurant["restaurant"]["location"]["longitude"];
          @endphp

          <div class="col-sm-12">

            <div class="card">
              <div class="card-header weather-card-header aboutTitle">
                <div class="row">
                  <div class="col-md-9 aboutTitle p-a-0">
                    <h5 class="m-a-0"><a class="aboutTitle" target="_blank" href="{{ $restaurant['restaurant']['url'] }}">{{ $restaurant['restaurant']['name'] }}</a></h5>
                    <p class="m-a-0">rating: {{ $restaurant['restaurant']['user_rating']['aggregate_rating'] }} / 5</p>

                  </div>


                  <div class="col-md-3">
                    <img style="max-height:50px;float:right;" src="{{ $restaurant['restaurant']['thumb'] }}" class="d-block" alt="...">
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 text-center p-a-0">

                    @if ($restaurant['restaurant']['has_online_delivery'] == 1)
                      <i class="fa fa-check" style="color:green"></i>
                    @else
                      <i class="fa fa-times" style="color:red"></i>
                    @endif
                    <span ><small>Delivery</small></span>
                  </div>
                  <div class="col-md-6 text-center p-a-0">
                    @if ($restaurant['restaurant']['has_online_delivery'] == 1)
                      <i class="fa fa-check" style="color:green"></i>
                    @else
                      <i class="fa fa-times" style="color:red"></i>
                    @endif
                    <span ><small>Now Delivering</small></span>
                  </div>

                </div>
              </div>
            </div><!-- end card -->

          </div>
        @endforeach


      </div><!--end col-4-->
      <div class="col-8 p-a-0">
        <div id="mapid"></div>
      </div>
    </div>
  </div>
  <pre>{{ print_r(json_encode($locations)) }}</pre>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

@endsection
@section('scripts')
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//geodata.solutions/includes/statecity.js"></script>

  <script>

    var long1 = JSON.parse("{{ json_encode($address['Long']) }}");
    var lat1 = JSON.parse("{{ json_encode($address['Lat']) }}");
    alert("test");

    var locations = {!! json_encode($locations) !!};
    alert(locations.length);
    var mymap = L.map('mapid').setView([long1, lat1], 14);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoibWF4bmllcnN0ZSIsImEiOiJja2Q0cHF5ZzcwNzFkMnpsb3Q0cjZsamdsIn0.nvmRxyyslDWbsh1jZPEBqA'
    }).addTo(mymap);


    for (var i = 0; i < locations.length; i++) {
      marker = L.marker([locations[i]['lat'], locations[i]['long']]).addTo(map);
      marker.bindPopup("info here").openPopup();
    }


  </script>
@endsection
