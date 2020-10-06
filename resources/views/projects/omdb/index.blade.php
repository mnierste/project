@extends('layouts.layouts')

@section('title', 'Max Nierste API page')

@section('content')

<style>
body{
  color:black;
}
</style>

<div class="py-5 text-center sectionBackgroundYellow" >
  <h2>OMDB API</h2>
  <p class="lead">Forms built to work with API
    <a href="https://apilist.fun/api/omdb" target="_blank" >OMDB</a> &
    <a href="https://beeceptor.com" target="_blank">Beeceptor</a>
  </p>

</div>
<div style="background-image:linear-gradient(245deg, #fff, #333);">
  <div class="container" >
    <div class="row">

      <div class="col-12 m-b-md  p-t-md">
        <div class="card">
          <div class="card-header sectionBackgroundYellow">
            <h4 class="text-center mb-3">Movie Search</h4>
            <p class="text-center">Examples for Title Look up: "Adventure" or "Red"</p>
          </div>
          <div class="card-body">
            <form action="{{ url('/apipageresults') }}" method="POST">
              @csrf
              <div class="row mb-3">
                <div class="col-md-9">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" id="title" value="Adventure" required>
                </div>
                <div class="col-md-3">
                  <label for="year">Year</label>
                  <input type="text" class="form-control" name="year" id="year" placeholder="Year" value="">
                </div>
              </div>
              <button class="btn btn-block btnYellow"  type="submit">Search</button>

            </form>
          </div>
        </div>
      </div>


      <div class="col-12 m-b-md">
        <div class="card">
          <div class="card-header sectionBackgroundYellow">
            <h4 class="mb-3 text-center">Add Movie</h4>
            <p class="text-center">Push API Data to Beeceptor for mock add & mock response of movie title</p>

            @if ($message = Session::get('mssg'))
            <div class="alert alert-success alert-block">
             <button type="button" class="close" data-dismiss="alert">×</button>
               <p class="mssg">{{ session('mssg') }}</p>

            </div>
            @endif
          </div>
          <div class="card-body">
            <form action="{{ url('/apipageadd') }}" method="POST">
              @csrf
              <div class="row mb-3">
                <div class="col-md-9 col-sm-12">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                </div>
                <div class="col-md-3 col-sm-12">
                  <label for="year">Year</label>
                  <input type="text" class="form-control" name="year" id="year" placeholder="Year" value="" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-12">
                  <label for="plot">Plot</label>
                  <textarea type="text" class="form-control" name="plot" id="plot" required>Plot Here with basic details.</textarea>
                </div>
              </div>
              <button class="btn btnYellow btn-block" type="submit">Add</button>

            </form>
          </div>
          <div class="card-footer">
            <p class="text-center"><a href="https://beeceptor.com/console/calldripproject" target="_blank">Click here</a> THEN hit submit to see posts and responses using Beeceptor</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
