@extends('layouts.layouts')

@section('css')


@endsection

@section('content')
<!--https://geodata.solutions/
geocoding.geo.census.gov
#www.openstreetmap.org/
-->


<div class="p-t-md  form-height" style="background-color:#3b8138;">
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
                <div class="col-md-12 ">
                  <input type="text" name="street" id="street" class="form-control" value="20 W 34th St">
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">

              <div class="col-md-4 ">
                <label for="zip" class="sr-only">Zip</label>
                <input type="text" name="zip" id="zip" class="form-control" value="10001">
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
