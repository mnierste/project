@extends('layouts.layouts')

@section('title', 'Mnierste Contacts CRUD')

@section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection

@section('content')


  <div class="content coverImage p-b-md">
    <div class="p-b-md p-t-md sectionBackgroundGray">
  		<div class ="row" >
  			<div class="col-md-12 aboutTitle ">
  				<h1>Contacts</h1>
  			</div>
      </div>
      <div class="col-12">
			  <h5 class="aboutTitle">Basic Crud contacts table written with php larvel
          blade templates & Mysql.</h5>
      </div>
      <div class="container">
        <div class="row m-b-sm">
          <div class="card col-md-5 col-sm-12">
            <div class="card-body">
              <div class="col-12">
                <h5 class="">Add Individual Contacts</h5>
              </div>
              <div class="col-12">
                <form action="{{ url('contacts/addcontact') }}" method="get">
                  @csrf
                  <button id="addContact" class="btn btn-primary" type="submit">
                    <i class="fa fa-user-plus"></i>Add Individual Contact
                  </button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-sm-12">
            <h5 class="aboutTitle" style="padding-top:70px;">OR<h5>
          </div>
          <div class="card col-md-5 col-sm-12">
            <div class="card-body">
              <div class="col-12">
                <h5 class="">Add Multiple Contacts</h5>
              </div>
              <div class="col-12">
                <form action="{{ url('contacts/addcontacts') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="custom-file m-b-sm">
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label float-left" for="customFile">Choose CSV</label>
                  </div>
                  <button id="addContacts" class="btn btn-primary" type="submit" name="submit">
                    <i class="fa fa-user-plus"></i>Add Mulitple Contacts
                  </button>

                </form>
              </div>
            </div>
          </div>
        </div>
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

				<table id="contactsTable" class="table table-bordered table-hover">

					<thead class="sectionBackgroundGray">
						<th class="text-center">#</th>
						<th class="text-center">First Name</th>
            <th class="text-center">Last Name</th>
						<th class="text-center">Email</th>
						<th class="text-center">Phone</th>
						<th class="text-center">Edit</th>
            <th class="text-center"></th>
					</thead>
					<tbody>

					@foreach ($all_contacts as $contact)
						<tr>
							<td>{{ $loop->iteration  }} </td>
							<td>{{ $contact->FirstName }} </td>
              <td>{{ $contact->LastName }}</td>
							<td>{{ $contact->Email }} </td>
							<td>{{ $contact->Phone }} </td>
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
              <td>
                <input name="deleteMultiple" type="checkbox" value="{{ $contact->Id }}">
              </td>
					  </tr>
					@endforeach
					</tbody>
				</table>

			</div><!--end rows-->
      <button id="massDeleteButton" name="massDeleteButton" type="button" class="btn btn-danger btn-block" >
        <i class="aboutTitle fa fa-trash"></i>Delete Selected
      </button>

		</div><!--content-->
	</div>

@endsection

@section('scripts')
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready( function () {
        $('#contactsTable').DataTable();
    } );
  </script>
  <script>
    //name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  </script>

  <script>
  //multi select box for mass delete
    $(document).ready(function() {
      $("#massDeleteButton").click(function(){
          var massDelete = [];
          $.each($("input[name='deleteMultiple']:checked"), function(){
              massDelete.push($(this).val());
          });
          //submit action for mass delete
          alert(massDelete);



      });
    });
</script>

@endsection
