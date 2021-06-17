@extends('layouts.panel')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="{{asset('js/jquery.table2excel.js')}}"></script>  
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">				
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
            
            <div class="row ">
				<div class="col-lg-12" >
					<!--begin::Base Table Widget 10-->
					<div class="card card-custom gutter-b">
                        <div class="card-header border-0 pt-5">
							@if(session('success'))
						        <div class="alert alert-success my-10" role="alert">
						            {{ session('success') }}     
						        </div>
						    @endif
                            @php 
                            $dateObj   = DateTime::createFromFormat('!m', $date_month);
                            $monthName = $dateObj->format('F');
                            @endphp
                            <div class="col-lg-9"><h1>View attendance for {{$schedule->subject->name}} | {{$monthName}}, {{$date_year}}</h1></div>
                            <div class="col-lg-2">
                                <!-- <a href="/panel/teacher/export/attendance/{{$date_month}}/{{$date_year}}/{{$schedule_id}}" class="btn btn-primary font-weight-bold float-right">Download .xlxs</a> -->
								<a href="/panel/teacher/save_data/{{$date_month}}/{{$date_year}}/{{$schedule_id}}" class="btn btn-primary font-weight-bold float-right">Save</a>
                            </div>
                        </div>
                        <!--begin::Header-->
						<!-- <div class="card-header border-0 pt-5">
                            <div class="col-lg-1"><img src="{{asset('assets/media/deped2.png')}}" style="width:50px"></div>
							<div class="col-lg-10"><h3> School Form 2 Daily Attendance Report of Learners  for Senior High School (SF2-SHS) </h3></div>
                            <div class="col-lg-1"><img src="{{asset('assets/media/deped.png')}}" style="width:50px"></div>
						</div>
                        <div class="row mb-1 px-10 pb-2">
                            <div class="col-lg-4">School Name: <strong>{{$school_setting->school_name}}</strong></div>
                            <div class="col-lg-2">School ID: <strong>{{$school_setting->school_id}}</strong></div>
                            <div class="col-lg-2">District: <strong>{{$school_setting->district}}</strong></div>
                            <div class="col-lg-3">Division: <strong>{{$school_setting->division}}</strong></div>
                            <div class="col-lg-1">Region: <strong>{{$school_setting->region}}</strong></div>
                        </div>
                        <div class="row mb-1 px-10 pb-2">
                            <div class="col-lg-4">Semester: <strong>{{$school_setting->school_name}}</strong></div>
                            <div class="col-lg-2">School Year: <strong>{{$school_setting->school_id}}</strong></div>
                            <div class="col-lg-2">Grade Level: <strong>{{$school_setting->district}}</strong></div>
                            <div class="col-lg-3">Track and Strand: <strong></strong></div>
                            
                        </div>
                        <div class="row mb-2 px-10 pb-2">
                            <div class="col-lg-4">Section: <strong></strong></div>
                            <div class="col-lg-2">Course/s (only for TVL): <strong></strong></div>
                            <div class="col-lg-2">Month of: <strong></strong></div>
                        </div> -->
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-2 pb-0 mt-n3" style="width:100%; overflow:scroll;">
						<table class="table table-head-custom table-head-bg table-borderless table-vertical-center " id="subjectScheduleTable">
							<thead>
                                
								<tr class="text-left text-uppercase">
									<th style="width:auto;" class="pl-7">
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
								@foreach($students as $student_type => $student_list)
                                    
                                    @foreach($student_list as $student)
									<tr>
										<td style="width:auto;">{{$student->last_name}}, {{$student->first_name}}</td>
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
												'student_id' : {{$student->student_id}}
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

								@endforeach
							</tbody>
						</table>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Base Table Widget 10-->
					<div class="row print-content-only justify-content-center py-8 px-8 py-md-10 px-md-0">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between">
                        
                            <!-- <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Invoice</button> -->
                        </div>
                    </div>
                </div>
				</div>
                
			</div>
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
@endsection

@section('jslinks')
<script src="{{asset('js/schedules.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>  
@endsection