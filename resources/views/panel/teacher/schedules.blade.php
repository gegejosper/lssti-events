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
								<span class="card-label font-weight-bolder text-dark">Schedules</span>
								<span class="text-muted mt-3 font-weight-bold font-size-sm">List of subject schedules.
								</span>
							</h3>
                            <div class="card-toolbar">
								<a href="javascript:;" class="btn btn-primary font-weight-bolder font-size-sm mr-3 add-schedule" data-toggle="modal"><i class="fas fa-plus"></i> New Schedule</a>
							</div>
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
									<th>Time</th>
									<th>Day</th>
									<th>Semester</th>
                                    <th>Status</th>
                                    <th></th>
								</tr>
							</thead>
							<tbody>	
                            @forelse($schedules as $schedule)
                            <tr>
                                <td>{{$schedule->subject->name}}</td>
                                <td>{{$schedule->subject_time}}</td>
                                <td>
                                    @foreach($schedule->days as $day)
                                    {{$day->schedule_day}}
                                    @endforeach
                                    </td>
                                <td>{{$schedule->schoolyear->semester}} | {{$schedule->schoolyear->cy}}</td>
                                <td>{{$schedule->status}}</td>
                                <td>
                                    <a href="/panel/teacher/schedule/view/{{$schedule->id}}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                                    
                                    @if($schedule->status == 'active')
                                    <a href="javascript:;" id="modifyschedule{{$schedule->id}}" class="btn btn-sm btn-warning modify-schedule btn-sm"
                                        data-schedule_id="{{$schedule->id}}"
                                        data-schedule_status="inactive">
                                        <i class="far fa-eye-slash"></i>
                                    </a>
                                    @elseif($schedule->status == 'inactive')
                                    <a href="javascript:;" id="modifyschedule{{$schedule->id}}" class="btn btn-sm btn-info modify-schedule btn-sm"
                                        data-schedule_id="{{$schedule->id}}"
                                        data-schedule_status="active">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    @else
                                    @endif
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
<!-- Modal-->
<div class="modal fade" id="addScheduleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body p-1">
                @csrf
                <div class="errors"></div>
                <div class="card-body">
                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Schedule Details</h3>
					<hr>
                    <div class="">
						<div class="form-group row">
                            <label class="col-lg-1 col-form-label">Subject</label>
                            <div class="col-lg-5">
                                <select name="subject" id="subject" class="form-control form-control-solid">
                                   @foreach($subjects as $subject)
                                   <option value="{{$subject->id}}">{{$subject->name}}</option>
                                   @endforeach
                                </select>
                                <span class="form-text text-muted">Please select subject</span>
                            </div>
                            <label class="col-lg-1 col-form-label">Time</label>
                            <div class="col-lg-5">

                                <input type="time" class="form-control form-control-solid" name="subject_time" id="subject_time">
                                <span class="form-text text-muted">Please enter subject time</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Days</label>
                                    <div class="checkbox-inline">
                                        <label class="checkbox">
                                        <input type="checkbox" checked="checked" name="subject_days[]" value="Mon" class="subject_days">
                                        <span></span>Monday</label>
                                        <label class="checkbox">
                                        <input type="checkbox" name="subject_days[]" value="Tue" class="subject_days">
                                        <span></span>Tuesday</label>
                                        <label class="checkbox">
                                        <input type="checkbox" name="subject_days[]" value="Wed" class="subject_days">
                                        <span></span>Wednesday</label>
                                        <label class="checkbox">
                                        <input type="checkbox" name="subject_days[]" value="Thu" class="subject_days">
                                        <span></span>Thursday</label>
                                        <label class="checkbox">
                                        <input type="checkbox" name="subject_days[]" value="Fri" class="subject_days">
                                        <span></span>Friday</label>
                                    </div>
                                    <span class="form-text text-muted">Please enter subject days</span>
                                </div>
                               
                            </div>
                        </div>	
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-primary btn-sm font-weight-bold" id="addSchedule"> <i class=" fas fa-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editScheduleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="errors"></div>
                <div class="card-body p-0">
                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Schedule Details</h3>
					<hr>
                    <div class="">
						<div class="form-group row">
                            <label class="col-lg-1 col-form-label">Schedule</label>
                            <div class="col-lg-5">
                                <select name="edit_track" id="edit_track" class="form-control form-control-solid">
                                   @foreach($subjects as $subject)
                                   <option value="{{$subject->id}}">{{$subject->name}}</option>
                                   @endforeach
                                </select>
                                <span class="form-text text-muted">Please select subject</span>
                            </div>
                            <label class="col-lg-1 col-form-label">Time</label>
                            <div class="col-lg-5">

                                <input type="time" class="form-control form-control-solid" name="subject_time" id="subject_time">
                                <span class="form-text text-muted">Please enter subject time</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Days</label>
                            <div class="col-lg-11">
                                <div class="form-group">
                                    <label>Inline Checkboxes</label>
                                    <div class="checkbox-inline">
                                        <label class="checkbox">
                                        <input type="checkbox" checked="checked" name="Checkboxes3">
                                        <span></span>Option 1</label>
                                        <label class="checkbox">
                                        <input type="checkbox" name="Checkboxes3">
                                        <span></span>Option 2</label>
                                        <label class="checkbox">
                                        <input type="checkbox" checked="checked" name="Checkboxes3">
                                        <span></span>Option 3</label>
                                    </div>
                                    <span class="form-text text-muted">Some help text goes here</span>
                                </div>
                                <span class="form-text text-muted">Please select grade</span>
                            </div>
                        </div>	
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="edit_schedule_id" id="edit_schedule_id">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="editSchedule"> <i class=" fas fa-save"></i> Update</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyScheduleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="alert alert-danger" role="alert"> Are you sure you want activate/deactivate this schedule?</div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="schedule_modify_id" id="schedule_modify_id">
            <input type="hidden" class="form-control" name="schedule_modify_status" id="schedule_modify_status">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="modifySchedule"> <i class=" fas fa-check"></i> Modify</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyScheduleModalSuccess" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert"> Schedule modified</div>
            </div>
            <div class="modal-footer">
           
                <button type="button" class="btn btn-light-success btn-sm font-weight-bold closemodify" data-dismiss="modal"> <i class=" fas fa-check"></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jslinks')
<script src="{{asset('js/schedules.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>  
@endsection