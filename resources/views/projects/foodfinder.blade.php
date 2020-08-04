@extends('layouts.layouts')

@section('css')


@endsection

@section('content')
<!--https://geodata.solutions/
geocoding.geo.census.gov
#www.openstreetmap.org/
-->


    <div class="p-t-md  form-height" >
      <div class="container ">

        <div class="AboutTitle flex-center title">
            Food Project

        </div>
        <div class="geoTitle col-md-12 text-center p-b-md">
          <h1 class="font-weight-bold">Enter info for Resturants near you</h1>
        </div>

        <div class="row">
          <div class="col-md-12">
            <form class="form-signin" action="{{ url('/foodfindershow') }}" method="GET">
              @csrf
              <div class="form-group">
                  <div class="row">
                    <div class="col-md-12 ">
                      <input type="text" name="street" id="street" class="form-control" placeholder="Street">
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-5 ">
                    <input type="hidden" name="country" id="countryId" value="US"/>
                    <label for="city" class="sr-only">City</label>
                    <select name="city" class="cities order-alpha form-control" id="cityId">
                        <option value="">Select City</option>
                    </select>
                  </div>
                  <div class="col-md-3 ">
                    <label for="state" class="sr-only">State</label>
                    <select name="state" class="states order-alpha form-control" id="stateId" >
                      <option value="">Select State</option>
                    </select>
                  </div>
                  <div class="col-md-4 ">
                    <label for="zip" class="sr-only">Zip</label>
                    <input type="text" name="zip" id="zip" class="form-control" placeholder="Zip">
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


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->





@endsection

@section('scripts')
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//geodata.solutions/includes/statecity.js"></script>

@endsection
