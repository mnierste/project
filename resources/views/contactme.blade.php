@extends('layouts.layouts')
@section('content')


<div class="coverImage p-t-md p-b-md " >
  <div class="container ">

    <div class="aboutTitle flex-center title m-b-sm">
        Contact Me

    </div>
    <div class="aboutTitle flex-center m-b-md">
      <h2>Max Nierste Full-stack Developer</h2>
    </div>

    <div class="row">
      <div class="col-md-12">
      <form action="" method="">
          <div class="col-md-12 p-t-md p-b-md">
              <div class=" contactDiv">
                <div class="row p-t-sm ">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-group aboutTitle" for="Email">Email</label>
                        <input type="email" class="form-control" id="Email"  placeholder="Enter email">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="aboutTitle" for="Name">Name</label>
                        <input class="form-control" id="Name" placeholder="Name">
                    </div>
                  </div>
                </div>
                <div class="row">

                  <div class="col-md-12">
                    <div class="form-group">
                        <label class="aboutTitle"  for="Subject">Subject</label>
                        <input class="form-control" id="Subject" placeholder="Subject">
                    </div>
                  </div>
                  <div class="col-md-12 p-b-sm">
                    <div class="form-group">
                        <label class="aboutTitle"  for="Message">Message</label>
                        <textarea class="form-control" id="Message" rows="5"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 p-b-sm">
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                  </div>
                </div>
              </div>


          </div>
        </form>
      </div>
      </div><!-- row -->
    </div> <!-- container -->
  </div> <!-- cover image -->

@endsection
