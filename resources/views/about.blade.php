
@extends('layouts/layouts')
@section('content')


  <div class="jumbotron text-center coverImage">
    <div class="container">
      <a href="/" class="lang-logo">
        <img src="{{ asset('/images/Max.jpg') }}">
      </a>
      <h1>Welcome to my Website</h1>
      <h3>My Name is Max Nierste and I'm a full-stack developer</h3>

    </div>
  </div>

  <!-- Projects -->
  <div class="container m-b-sm">
    <div class="galleryrow">

      <div class="col-md-12 text-center">
        <h3>About Me</h3>

        <p>I'm a Full-stack developer based in the United States. I have alot of experience
         with remote Companies / Teams. When I am not programming, you can find me outside
         relaxing with family, working on gardening projects, or playing with our pets!</p>
       </div>
    </div><!-- galleryrow -->
  </div>

    <!-- resume -->
  <div class="section" style="background:#999;">
    <div class="container p-t-md" >
      <div class="section m-b-md">
        <div class="row">

          <div class="col-md-6 ">
            <div class="row m-b-sm">
              <div class="col-md-12">

                <h2 class="text-center aboutTitle">Resume</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12" >

                <embed src="{{ asset('/images/MaxNierste_Developer.pdf') }}"
                width="100%" height="700px" />
              </div>
            </div>
          </div>

          <div class="col-md-6 ">
            <h2 class="text-center aboutTitle"> Life</h2>

            <div class="container">
              <div class="row">
                <div class="col-md-4 parentLife">
                  <img class="LifeImg" id="1" data-toggle="modal" data-target="#myModal" src='{{ asset('/images/maxproject1.jpeg') }}' alt='image' />
                </div>
                <div class="col-md-4 parentLife">
                  <img class="LifeImg" id="2" data-toggle="modal" data-target="#myModal" src='{{ asset('/images/maxproject2.jpeg') }}' alt='image' />
                </div>
                <div class="col-md-4 parentLife">
                  <img class="LifeImg" id="3" data-toggle="modal" data-target="#myModal" src='{{ asset('/images/maxproject3.jpeg') }}' alt='image' />
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 parentLife">
                  <img class="LifeImg" id="4" data-toggle="modal" data-target="#myModal" src='{{ asset('/images/maxproject4.jpeg') }}' alt='image' />
                </div>
                <div class="col-md-4 parentLife">
                  <img class="LifeImg" id="5" data-toggle="modal" data-target="#myModal" src='{{ asset('/images/maxproject5.jpeg') }}' alt='image' />
                </div>
                <div class="col-md-4 parentLife">
                  <img class="LifeImg" id="6" data-toggle="modal" data-target="#myModal" src='{{ asset('/images/maxproject6.jpeg') }}' alt='image' />
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 parentLife">
                  <img class="LifeImg" id="7" data-toggle="modal" data-target="#myModal" src='{{ asset('/images/maxproject7.jpeg') }}' alt='image' />
                </div>
                <div class="col-md-4 parentLife">
                  <img class="LifeImg" id="8" data-toggle="modal" data-target="#myModal" src='{{ asset('/images/maxproject8.jpeg') }}' alt='image' />
                </div>
                <div class="col-md-4 parentLife">
                  <img class="LifeImg" id="9" data-toggle="modal" data-target="#myModal" src='{{ asset('/images/maxproject9.jpeg') }}' alt='image' />
                </div>
              </div>

            </div><!--end col-12-->

            <div class="col-md-12 text-center m-t-md">
              <div class="row">
              <!-- Add font awesome icons -->

                <div class="col-md-4">
                  <a href="{{ url('https://www.facebook.com/max.nierste') }}" target="_blank" class="fa fa-facebook"></a>
                </div>
                <div class="col-md-4">
                  <a href="{{ url('https://www.linkedin.com/in/max-nierste/')}}" target="_blank"class="fa fa-linkedin"></a>
                </div>

                <div class="col-md-4">
                  <a href="{{ url('https://www.instagram.com/madmax428/')}}" target="_blank" class="fa fa-instagram instagram"></a>
                </div>
              </div>
            </div>

          </div> <!-- end col-6 LIFE -->

          <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-body">
                          <img class="img-responsive" src="" style="width:100%;"/>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>
// asset('/images/maxproject9.jpeg') }}//
$(document).ready(function () {
  $('img').on('click', function () {
      var image = $(this).attr('src');
      $('#myModal').on('show.bs.modal', function () {
          $(".img-responsive").attr("src", image);
      });
  });
});
</script>


@endsection
