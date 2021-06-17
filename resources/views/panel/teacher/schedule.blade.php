@extends('layouts.panel')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">				
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			<div class="row">
                <div class="col-lg-6">
					<!--begin::Base Table Widget 10-->
					<div class="card card-custom gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 pt-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Student List</span>
								<span class="text-muted mt-3 font-weight-bold font-size-sm">List of students on this subject schedule.
								</span>
							</h3>
                           
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-2 pb-5 mt-n3" style="height:400px; overflow:scroll;">
                            @if($found_day == true)
                            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="subjectScheduleTable" >
                                <thead>
                                    <tr class="text-left text-uppercase">
                                        <th style="" class="pl-7">
                                            <span class="text-dark-75">Name</span>
                                        </th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>	
									@foreach($students as $student)
										@if($student->attendances->count() == 0)
										<tr class="row{{$student->id}}">
											<td>{{$student->student->first_name}} {{$student->student->last_name}}</td>
											<td> <a href="javascript:;" class="btn btn-light-success font-weight-bolder font-size-sm mark-present"
                                        		data-schedule_id="{{$schedule_id}}"
												data-student_id="{{$student->student_id}}"
												><i class="fas fa-check"></i></a> | 
												<a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm mark-late"
                                        		data-schedule_id="{{$schedule_id}}"
												data-student_id="{{$student->student_id}}"
												><i class="fas fa-minus"></i></a></td>
										</tr>
										@endif
									@endforeach
                                </tbody>
                            </table>
                            @else
                            <em class="text-danger">No Schedule for Today</em>
                            @endif
						</div>
						<!--end::Body-->
					</div>
					<!--end::Base Table Widget 10-->
					
				</div>
				<div class="col-lg-6">
					<!--begin::Base Table Widget 10-->
					<div class="card card-custom gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 pt-5 pb-0 mb-0">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Schedule Details</span>
								
							</h3>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pb-0">
                            <div class="pb-5">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Subject:</span>
                                    <a href="#" class="text-muted text-hover-primary">{{$schedule->subject->name}}</a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Time:</span>
                                    <span class="text-muted">{{$schedule->subject_time}}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="font-weight-bold mr-2">Day:</span>
                                    <span class="text-muted">
                                        @foreach($schedule->days as $day)
                                    {{$day->schedule_day}}
                                    @endforeach</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="font-weight-bold mr-2">Semester:</span>
                                    <span class="text-muted">{{$schedule->schoolyear->semester}}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="font-weight-bold mr-2">School Year:</span>
                                    <span class="text-muted">{{$schedule->schoolyear->cy}}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="font-weight-bold mr-2">Status:</span>
                                    <span class="text-muted">{{$schedule->status}}</span>
                                </div>
                            </div>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Base Table Widget 10-->
					
				</div>
			</div>
			<!--end::Dashboard-->
            <div class="row">
				<div class="col-lg-12" >
					<!--begin::Base Table Widget 10-->
					<div class="card card-custom gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 pt-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Attendance List for the Month of {{date('M')}}</span>
								<span class="text-muted mt-3 font-weight-bold font-size-sm">Summary of student's attendance
								</span>
							</h3>
                           
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-2 pb-0 mt-n3" style="width:100%; overflow:scroll;">
						<table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="subjectScheduleTable">
							<thead>
                                
								<tr class="text-left text-uppercase">
									<th style="" class="pl-7">
										<span class="text-dark-75">Name</span>
									</th>
									@foreach($days_list as $days)
                                    <th class="text-center">{{$days['date_day']}} <br>
                                        <span class="text-muted">{{$days['day_date_num']}}</span>
                                    </th>
                                    @endforeach
								</tr>
							</thead>
							<tbody>	
								@foreach($students as $student)
									<tr>
										<td>{{$student->student->first_name}} {{$student->student->last_name}}</td>
										@foreach($days_list as $days)
										<th class="text-center">
										@csrf
										<script type='text/javascript'>
										$(document).ready(function() {
											$.ajax({
											type: 'post',
											url: '/panel/teacher/check/present',
											data: {
												//_token:$(this).data('token'),
												'_token': $('input[name=_token]').val(),
												'schedule_id': {{$schedule_id}},
												'date_num': {{number_format($days['day_date_num'],0)}},
												'date_month' : {{$date_month}},
												'date_year' : {{$date_year}},
												'student_id' : {{$student->student->id}}
											},
											success: function(data) {
												console.log(data)
												if(data.count != 0){
													$('#check_present' + data.student_id + data.date_num).addClass('label-light-success');
													$('#check_present' + data.student_id + data.date_num).html('<i class="fas fa-check text-success"></i>')
												} 
												else {
													$('#check_present' + data.student_id + data.date_num).addClass('label-light-danger');
													$('#check_present' + data.student_id + data.date_num).html('<i class="fas fa-times text-danger"></i>');
												}
											},
											
											error: function(data){
											var errors = data.responseJSON.errors;
											var errormessage = '';
											Object.keys(errors).forEach(function(key) {
												errormessage += errors[key] + '<br />';
												$('.errors').html('');
												$('.errors').append(`
												<div class="alert alert-danger" role="alert"> ${errormessage} </div>
												`);
											});
											}
										});
										});
										</script>
											<span class="label label-lg font-weight-bold  label-inline check_present" style="color:#fff;" id="check_present{{$student->student->id}}{{number_format($days['day_date_num'],0)}}"></span>
										</th>
										@endforeach
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
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>

@endsection

@section('jslinks')

<script src="{{asset('js/schedules.js')}}"></script>
<script src="{{asset('js/attendance.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>  
@endsection