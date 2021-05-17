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
								<span class="card-label font-weight-bolder text-dark">Gate Attendance for {{date('M d, Y')}}</span>
								<span class="text-muted mt-3 font-weight-bold font-size-sm">Login / Logout of Students
								</span>
							</h3>
                            <div class="card-toolbar">
								<form action="{{route('panel.admin.gate_attendance')}}" method="post">
                                    @csrf
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="date_log" placeholder="Select date...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">View</button>
                                        </div>
                                    </div>
                                </form>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-10 pb-0 mt-n3 ">
                        
						<table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="LoggedTable">
							<thead>
								<tr class="text-left text-uppercase">
									<th style="" class="pl-7">
										<span class="text-dark-75">Name</span>
									</th>
                                    <th>Grade</th>
                                    <th>AM Login</th>
									<th>AM Logout</th>
									<th>PM Login</th>
									<th>PM Logout</th>
								</tr>
							</thead>
							<tbody>	
								@foreach($students as $student)
									<tr>
										<td>{{$student->first_name}} {{$student->last_name}}</td>
										<td>{{$student->grade_year}}</td>
                                        <td>
                                            @if(isset($student->student_am_login->time_log))
                                            {{$student->student_am_login->time_log}}
                                            @else
                                            <em class="text-warning">not logged</em>
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($student->student_am_logout->time_log))
                                            {{$student->student_am_logout->time_log}}
                                            @else
                                            <em class="text-warning">not logged</em>
                                            @endif
                                        </td>
										<td>
                                            @if(isset($student->student_pm_login->time_log))
                                            {{$student->student_pm_login->time_log}}
                                            @else
                                            <em class="text-warning">not logged</em>
                                            @endif
                                        </td>
										<td>
                                            @if(isset($student->student_pm_logout->time_log))
                                            {{$student->student_pm_logout->time_log}}
                                            @else
                                            <em class="text-warning">not logged</em>
                                            @endif
                                        </td>
									</tr>
								@endforeach
							</tbody>
                            
						</table>
                        {{$students->links('pagination::bootstrap-4')}}
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