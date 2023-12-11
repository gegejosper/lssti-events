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
                            <div class="align-items-end flex-column">
                            Filter By: 
								<form action="{{route('panel.admin.filter_report')}}" method="post">
									@csrf
									<div class="row">
										<div class="col-lg-3">
											<select name="department" id="department" class="form-control">
												@foreach($departments as $department)
												<option value="{{$department->course_name}}">{{$department->course_name}}</option>
												@endforeach
											</select>
										</div>
										<div class="col-lg-3">
											<select name="year" id="year" class="form-control" required>
												<option value="1st Year">1st Year</option>
												<option value="2nd Year">2nd Year</option>
												<option value="3rd Year">3rd Year</option>
												<option value="4th Year">4th Year</option>
											</select>
										</div>
										<div class="col-lg-3"><select name="block" id="block" class="form-control" required>
												<option value="Block A">Block A</option>
												<option value="Block B">Block B</option>
												<option value="Block C">Block C</option>
												<option value="Block D">Block D</option>
												<option value="Block E">Block E</option>
												<option value="Block F">Block F</option>
												<option value="Block G">Block G</option>
												<option value="Block H">Block H</option>
												<option value="Block I">Block I</option>
												<option value="Block J">Block J</option>
												<option value="Block K">Block K</option>
												<option value="Block L">Block L</option>
												<option value="Block M">Block M</option>
												<option value="Block N">Block N</option>
											</select>
										</div>
										<div class="col-lg-3">
											<input type="hidden" name="event_id" value="{{$event->id}}">
											<button type="submit" class="btn btn-success">View</button>
										</div>
									</div>
								</form>
							
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
									<th>Year</th>
									<th>Block</th>
									<th>Login Time</th>
									<th>Logout Time</th>
								</tr>
							</thead>
							<tbody>	
								@if(count($log_data) != 0)
								@foreach($log_data as $logged)
									<tr>
                                        <td>{{$logged['date_log']}}</td>
                                        <td>{{$logged['student']['id_number']}}</td>
										<td>{{$logged['student']['first_name']}} {{$logged['student']['last_name']}}</td>
										<td>{{$logged['event']['event_name']}}</td>
                                        <td>{{$logged['course']}}</td>
										<td>{{$logged['year'] ?  $logged['year'] : ''}}</td>
										<td>{{$logged['block'] ? $logged['block'] : ''}}</td>
										<td>{{$logged['login_time']}}</td>
										<td>{{$logged['logout_time']}}</td>
										
									</tr>
								@endforeach
								@else 
								<tr>
									<td colspan="7"><em>No records</em></td>
								</tr>
								@endif
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