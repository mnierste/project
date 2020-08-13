@extends('layouts/layouts')

@section('title', 'Mnierste dashboard')

@section('content')
<div class="coverImage">
  <div class="container">
    <div class="row justify-content-center m-t-md m-b-md">
      <div class="col-md-8 col-sm-12 m-b-md">
          <div class="card">
              <div class="card-header dashboard-header text-center">{{ __('Dashboard') }}</div>
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
                      <h5>Personal Information</h5>
                    </div>
                    <div class="col-12">

                      <form action=# method=#><!-- not updateable for demo-->
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
                          <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="" for="Email">Email</label>
                                <input disabled type="email" class="form-control" id="Email"  name="email" value="  {{ Auth::user()->email }}">
                            </div>
                          </div>

                          <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="" for="Phone">Phone</label>
                                <input disabled class="form-control" id="Subject" name="subject" value="{{ Auth::user()->phone }}">
                            </div>
                          </div>

                        </div><!-- end row -->
                        <div class="row">
                          <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="" for="Website">Website</label>
                                <input disabled class="form-control" id="Website" name="website" value="{{ Auth::user()->website }}">
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="" for="Plan">Plan</label>
                                <input disabled class="form-control" id="Plan" name="plan" value="{{ Auth::user()->plantype }}">
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="" for="Role">Role</label>
                                <input disabled class="form-control" id="Role" name="role" value="{{ Auth::user()->role }}">
                            </div>
                          </div>
                        </div><!--end row-->
                        <div class="row">
                          <div class="col-12 p-b-sm">
                            <button type="" class="btn btn-block btn-success">update</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
              </div>
          </div>
      </div>


      <div class="col-md-4 col-sm-12">
        <div class="row m-b-md">
          <div class="col-12">
            <div class="card">
              <div class="card-header dashboard-header text-center"> Pizza CRUD Project</div>
              <div class="card-body">
                <div class="col-12 m-b-img">
                  <a class="aboutTitle" href="{{ url('/pizzaorders') }}">
                    <button type="button" class="btn btn-primary btn-block">Create Order</button>
                  </a>
                </div>
                <div class="col-12">
                  <a class="aboutTitle" href="{{ url('/pizzaorders') }}">
                    <button type="button" class="btn btn-primary btn-block">Manage Orders</button>
                  </a>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="row m-b-md">
          <div class="col-12">
            <div class="card">
              <div class="card-header dashboard-header text-center"> Contacts CRUD</div>
              <div class="card-body">
                <a class="aboutTitle" href="{{ url('/contacts') }}">
                  <button type="button" class="btn btn-primary btn-block">Manage Contacts</button>
                </a>
              </div>
            </div>
          </div><!--end col-6 -->
        </div><!--end row-->
        <div class="row">

          <div class="col-12">
            <div class="card">
              <div class="card-header dashboard-header text-center"> Other Projects</div>
              <div class="card-body">
                <a class="aboutTitle" href="{{ url('/projects') }}">
                  <button type="button" class="btn btn-primary btn-block">See All Projects</button>
                </a>
              </div>
            </div>
          </div>
        </div><!-- end row-->
      </div>
    </div><!--end row-->
  </div>
</div>
@endsection
