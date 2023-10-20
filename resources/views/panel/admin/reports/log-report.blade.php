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
								<span class="card-label font-weight-bolder text-dark">Log Report</span>
								<span class="text-muted mt-3 font-weight-bold font-size-sm">Login / Logout of Students
								</span>
							</h3>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-2 pb-0 mt-n3">
						<table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="LoggedTable">
							<thead>
								<tr class="text-left text-uppercase">
                                    <th>Date</th>
                                    <th>
										Name
									</th>
									<th>Event</th>
                                    <th>Course</th>
									<th>Time Log</th>
									<th>Log Type</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>	
								@foreach($gate_logged as $logged)
									<tr>
                                        <td>{{$logged->created_at->format('d-M-Y')}}</td>
                                        <td>{{$logged->student->first_name}} {{$logged->student->last_name}}</td>
										<td>{{$logged->time_log}}</td>
										<td>{{$logged->event_detail->event_name}}</td>
                                        <td>{{$logged->course}}</td>
										<td>{{$logged->log_type}}</td>
										<td>{{$logged->status}}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Base Table Widget 10-->
					
				</div>
			</div>
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
@endsection