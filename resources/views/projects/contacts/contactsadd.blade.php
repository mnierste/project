@extends('layouts.layouts')

@section('title', 'Mnierste Contacts Create')

@section('content')


  <div class="content coverImage p-b-md">
    <div class="p-b-md p-t-md sectionBackgroundGray">
  		<div class ="row" >
  			<div class="col-md-12 aboutTitle ">
  				<h1>Contacts</h1>
  			</div>
      </div>
      <div class="col-12">
			  <p class="aboutTitle">Basic Crud contacts table written with php larvel blade templates & Mysql</p>
      </div>
    </div>

		<div class="container table-background m-t-md">


			<div class="container m-t-md m-b-md">

        <form action="{{ url('/contacts') }}" method="post">
          @csrf

          <div class="row p-t-sm ">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                  <label class="" for="firstname">First Name</label>
                  <input class="form-control" id="firstName"
                  name="firstname" placeholder="First Name">
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                  <label class="" for="lastname">Last Name</label>
                  <input class="form-control" id="lastName"
                  name="lastname" placeholder="Last Name">
              </div>
            </div>
          </div><!--end row-->
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                  <label class="" for="Email">Email</label>
                  <input type="email" class="form-control"
                  id="Email"  name="email" placeholder="Email">
              </div>
            </div>

            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                  <label class="" for="phone">Phone</label>
                  <input class="form-control" id="Phone"
                  name="phone" type="number" min="0" step="1"
                  data-bind="value:Phone" placeholder="Phone # (numbers only)">
              </div>
            </div>

          </div><!-- end row -->

          <div class="row">
            <div class="col-12 p-b-sm">
              <button type="submit" class="btn btn-block btn-success">
                Add</button>
            </div>
          </div>
        </form>
			</div><!--end rows-->


		</div><!--content-->
	</div>

@endsection
