@extends('layouts/layouts')

@section('title', 'Max Nierste, About Me')
@section('content')


  <div class="jumbotron text-center coverImage">
    <div class="container">
      <a href="#aboutme" class="lang-logo">
        <img src="{{ asset('/images/Max.jpg') }}">
      </a>
      <h1 style="text-shadow: 2px 2px black;">Welcome to my Website</h1>
      <h3 style="text-shadow: 2px 2px black;">My Name is Max Nierste and I'm a full-stack developer</h3>

    </div>
  </div>

  <!-- Projects -->
  <div class="container m-b-sm">
    <div class="galleryrow">

      <div class="col-md-12 text-center">
        <h3 id="aboutme">About Me</h3>

        <p>I'm a Full-stack developer based in the United States. I have alot of experience
         with remote Companies / Teams. When I am not programming, you can find me outside
         relaxing with family, working on gardening projects, or playing with our pets!</p>
       </div>
       <div class="row m-t-md">
         <div class="col-12 text-center">
           <i class="devicon-html5-plain-wordmark colored" style="Font-size: 8rem;"></i>
           <i class="devicon-css3-plain-wordmark colored" style="Font-size: 8rem;"></i>
           <i class="devicon-sass-original colored" style="Font-size: 8rem;"></i>
           <i class="devicon-bootstrap-plain colored" style="Font-size: 8rem;"></i>
           <i class="devicon-vuejs-plain-wordmark" style="Font-size: 8rem;"></i>
           <i class="devicon-nodejs-plain colored" style="Font-size: 8rem;"></i>

         </div>
       </div>
       <div class="row m-b-md">
         <div class="col-12 text-center">
           <i class="devicon-mysql-plain-wordmark colored" style="Font-size: 8rem;"></i>
           <i class="devicon-php-plain colored" style="Font-size: 8rem;"></i>
           <i class="devicon-laravel-plain-wordmark colored" style="Font-size: 8rem;"></i>
           <i class="devicon-atom-original-wordmark colored" style="Font-size: 8rem;"></i>
           <i class="devicon-git-plain-wordmark colored" style="Font-size: 8rem;"></i>
           <i class="devicon-heroku-line-wordmark colored" style="Font-size: 8rem;"></i>
         </div>

       </div>
    </div><!-- galleryrow -->
  </div>

    <!-- resume -->
  <div class="section sectionBackgroundGray p-t-md">
    <div class="container" >
      <div class="section m-b-md">
        <div class="row">

          <div class="col-md-6 ">
            <div class="row m-b-sm">
              <div class="col-12">

                <h2 class="text-center aboutTitle">Resume</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-12" >

                <embed src="{{ asset('/images/MaxNierste_Developer.pdf') }}"
                width="100%" height="700px" />
              </div>
            </div>
          </div>


          <div class="col-md-6 ">
            <h2 class="text-center aboutTitle"> Life</h2>

            <div class="container">
              <div class="row">
                <div class="col-12">
                  <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                  <div class="elfsight-app-21cc649a-8f82-477c-a01c-8f5cc4667f0a"></div>
                </div>
              </div>

            </div><!--end col-12-->

            <div class="col-12 text-center">
              <div class="row">
              <!-- Add font awesome icons -->

                <div class="col-3">
                  <a href="{{ url('https://www.facebook.com/max.nierste') }}" target="_blank" class="fa fa1 fa-facebook"></a>
                </div>
                <div class="col-3">
                  <a href="{{ url('https://www.linkedin.com/in/max-nierste/')}}" target="_blank"class="fa fa1 fa-linkedin"></a>
                </div>

                <div class="col-3">
                  <a href="{{ url('https://www.instagram.com/madmax428/')}}" target="_blank" class="fa fa1 fa-instagram instagram"></a>
                </div>
                <div class="col-3">
                  <a href="{{ url('https://github.com/mnierste/')}}" target="_blank" class="fa fa1 fa-github github"></a>
                </div>
              </div>
            </div>

          </div> <!-- end col-6 LIFE -->

          <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-body">
                          <img class="img-fluid" src="" style="width:100%;"/>
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
          $(".img-fluid").attr("src", image);
      });
  });
});
</script>


@endsection
