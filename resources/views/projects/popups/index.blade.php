@extends('layouts/layouts')

@section('title', 'Max Nierste, Annoying page')
@section('content')


<div class="section sectionBackgroundGrad p-t-md">
  <div class="container" >
    <div class="col-12">
      <h2 class="aboutTitle text-center">Popup Examples</h2>
    </div>
  </div>
</div>

<div class="counter-background p-t-md p-b-md">
  <div class="container">
    <div class="row text-center aboutTitle">
      <div class="col-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal1">
          Start the Modal Maddness Again
        </button>
       </div>
    </div>
  </div>
</div>


<!-- Modal start -->
<!-- 1st modal-->
<div id="Modal1" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header primary">
        First Popup!
      </div>
      <div class="modal-body">
        <h5>This is the first of 7 popup Modals...<h5>
      </div>
      <div class="modal-footer">
        <button onclick="openNextModal(this)" name="Modal1|Modal2" type="button" class="btn btn-primary">Continue</button>
        <button type="button" class="btn btn-danger popover-dismiss" data-trigger="hover" data-toggle="popover" title="HA, You cant quit now"
        data-content="Sorry but no, Please continue">Close</button>

      </div>
    </div>
  </div>
</div>

<!-- 2nd modal-->
<div id="Modal2" class="modal fade" role="dialog" data-value="Modal3">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header primary">
        Popup #2!
      </div>
      <div class="modal-body">
        <h5>This is the second of 7 popup Modals...<h5>
          <small>Not sure why anyone would want 7...</small>
      </div>
      <div class="modal-footer">
        <button onclick="openNextModal(this)" name="Modal2|Modal3" type="button" class="btn btn-primary">Continue</button>

      </div>
    </div>
  </div>
</div>
<!-- 3rd modal-->
<div id="Modal3" class="modal fade" role="dialog" data-value="Modal4">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header primary">
        Popup #C!
      </div>
      <div class="modal-body">
        <h5>3/7</h5>
        <p>Example of buttons and set up used for this process.</p>
        <ul>
          <li>onclick="openNextModal(this)"</li>
          <li>name="Modal4|Modal5"</li>
        </ul>
        <p><pre><code>&lt;button type="button" onclick="openNextModal(this)" name="Modal4|Modal5" &gt; Next &lt;/button &gt;</code></pre></p>
      </div>
      <div class="modal-footer">
        <button onclick="openNextModal(this)" name="Modal3|Modal4" type="button" class="btn btn-danger">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- 4th modal small right side-->

<div class="modal fade" id="Modal4" data-value="Modal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-slideout modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header primary">
        <h5 class="modal-title" id="exampleModalLabel">Modal sideout small</h5>
      </div>
      <div class="modal-body">
        <p>4/7 Slides from the side Click next to see the function used to make these Modals Pop</p>

      </div>
      <div class="modal-footer">

        <button type="button" onclick="openNextModal(this)" name="Modal4|Modal5" class="btn btn-primary">Continue</button>
      </div>
    </div>
  </div>
</div>

<!-- 5th modal md right side-->
<div class="modal fade" id="Modal5" data-value="Modal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-slideout" role="document">
    <div class="modal-content">
      <div class="modal-header primary">
        <h5 class="modal-title" id="exampleModalLabel">Modal sideout normal</h5>

      </div>
      <div class="modal-body">
        <pre>
          <code>
            Medium size Modal 5/7.

            openNextModal = function(ModalData){
              // grab name attribute from button &
              // seperate #ids for Modal Manipulation
              var Modal = ModalData.name.split("|");

              // hide current modal
              $('#'+Modal[0]).hide();

              // show next modal
              var NextModal = Modal[1];
              $("#"+NextModal).modal('show');

            }
          </code>
        </pre>
      </div>
      <div class="modal-footer">

        <button type="button" onclick="openNextModal(this)" name="Modal5|Modal6" class="btn btn-primary">Still Going</button>
      </div>
    </div>
  </div>
</div>

<!-- 6th modal lg right side-->

<div class="modal fade" id="Modal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
  <div class="modal-dialog modal-dialog-slideout modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header primary">
        <h5 class="modal-title" id="exampleModalLabel">Modal sideout large</h5>

      </div>
      <div class="modal-body text-center">
          <p>Pop ups are extremely helpful when used correctly</p>
          <small>You wont make any friends if you have a process like this current example though<small>
      </div>
      <div class="modal-footer">

        <button type="button" onclick="openNextModal(this)" name="Modal6|Modal7" class="btn btn-primary">Almost</button>
      </div>
    </div>
  </div>
</div>

<!-- 6th modal sm scrollable right side-->

<div class="modal fade" id="Modal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
  <div class="modal-dialog modal-dialog-slideout modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header primary">
        <h5 class="modal-title" id="exampleModalLabel">Modal sideout small</h5>

      </div>
      <div class="modal-body">
       <h2>Explore the history of the classic Lorem Ipsum passage: </h2>
       <h6>Explore the history of the classic Lorem Ipsum passage and generate your own text using any number of characters, words, sentences or paragraphs. Commonly used as placeholder text in the graphic and print industries, Lorem Ipsum's origins extend far back to a scrambled Latin passage from Cicero in the middle ages.</p>
       <p>Explore the history of the classic Lorem Ipsum passage and generate your own text using any number of characters, words, sentences or paragraphs. Commonly used as placeholder text in the graphic and print industries, Lorem Ipsum's origins extend far back to a scrambled Latin passage from Cicero in the middle ages.</p>
       <h6>Explore the history of the classic Lorem Ipsum passage and generate your own text using any number of characters, words, sentences or paragraphs. Commonly used as placeholder text in the graphic and print industries, Lorem Ipsum's origins extend far back to a scrambled Latin passage from Cicero in the middle ages.</h6>
      </div>
      <div class="modal-footer">

        <button type="button" onclick="startFullModal()" class="btn btn-success">Done</button>
      </div>
    </div>
  </div>
</div>



@endsection

@section('scripts')

<script>


//loads first modal
window.onload = function() {
  setTimeout("$('#Modal1').modal('show')", 1000);
};

//open up next modal (total of 7)

openNextModal = function(ModalData){
  // grab name attribute from button &
  // seperate #ids for Modal Manipulation
  var Modal = ModalData.name.split("|");

  //hide current modal
  $('#'+Modal[0]).hide();

  //show next modal
  var NextModal = Modal[1];
  $("#"+NextModal).modal('show');

}


startFullModal = function() {
  $('#Modal7').modal('hide');
  //modal backdrop didnt dissapear and return focus after close- this fixes that.
  //$('body').removeClass('modal-open');
  //$('.modal-backdrop').remove();
};

//init popover for first modal
$(function () {
  $('[data-toggle="popover"]').popover()
})

</script>



@endsection
