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
    <div class="row flex-center">
      @if (count($errors) > 0)
        <div class="alert alert-danger">
         <button type="button" class="close" data-dismiss="alert">×</button>
         <ul>
          @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
          @endforeach
         </ul>
        </div>
       @endif


       @if ($message = Session::get('mssg'))
         <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
            <p class="mssg">{{ session('mssg') }}</p>
         </div>
       @endif
    </div><!--end row-->


    <div class="row">
      <div class="col-md-12">
        <form action="{{ url('contactme') }}" method="post">
          @csrf
            <div class="col-md-12 p-t-md p-b-md">
              <div class="contactDiv">
                <div class="row p-t-sm ">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="aboutTitle" for="Email">Email</label>
                        <input type="email" class="form-control" id="Email"  name="email" placeholder="Enter email">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="aboutTitle" for="Name">Name</label>
                        <input class="form-control" id="Name" name="name" placeholder="Name">
                    </div>
                  </div>
                </div>
                <div class="row">

                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="aboutTitle"  for="Subject">Subject</label>
                        <input class="form-control" id="Subject" name="subject" placeholder="Subject">
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 p-b-sm">
                    <div class="form-group">
                        <label class="aboutTitle"  for="Message">Message</label>
                        <textarea maxlength="250" class="form-control" id="Message" name="message" rows="5"></textarea>
                        <span style="color:white;" id="chars">250 Characters Remaining</span>

                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 p-b-sm">
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

@section('scripts')
  <!-- Script -->
  <script>
    var maxLength = 250;
    $('#Message').keyup(function() {
      var length = $(this).val().length;
      var length = maxLength-length;
      $('#chars').text(length + " Characters Remaning");
    });

 </script>
@endsection
