@extends('layouts.layouts')
@section('content')


  <div class="content coverImage p-b-md">
		<div class ="" style="background:#337ab7">
			<div class="col-md-12 aboutTitle ">
				<h1>Contacts</h1>
			</div>
			<p class=" aboutTitle p-b-md">Basic Crud contacts table written with php larvel blade templates & Mysql</p>
	  </div>

		<div class="container table-background">
			<div class="row p-b-sm">
				<div class="col-md-4 pull-right" style="margin-right:10px;">
					<button id="addContact" class="btn btn-block btn-primary">Add Contact</button>
				</div>
			</div>

			<div class="row">

				<table class="table table-bordered table-hover">

					<thead >
						<th class="text-center">#</th>
						<th class="text-center">Name</th>
						<th class="text-center">Email</th>
						<th class="text-center">Id</th>
						<th class="text-center">Edit</th>
					</thead>
					<tbody>

					@foreach ($all_contacts as $contact)
						<tr>
							<td> {{ $loop->index +1  }} </td>
							<td> {{ $contact->Name }} </td>
							<td> {{ $contact->Email }} </td>
							<td> {{ $contact->id }} </td>
							<td>
								<div class="form-group">
									<div class="col-md-6">
										<button id="EditContact" class="btn btn-warning btn-block">Edit</button>
									</div>
									<div class="col-md-6">
										<button id="DeleteContact" class="btn btn-danger btn-block">Delete</button>
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
