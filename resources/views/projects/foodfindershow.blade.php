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

<div class="p-t-md p-b-md " style="background-color:#3b8138;" >
  <div class="container" >

    <div class="aboutTitle flex-center title">
     Food Finder Project

    </div>
    <div class="aboutTitle col-md-12 text-center p-b-md">
      <h1 class="font-weight-bold">  <i class="fa fa-cutlery"></i><span> Find Resturants Near You</span> <i class="fa fa-cutlery"></i> </h1>
    </div>

    <div class="row">
      <div class="col-md-12">
        <form class="form-signin" action="{{ url('/foodfindershow') }}" method="GET">
          @csrf
          <div class="form-group">
            <div class="row">
              <div class="col-md-8 ">
                <input type="text" name="street" id="street" class="form-control" value="{{ $address['street'] }}">
              </div>



              <div class="col-md-4 ">
                <label for="zip" class="sr-only">Zip</label>
                <input type="text" name="zip" id="zip" class="form-control" value="{{ $address['zip'] }}">
              </div>
            </div><!-- end row -->

          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-block btn-lg btn-primary float-right" type="submit">Search</button>
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
#<p><pre> {{print_r($Foods)}} </pre></p>

    @endphp

  </div>
</div>


<div class="container">
  <!--
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
    </div><!--end col-12
  </div>

-->
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
          $locations[$loop->index]['address']=$restaurant["restaurant"]["location"]["address"];
          $locations[$loop->index]['type']=$restaurant["restaurant"]["cuisines"];
          $locations[$loop->index]['menu']=$restaurant["restaurant"]["menu_url"];
          @endphp

          <div class="col-sm-12">

            <div class="card">
              <div class="card-header weather-card-header aboutTitle">
                <div class="row">
                  <div class="col-md-9 aboutTitle p-a-0">
                    <h5 class="m-a-0"><a class="aboutTitle" target="_blank" href="{{ $restaurant['restaurant']['url'] }}">{{ $restaurant['restaurant']['name'] }}</a></h5>
                    <p class="m-a-0"> Rating: {{ $restaurant['restaurant']['user_rating']['aggregate_rating'] }} / 5 (reviews: {{ $restaurant['restaurant']['user_rating']['votes'] }})</p>

                  </div>


                  <div class="col-md-3">
                    @if(!empty($restaurant['restaurant']['thumb']))
                    <img style="max-width:50px;float:right;" src="{{ $restaurant['restaurant']['thumb'] }}" class="d-block" alt="...">
                    @else
                    <img style="max-width:50px;float:right;" src="{{ asset('/images/placeholder.png') }}" class="d-block" alt="...">
                    @endif
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

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

@endsection
@section('scripts')


  <script>


    var long1 = {{ $Foods['location']['longitude'] }};
    var lat1 = {{ $Foods['location']['latitude'] }};


    var locations = {!! json_encode($locations) !!};

    var mymap = L.map('mapid').setView([lat1, long1], 14);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoibWF4bmllcnN0ZSIsImEiOiJja2Q0cHF5ZzcwNzFkMnpsb3Q0cjZsamdsIn0.nvmRxyyslDWbsh1jZPEBqA'
    }).addTo(mymap);


    for (var i = 0; i < locations.length; i++) {
      marker = L.marker([locations[i]['lat'], locations[i]['long']]).addTo(mymap);
      marker.bindPopup("pop up info here").openPopup();
    }


  </script>
@endsection
