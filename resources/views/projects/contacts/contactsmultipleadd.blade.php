@extends('layouts.layouts')

@section('title', 'Mnierste Contacts Multiple')

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
        <div class="row">
          <div class="col-12">
            <p>Match up the CSV headers to the correct field option</p>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <p>From CSV File</p>
          </div>
          <div class="col-6">
            <p>Field Name For Upload</p>
          </div>
        </div>
        <div class="row">

          <div class="col-12">
            <form action="{{ url('contacts/addfile') }}" method="post">
              @csrf

              <div class="row m-b-sm">
                <div class="col-5">
                  <select name="oldfirstname" class="form-control">
                    @for($i=0;$i< count($headers);$i++)
                      @if($i==0)
                          <option selected value="{{ $headers[$i] }}">{{ $headers[$i] }}</option>
                      @else
                          <option value="{{ $headers[$i] }}">{{ $headers[$i] }}</option>
                      @endif

                    @endfor
                  </select>
                </div>
                <div class="col-1">
                  <h5>=></h5>
                </div>
                <div class="col-6">
                  <select name="1" class="form-control">
                    <option value="FirstName">First Name</option>
                    <option value="LastName">Last Name</option>
                    <option value="Phone">Phone</option>
                    <option value="Email">Email</option>
                  </select>

                </div>
              </div>

              <div class="row m-b-sm">
                <div class="col-5">
                  <select name="oldlastname" class="form-control">
                    @for($i=0;$i< count($headers);$i++)
                      @if($i==1)
                          <option selected value="{{ $headers[$i] }}">{{ $headers[$i] }}</option>
                      @else
                          <option value="{{ $headers[$i] }}">{{ $headers[$i] }}</option>
                      @endif
                    @endfor
                  </select>
                </div>
                <div class="col-1">
                  <h5>=></h5>
                </div>
                <div class="col-6">
                  <select name="2" class="form-control">
                    <option value="FirstName">First Name</option>
                    <option selected value="LastName">Last Name</option>
                    <option value="Phone">Phone</option>
                    <option value="Email">Email</option>
                  </select>

                </div>
              </div>

              <div class="row m-b-sm">
                <div class="col-5">
                  <select name="oldphone" class="form-control">
                    @for($i=0;$i< count($headers);$i++)
                      @if($i==2)
                          <option selected value="{{ $headers[$i] }}">{{ $headers[$i] }}</option>
                      @else
                          <option value="{{ $headers[$i] }}">{{ $headers[$i] }}</option>
                      @endif

                    @endfor
                  </select>
                </div>
                <div class="col-1">
                  <h5>=></h5>
                </div>
                <div class="col-6">
                  <select name="3" class="form-control">
                    <option value="FirstName">First Name</option>
                    <option value="LastName">Last Name</option>
                    <option selected value="Phone">Phone</option>
                    <option value="Email">Email</option>
                  </select>

                </div>
              </div>

              <div class="row m-b-sm">
                <div class="col-5">
                  <select name="oldemail" class="form-control">
                    @for($i=0;$i< count($headers);$i++)
                      @if($i==3)
                          <option selected value="{{ $headers[$i] }}">{{ $headers[$i] }}</option>
                      @else
                          <option value="{{ $headers[$i] }}">{{ $headers[$i] }}</option>
                      @endif
                    @endfor
                  </select>

                </div>
                <div class="col-1">
                  <h5>=></h5>
                </div>
                <div class="col-6">
                  <select name="4" class="form-control">
                    <option value="FirstName">First Name</option>
                    <option value="LastName">Last Name</option>
                    <option value="Phone">Phone</option>
                    <option selected value="Email">Email</option>
                  </select>
                </div>
              </div>

            </div>
            <input name="data" type="hidden" value="{{ $data }}"></input>
            <div class="col-12">
              <button class="btn btn-success float-right" type="submit">Submit</button>

            </form>
          </div>
        </div>
			</div><!--end rows-->
		</div><!--content-->
	</div>

@endsection
