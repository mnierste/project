@extends('layouts/layouts')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">{{ __('Dashboard') }}</div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row text-center">
                  <div class="col-12">
                    {{ __('You are logged in!') }}

                  </div>
                </div>
                <br>
                <div class="row ">
                  <div class="col-12 text-center">
                    <h1>Personal Information</h1>
                  </div>
                  <div class="col-12">

                    <form action=# method=#><!-- not update able for demo-->
                      @csrf

                      <div class="row p-t-sm ">
                        <div class="col-md-12">
                          <div class="form-group">
                              <label class="" for="Name">Name</label>
                              <input disabled class="form-control" id="Name" name="name" value="  {{ Auth::user()->name }}">
                          </div>
                        </div>
                      </div><!--end row-->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="" for="Email">Email</label>
                              <input disabled type="email" class="form-control" id="Email"  name="email" value="  {{ Auth::user()->email }}">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="" for="Phone">Phone</label>
                              <input disabled class="form-control" id="Subject" name="subject" value="{{ Auth::user()->phone }}">
                          </div>
                        </div>

                      </div><!-- end row -->
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="" for="Website">Website</label>
                              <input disabled class="form-control" id="Website" name="website" value="{{ Auth::user()->website }}">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="" for="Plan">Plan</label>
                              <input disabled class="form-control" id="Plan" name="plan" value="{{ Auth::user()->plantype }}">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="" for="Role">Role</label>
                              <input disabled class="form-control" id="Role" name="role" value="{{ Auth::user()->role }}">
                          </div>
                        </div>
                      </div><!--end row-->
                      <div class="row">
                        <div class="col-md-12 p-b-sm">
                          <button class="btn btn-block btn-success text-muted">update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-header"> Pizza CRUD Project</div>
          <div class="card-body">
            <a class="aboutTitle" href="{{ url('/pizzaorders') }}">
              <button type="button" class="btn btn-primary btn-block">Manage Pizza Orders</button>
            </a>

          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="card">
          <div class="card-header"> Contacts CRUD</div>
          <div class="card-body">

            <a class="aboutTitle" href="{{ url('/contacts') }}">
              <button type="button" class="btn btn-primary btn-block">Manage Contacts</button>
            </a>


          </div>
        </div>
      </div><!--end col-6 -->

      </div>

    </div>
  </div>
</div>
@endsection
