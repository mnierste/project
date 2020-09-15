@extends('layouts.layouts')

@section('title', 'Mnierste Contacts CRUD')

@section('content')


  <div class="content coverImage p-b-md p-t-md">

		<div class="container table-background m-t-md">


			<div class="container m-t-md m-b-md">
{{ print_r($headers) }}
<br>
<br>
				<table class="table table-bordered table-hover">

					<thead class="sectionBackgroundGray">
						<th class="text-center">#</th>
						<th class="text-center">First Name</th>
            <th class="text-center">Last Name</th>
						<th class="text-center">Email</th>

					</thead>
					<tbody>

            @php
            $data = JSON_decode($data, TRUE);
            $newdata = array();
            $count = 0;

            foreach ($data as $d){

              $newdata[$count] =array_combine($headers , $d);
              print_r($newdata[$count]);
              echo "<br>";
        			$count += 1;
              
            }

              @endphp

              <pre>

              </pre>
					</tbody>
				</table>
			</div><!--end rows-->
		</div><!--content-->
	</div>

@endsection
