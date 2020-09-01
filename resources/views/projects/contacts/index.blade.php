@extends('layouts.layouts')

@section('title', 'Mnierste Contacts CRUD')

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
      
      <div class="col-12">
        <form action="{{ url('contacts/addcontact') }}" method="get">
          <button id="addContact" class="btn btn-primary">
            <i class="fa fa-user-plus"></i>Add Contact
          </button>
        </form>

      </div>

    </div>

    @if ($message = Session::get('mssg'))
    <div class="alert alert-success alert-block">
     <button type="button" class="close" data-dismiss="alert">×</button>
       <p class="mssg">{{ session('mssg') }}</p>

    </div>
    @endif
    @if ($message = Session::get('mssgdelete'))
    <div class="alert alert-danger alert-block">
     <button type="button" class="close" data-dismiss="alert">×</button>
       <p class="mssgdelete">{{ session('mssgdelete') }}</p>

    </div>
    @endif
		<div class="container table-background m-t-md">


			<div class="container m-t-md m-b-md">

				<table class="table table-bordered table-hover">

					<thead class="sectionBackgroundGray">
						<th class="text-center">#</th>
						<th class="text-center">First Name</th>
            <th class="text-center">Last Name</th>
						<th class="text-center">Email</th>
						<th class="text-center">Id</th>
						<th class="text-center">Edit</th>
					</thead>
					<tbody>

					@foreach ($all_contacts as $contact)
						<tr>
							<td>{{ $loop->index +1  }} </td>
							<td>{{ $contact->FirstName }} </td>
              <td>{{ $contact->LastName }}</td>
							<td>{{ $contact->Email }} </td>
							<td>{{ $contact->Id }} </td>
							<td>
								<div class="row justify-content-center form-group">
                  <div class="btn-group" role="group">
                    <a href="{{ url('/contacts/' . $contact->Id) }}">
                      <i class="aboutTitle fa fa-edit btn btn-warning"></i>
                    </a>
                    <form action="{{ url('/contacts/'.$contact->Id) }}" method="POST">
                      @csrf
                      @method("DELETE")
                      <button type="submit" value="delete" class="btn btn-danger btn-block" >
                        <i class="aboutTitle fa fa-trash"></i>
                      </button>
                    </form>

                  </div>
								</div>
							</td>
					  </tr>
					@endforeach
					</tbody>
				</table>

			</div><!--end rows-->


		</div><!--content-->
	</div>

@endsection
