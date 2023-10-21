@extends('layouts.panel')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">				
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			<div class="row">
				<div class="col-lg-12">
					<!--begin::Base Table Widget 10-->
					<div class="card card-custom gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 pt-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Log Report for {{$event->event_name}}</span>
							</h3>
                            <div class="align-items-end">
                            View Report By: 
                            @foreach($departments as $department)
                            <a class="btn btn-info" href="/panel/admin/events/{{$event->id}}/{{$department->course_name}}">{{$department->course_name}}</a> 
                            @endforeach
                            </div>
                           
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-2 pb-0 mt-n3">
						<table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="LoggedTable">
							<thead>
								<tr class="text-left text-uppercase">
                                    <th>Date</th>
									<th>ID Number</th>
									<th>Name</th>
									<th>Event</th>
                                    <th>Department</th>
									<th>Login Time</th>
									<th>Logout Time</th>
								</tr>
							</thead>
							<tbody>	
								@foreach($log_data as $logged)
									<tr>
                                        <td>{{$logged['date_log']}}</td>
                                        <td>{{$logged['student']['id_number']}}</td>
										<td>{{$logged['student']['first_name']}} {{$logged['student']['last_name']}}</td>
										<td>{{$logged['event']['event_name']}}</td>
                                        <td>{{$logged['course']}}</td>
										<td>{{$logged['login_time']}}</td>
										<td>{{$logged['logout_time']}}</td>
										
									</tr>
								@endforeach
							</tbody>
						</table>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Base Table Widget 10-->
					<button class="btn btn-info no-print" onclick="window.print();"><i class="fas fa-print"></i>  Print</button>
				</div>
			</div>
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
@endsection