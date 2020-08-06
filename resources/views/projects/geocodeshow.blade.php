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
    height: 670px;
  }
</style>

<div class="mapImage p-t-md p-b-md " >
  <div class="container ">

    <div class="geoTitle flex-center title">
        Geo Location

    </div>
    <div class="geoTitle col-md-12 text-center p-b-md">
      <h1 class="font-weight-bold">Enter Weather Information</h1>
    </div>

    <div class="row">
      <div class="col-md-12">

        <form class="form-signin" action="{{ url('/geocodeshow') }}" method="GET">
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
  <div class="col-12">

    <div class="card-header weather-background text-center" id="headingOne">

        <h1 class="aboutTitle" >
          Map
        </h1>

    </div>


  </div>
</div>
<div class="map-section p-t-sm p-b-sm" >
  <div class="row ">
    <div class="col-md-4">
      <div class="card text-center">
        <div class="weather-card-header aboutTitle">
          <div class="col-md-12">
            <h4>{{ $address['street'] }}</h4>

          </div>
          <div class="col-md-12">
            <h4>{{ $address['city'] }}, {{ $address['state'] }} {{ $address['zip'] }}</h4>
          </div>
            @php
            $melissaInfo = JSON_decode($melissa, true);
            @endphp
        </div>
        <div class="card-body ">

          <table class="table table-bordered table-hover">
            <tbody>

              <tr>
                <td>County:</td>
                <td>{{ $melissaInfo['0']['County'] }}</td>
              </tr>
              <tr>
                <td >Long:</td>
                <td>{{ $address['Long'] }}</td>
              </tr>
              <tr>
                <td >Lat:</td>
                <td>{{ $address['Lat'] }}</td>
              </tr>
              <tr>
                <td >Owner:</td>
                <td>{{ $melissaInfo['0']['OwnerName1Full'] }}</td>
              </tr>
              <tr>
                <td >Beds:</td>
                <td>{{ $melissaInfo['0']['BedroomsCount'] }}</td>
              </tr>
              <tr>
                <td >Baths:</td>
                <td>{{ $melissaInfo['0']['BathCount'] }}</td>
              </tr>
              <tr>
                <td >Est Value:{{ $melissaInfo['0']['YearAssessed'] }}</td>
                <td>${{ number_format($melissaInfo['0']['EstimatedValue']) }}</td>
              </tr>
              <tr>
                <td >Year Built:</td>
                <td>{{ $melissaInfo['0']['YearBuilt'] }}</td>
              </tr>
              <tr>
                <td >Area Sqft:</td>
                <td>{{ number_format($melissaInfo['0']['AreaLotSF']) }}</td>
              </tr>
              <tr>
                <td >Build Sqft:</td>
                <td>{{ number_format($melissaInfo['0']['AreaBuilding']) }}</td>
              </tr>
              <tr>
                <td >Garage Sqft:</td>
                <td>{{ $melissaInfo['0']['ParkingGarageArea'] }}</td>
              </tr>



            </tbody>
          </table>
        </div>
      </div>
    </div><!--end col-4-->
    <div class="col-8">
      <div id="mapid"></div>
    </div>
  </div>
</div>





<!-- weather -->
<div id="accordion">

  <!--2nd accordian -->
  <div class="card">

    <div class="card-header weather-background text-center" id="headingOne">

        <button class="aboutTitle btn btn-block" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <h1>Weather</h1>
        </button>

    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body sectionBackgroundGray">
        <div class="container">
          <div class="row">
            <div class="col-12">
              @php
              $weatherInfo = JSON_decode($weather->getBody(), true);

              @endphp

              <p>Timezone: {{ $weatherInfo['timezone'] }}</p>




            </div>
          </div>
          <div class="row">
            <div class="col-md-6 ">
              <div class="col-md-12" style="padding:10px;">
                <div class="card">
                  <div class="weather-card-header aboutTitle text-center">
                      <h4>Current Weather </h4>
                  </div>
                  <div class="card-body">

                      <p>Time: {{ date('D, M Y', strtotime($weatherInfo['timezone'])) }}
                      <ul>
                        <li>
                          Weather: {{ $weatherInfo['current']['weather']['0']['main'] }}
                        </li>
                        <li>
                          Temp: {{ $weatherInfo['current']['temp'] }}
                        </li>
                        <li>
                          Feels Like: {{ $weatherInfo['current']['feels_like'] }}
                        </li>
                      </ul>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-6">

              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3" </li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                </ol>
                <div class="carousel-inner" style="padding:10px">

                  @foreach($weatherInfo['daily'] as $daily)


                      @if($loop->first)
                      <div class="carousel-item active">
                      @else
                      <div class="carousel-item ">
                      @endif

                        <div class="card">
                          <div class="card-header weather-card-header aboutTitle">
                            <div class="row">
                              <div class="col-md-6 text-center">
                                <h4>{{ date('D- d,  M', $daily['dt']) }}</h4>
                              </div>
                              <div class="col-md-6 text-center">
                                <img style="max-width:70px;margin:auto;" src="{{ asset('/images/crud.png') }}" class="d-block w-100" alt="...">

                              </div>
                            </div>
                          </div>
                          <div class="card-body">
                            <ul>
                              <li>Weather: {{ $daily['weather']['0']['main'] }}</li>
                              <li>Max Temp: {{ $daily['temp']['max'] }}</li>
                              <li>Min Temp: {{ $daily['temp']['min'] }}</li>
                              <li>Feels Like: {{ $daily['feels_like']['day'] }}</li>
                            </ul>
                          </div>
                        </div>
                      </div>

                  @endforeach

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>

            </div>

            </div>
          </div>
        </div><!--end container-->
      </div>
    </div>
  </div><!-- end card -->
<!--END 2nd accordian -->


</div>
<!-- end wolf -->

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

    var mymap = L.map('mapid').setView([long1, lat1], 18);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoibWF4bmllcnN0ZSIsImEiOiJja2Q0cHF5ZzcwNzFkMnpsb3Q0cjZsamdsIn0.nvmRxyyslDWbsh1jZPEBqA'
    }).addTo(mymap);

    var marker = L.marker([ long1, lat1]).addTo(mymap);
    marker.bindPopup("{{ $address['street'] }}").openPopup();

  </script>
@endsection
