@extends('layouts.panel')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">				
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			
			<!--begin::Row-->
			<div class="row">
				<div class="col-lg-12">
			
					<!--begin::Advance Table Widget 4-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						
						<div class="card-header border-0 py-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Settings</span>
								<span class="text-muted mt-3 font-weight-bold font-size-sm">ANHS-SOA Setups.</span>
							</h3>
							
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0 pb-3">
						@if(session('success'))
					        <div class="alert alert-success" role="alert">
					            {{ session('success') }}     
					        </div>
					    @endif
							<form class="form" action="{{route('panel.admin.save_setup')}}" method="post">
								@csrf
								<div class="card-body">
								
									<div class="form-group row">
										<div class="col-lg-3">
											<label>AM Login Time:</label>
											<input type="time" name="am_log_in_time" class="form-control" value="{{$settings->am_log_in_time}}">
											<span class="form-text text-muted">AM Login Time</span>
										</div>
										<div class="col-lg-3">
											<label>AM Logout Time:</label>
											<input type="time" name="am_log_out_time" class="form-control" value="{{$settings->am_log_out_time}}">
											<span class="form-text text-muted">AM Logout Time</span>
										</div>
										<div class="col-lg-3">
											<label>PM Login Time:</label>
											<input type="time" name="pm_log_in_time" class="form-control" value="{{$settings->pm_log_in_time}}">
											<span class="form-text text-muted">PM Login Time</span>
										</div>
										
										<div class="col-lg-3">
											<label>PM Logout Time:</label>
											<input type="time" name="pm_log_out_time" class="form-control" value="{{$settings->pm_log_out_time}}">
											<span class="form-text text-muted">PM Logout Time</span>
										</div>
										
									</div>
									<div class="form-group row">
										<div class="col-lg-3">
											<label>Subject Late Time:</label>
											<input type="number" name="subject_late_time" class="form-control" value="{{$settings->subject_late_time}}">
											<span class="form-text text-muted">Subject Late Time (Minutes)</span>
										</div>
										<div class="col-lg-3">
											<label>System Date:</label>
											<input type="date" name="system_date" class="form-control" value="{{$settings->system_date}}">
											<span class="form-text text-muted">Subject Late Time (Minutes)</span>
										</div>
										<div class="col-lg-3">
											<label>Use system date?</label>
											<select name="use_system_date" id="use_system_date" class="form-control form-control-solid">
											<option value="{{$settings->use_system_date}}">{{ucfirst($settings->use_system_date)}}</option>
											<option value="yes">Yes</option>
											<option value="no">No</option>
											</select>
											<span class="form-text text-muted">This will enable sms feature in the system</span>
										</div>
										<div class="col-lg-3">
											<label>Enable SMS?</label>
											<select name="sms" id="sms" class="form-control form-control-solid">
											<option value="{{$settings->sms}}">{{ucfirst($settings->sms)}}</option>
											<option value="yes">Yes</option>
											<option value="no">No</option>
											</select>
											<span class="form-text text-muted">This will enable sms feature in the system</span>
										</div>
									</div>
						
								</div>
								<div class="card-footer">
									<div class="row">
										
										<div class="col-lg-12 text-center">
										<input type="hidden" name="setting_id" class="form-control" value="{{$settings->id}}">
											<button type="submit" class="btn btn-primary mr-2"><i class="fas fa-save"></i> Save</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						<hr>
						<!--begin::Header-->
						
						<div class="card-header border-0 py-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">School Setting.</span>
								<span class="text-muted mt-3 font-weight-bold font-size-sm">ANHS-SOA School Setups.</span>
							</h3>
							
						</div>
						<!--end::Header-->
						<div class="card-body pt-0 pb-3">
						@if(session('success_attendance_setting'))
					        <div class="alert alert-success" role="alert">
					            {{ session('success_attendance_setting') }}     
					        </div>
					    @endif

							<form class="form" action="{{route('panel.admin.save_attendance_setup')}}" method="post">
								@csrf
								<div class="card-body">
								
									<div class="form-group row">
										<div class="col-lg-3">
											<label>School Name</label>
											<input type="text" name="school_name" class="form-control" value="{{$attendance_setups->school_name}}">
											<span class="form-text text-muted">School Name</span>
										</div>
										<div class="col-lg-3">
											<label>School ID</label>
											<input type="text" name="school_id" class="form-control" value="{{$attendance_setups->school_id}}">
											<span class="form-text text-muted">School ID</span>
										</div>
										<div class="col-lg-3">
											<label>District</label>
											<input type="text" name="district" class="form-control" value="{{$attendance_setups->district}}">
											<span class="form-text text-muted">District</span>
										</div>
										
										<div class="col-lg-3">
											<label>Division</label>
											<input type="text" name="division" class="form-control" value="{{$attendance_setups->division}}">
											<span class="form-text text-muted">Division</span>
										</div>
										
									</div>
									<div class="form-group row">
										<div class="col-lg-3">
											<label>Region</label>
											<input type="text" name="region" class="form-control" value="{{$attendance_setups->region}}">
											<span class="form-text text-muted">Region</span>
										</div>
										
									</div>
						
								</div>
								<div class="card-footer">
									<div class="row">
										
										<div class="col-lg-12 text-center">
										<input type="hidden" name="school_setting_id" class="form-control" value="{{$attendance_setups->id}}">
											<button type="submit" class="btn btn-primary mr-2"><i class="fas fa-save"></i> Save</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Advance Table Widget 4-->
				</div>
			</div>
			<!--end::Row-->
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
@endsection