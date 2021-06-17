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
								<span class="card-label font-weight-bolder text-dark">Schedules</span>
								<span class="text-muted mt-3 font-weight-bold font-size-sm">List of subject schedules.
								</span>
							</h3>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-2 pb-0 mt-n3">
                            @if(session('success'))
						        <div class="alert alert-success my-10" role="alert">
						            {{ session('success') }}     
						        </div>
						    @endif
                            <form action="{{route('panel.teacher.show_attendance')}}" method="post">
                                <div class="form-group row">
                                    @csrf
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Schedule</label>
                                        <select name="schedule" id="schedule" class="form-control form-control-solid">
                                        @forelse($schedules as $schedule)
                                        <option value="{{$schedule->id}}">{{$schedule->subject->name}} | {{$schedule->subject_time}} |
                                        @foreach($schedule->days as $day)
                                        {{$day->schedule_day}}
                                        @endforeach</option>
                                        @endforeach
                                        </select>
                                        <span class="form-text text-muted">Please select schedule</span>
                                    </div>
                                    
                                    <div class="col-lg-2">
                                        <label class="col-form-label">Month</label>
                                        <select name="month" id="month" class="form-control form-control-solid">
                                            <option value="1">January</option>
                                            <option value="2">Febuary</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                        <span class="form-text text-muted">Please select month</span>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="col-form-label">School Year</label>
                                        <select name="year" id="year" class="form-control form-control-solid">
                                            <!-- @foreach($school_years as $school_year)
                                            <option value="{{$school_year->cy}}">{{$school_year->cy}}</option>
                                            @endforeach -->
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                        <span class="form-text text-muted">Please select month</span>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="col-form-label">Semester</label>
                                        <select name="semester" id="semester" class="form-control form-control-solid">
                                            <option value="1st Semester">1st Semester</option>
                                            <option value="2ne Semester">2nd Semester</option>
                                            <option value="Summer">Summer</option>
                                        </select>
                                        <span class="form-text text-muted">Please select month</span>
                                    </div>
                                    <div class="col-lg-2 pt-11">
                                        <label class="col-form-label"> &nbsp;</label>
                                        <button type="submit" class="btn btn-primary"> Show Attendance</button>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center " id="subjectScheduleTable">
                                <thead>
                                    
                                    <tr class="text-left text-uppercase">
                                        <th>Subject</th>
                                        <th>Time</th>
                                        <th>Day</th>
                                        <th>Semester</th>
                                        <th>School Year</th>
                                        <th>Filename</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($attendance_lists as $attendance_list)
                                    <tr>
                                        <td>{{$attendance_list->subject->name}}</td>
                                        <td>{{$attendance_list->schedule->subject_time}}</td>
                                        <td>{{$attendance_list->schedule->subject_days}}</td>
                                        <td>{{$attendance_list->school_year}}</td>
                                        <td>{{$attendance_list->semester}}</td>
                                        <td>{{$attendance_list->file_name}}</td>
                                        <td><a href="{{asset('/attendance')}}/{{$attendance_list->file_name}}">{{$attendance_list->file_name}}</a>   </td>
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

@section('jslinks')
<script src="{{asset('js/schedules.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>  
@endsection