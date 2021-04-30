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
								<span class="card-label font-weight-bolder text-dark">Employees</span>
								<span class="text-muted mt-3 font-weight-bold font-size-sm">List of Jujiedso internet employees listed here.</span>
							</h3>
							<div class="card-toolbar">
								<a href="javascript:;" class="btn btn-primary font-weight-bolder font-size-sm mr-3 add-employee" data-toggle="modal"><i class="fas fa-plus"></i> New Employee</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0 pb-3">
							<div class="tab-content">
								<!--begin::Table-->
								<div class="table-responsive">
									<table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="employeeTable">
										<thead>
											<tr class="text-left text-uppercase">
												<th style="min-width: 250px" class="pl-7">
													<span class="text-dark-75">Name</span>
												</th>
												<th style="min-width: 100px">Position</th>
												<th style="min-width: 100px">Status</th>
												<th style="min-width: 80px"></th>
											</tr>
										</thead>
										<tbody>
											@foreach($employees as $employee)
											<tr class="row{{$employee->id}}">
												<td class="py-8">
													<div class="d-flex align-items-center">
														<div>
															<a href="/panel/admin/employees/{{$employee->id}}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$employee->fname}} {{$employee->lname}}</a>
														</div>
													</div>
												</td>
												<td>
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$employee->position}}</span>
												</td>
												<td>
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$employee->status}}</span>
													
												</td>
												
												<td class="pr-0 text-right">
													<a href="/panel/admin/employees/{{$employee->id}}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
												<a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-employee"
													data-employee_id="{{$employee->id}}"
													data-employee_fname="{{$employee->fname}}"
													data-employee_lname="{{$employee->lname}}"
													data-employee_position="{{$employee->position}}"
												><i class="fas fa-pen"></i></a>
												@if($employee->status == 'active')
                                                <a href="javascript:;" id="modifyemployee{{$employee->id}}" class="btn btn-sm btn-warning modify-employee"
                                                    data-employee_id="{{$employee->id}}"
                                                    data-employee_status="inactive">
                                                    <i class="far fa-eye-slash"></i>
                                                </a>
                                                @elseif($employee->status == 'inactive')
                                                <a href="javascript:;" id="modifybank{{$employee->id}}" class="btn btn-sm btn-info modify-employee"
                                                    data-employee_id="{{$employee->id}}"
                                                    data-employee_status="active">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                @else
                                                @endif
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								<!--end::Table-->
							</div>
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
<!-- Modal-->
<div class="modal fade" id="addEmployeeModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body p-1">
                @csrf
                <div class="errors"></div>
                <div class="card-body">
                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Employee Details</h3>
                    <hr>
					<div class="">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">First Name:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Employee first name " name="employee_fname" id="employee_fname">
                                <span class="form-text text-muted">Please enter employee first name</span>
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-lg-3 col-form-label">Last Name:</label>
                            <div class="col-lg-9">
                               <input type="text" name="employee_lname" id="employee_lname" class="form-control" placeholder="Employee last name">
                                <span class="form-text text-muted">Please enter employee last name</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Position:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="employee_position" id="employee_position" >
                                <span class="form-text text-muted">Please put employee position</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-primary btn-sm font-weight-bold" id="addEmployee"> <i class=" fas fa-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editEmployeeModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="errors"></div>
                <div class="card-body p-0">
                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Employee Details</h3>
					<hr>
                    <div class="">
						<div class="form-group row">
                            <label class="col-lg-3 col-form-label">First Name:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Employee first name" name="edit_employee_fname" id="edit_employee_fname">
                                <span class="form-text text-muted">Please enter employee first name</span>
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-lg-3 col-form-label">Last Name:</label>
                            <div class="col-lg-9">
                               <input type="text" name="edit_employee_lname" id="edit_employee_lname" placeholder="Employee last name" class="form-control">
                                <span class="form-text text-muted">Please enter employee last name</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Position:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="edit_employee_position" id="edit_employee_position">
                                <span class="form-text text-muted">Please put employee position</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="edit_employee_id" id="edit_employee_id">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="editEmployee"> <i class=" fas fa-save"></i> Update</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyEmployeeModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="alert alert-danger" role="alert"> Are you sure you want activate/deactivate this employee?</div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="employee_modify_id" id="employee_modify_id">
            <input type="hidden" class="form-control" name="employee_modify_status" id="employee_modify_status">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="modifyEmployee"> <i class=" fas fa-check"></i> Modify</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyEmployeeModalSuccess" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert"> Employee modified</div>
            </div>
            <div class="modal-footer">
           
                <button type="button" class="btn btn-light-success btn-sm font-weight-bold closemodify" data-dismiss="modal"> <i class=" fas fa-check"></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jslinks')
<script src="{{asset('js/employees.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>  
@endsection