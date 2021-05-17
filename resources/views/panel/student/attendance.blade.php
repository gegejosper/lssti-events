@extends('layouts.panel')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">				
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			<div class="row">
				<div class="col-lg-10">
					<!--begin::Base Table Widget 10-->
					<div class="card card-custom gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 pt-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">List of Subject enrolled</span>
							</h3>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-2 pb-0 mt-n3">
						<table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="subjectScheduleTable">
							<thead>
								<tr class="text-left text-uppercase">
									<th style="" class="pl-7">
										<span class="text-dark-75">Subject</span>
									</th>
                                    <th style="" class="pl-7">
										<span class="text-dark-75">Teacher</span>
									</th>
									<th>Time</th>
									<th>Day</th>
									<th>Semester</th>
                                   
                                    <th></th>
								</tr>
							</thead>
							<tbody>	
                            @forelse($subjects as $subject)
                            <tr>
                                <td>{{$subject->subject->name}}</td>
                                <td>{{$subject->teacher->first_name}} {{$subject->teacher->last_name}}</td>
                                <td>{{$subject->schedule->subject_time}}</td>
                                <td>
                                    @foreach($subject->schedule->days as $day)
                                    {{$day->schedule_day}}
                                    @endforeach
                                    </td>
                                <td>{{$subject->schoolyear->semester}} | {{$subject->schoolyear->cy}}</td>
                               
                                <td>
                                    <a href="/panel/student/attendance/view/{{$subject->schedule_id}}" class="btn btn-light-success font-weight-bolder font-size-sm"
                                        ><i class="fas fa-search"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">
                                    <em>No Schedules</em>
                                </td>
                            </tr>
                            @endforelse
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
<div class="modal fade" id="modifyEnrollModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enroll subject confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="alert alert-danger" role="alert"> Are you sure you to enroll on this subject?</div>
            </div>
            <div class="modal-footer">
                <input type="hidden" class="form-control" name="schedule_id" id="schedule_id">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="processEnroll"> <i class=" fas fa-check"></i> Yes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyEnrollModalSuccess" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enroll subject confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert"> Successfully enrolled</div>
            </div>
            <div class="modal-footer">
           
                <button type="button" class="btn btn-light-success btn-sm font-weight-bold closemodify" data-dismiss="modal"> <i class=" fas fa-check"></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jslinks')
<script src="{{asset('js/enroll.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>  
@endsection