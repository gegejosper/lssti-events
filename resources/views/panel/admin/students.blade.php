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
								<span class="card-label font-weight-bolder text-dark">Students</span>
							</h3>
							<div class="card-toolbar">
								<a href="javascript:;" class="btn btn-primary font-weight-bolder font-size-sm mr-3 add-student" data-toggle="modal"><i class="fas fa-plus"></i> New Student</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0 pb-3">
                       
							<div class="tab-content">
								<!--begin::Table-->
								<div class="table-responsive">
									<table class="table table-head-custom table-head-bg table-borderless table-vertical-center" >
										<thead>
											<tr class="text-left text-uppercase">
												<th style="">
													<span class="text-dark-75">ID #</span>
												</th>
												<th style="" class="pl-7">
													<span class="text-dark-75">Name</span>
												</th>
												<th>Course</th>
                                                <th>Contact Number</th>
                        
												<th style="min-width: 100px">Status</th>
												<th style="min-width: 80px"></th>
											</tr>
										</thead>
										<tbody id="studentTable">
											@foreach($students as $student)
											<tr class="row{{$student->id}}">
												<td>{{$student->id_number}}</td>
												<td class="py-8">
													<div class="d-flex align-items-center">
														<div>
															<strong>{{$student->first_name}} {{$student->last_name}}</strong>
														</div>
													</div>
												</td>
												<td>{{$student->course}}</td>
												<td>{{$student->contact_number}}</td>
                                                
                                                <td>
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$student->status}}</span>
												</td>
												<td class="pr-0 text-right">
                                                <a href="/panel/admin/student/{{$student->id}}" class="btn btn-light-success font-weight-bolder font-size-sm btn-sm"><i class="fas fa-search"></i></a>
												<a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-student btn-sm"
													data-student_id="{{$student->id}}"
													data-fname="{{$student->name}}"
                                                    data-lname="{{$student->name}}"
                                                    data-contact_number="{{$student->name}}"
                                                    data-address="{{$student->name}}"
												><i class="fas fa-pen"></i></a>
												@if($student->status == 'active')
                                                <a href="javascript:;" id="modifystudent{{$student->id}}" class="btn btn-sm btn-warning modify-student btn-sm"
                                                    data-student_id="{{$student->id}}"
                                                    data-student_status="inactive">
                                                    <i class="far fa-eye-slash"></i>
                                                </a>
                                                @elseif($student->status == 'inactive')
                                                <a href="javascript:;" id="modifystudent{{$student->id}}" class="btn btn-sm btn-info modify-student btn-sm"
                                                    data-student_id="{{$student->id}}"
                                                    data-student_status="active">
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
<div class="modal fade" id="addStudentModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="form_student">
                <div class="modal-body p-1">
                        @csrf
                        <div class="errors"></div>
                        <div class="card-body">
                            <h4 class="mb-10 font-weight-bold text-dark">Enter the Details of the Student</h4>
                            
                            <div class="row">
                            
                                <div class="col-xl-4">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control form-control-solid form-control-lg" name="fname" id="fname" placeholder="First Name" value="" required/>
                                        <span class="form-text text-muted">Please enter your First Name</span>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <div class="col-xl-4">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label>Middle Name</label>
                                        <input type="text" class="form-control form-control-solid form-control-lg" name="mname" id="mname" placeholder="Last Name" value="" required/>
                                        <span class="form-text text-muted">Please enter your Middle Name</span>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <div class="col-xl-4">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control form-control-solid form-control-lg" name="lname" id="lname" placeholder="Last Name" value="" required/>
                                        <span class="form-text text-muted">Please enter your Last Name</span>
                                    </div>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label>ID #</label>
                                        <input type="text" class="form-control form-control-solid form-control-lg" name="id_number" id="id_number" placeholder="ID #" value="" required/>
                                        <span class="form-text text-muted">Please enter your ID Number</span>
                                    </div>
                                    <!--end::Input-->
                                </div>    
                                <div class="col-xl-4">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input type="text" class="form-control form-control-solid form-control-lg" name="contact_number" id="contact_number" placeholder="0909999999" value="" required/>
                                        <span class="form-text text-muted">Please enter your contact number.</span>
                                    </div>
                                    <!--end::Input-->
                                    
                                </div>
                                <div class="col-xl-4">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control form-control-solid form-control-lg" name="address" id="address" placeholder="Address" value="" required/>
                                        <span class="form-text text-muted">Please enter student address</span>
                                    </div>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" id="gender" class="form-control form-control-solid">
                                            <option value="MALE">MALE</option>
                                            <option value="FEMALE">FEMALE</option>
                                        </select>
                                        <span class="form-text text-muted">Please select gender</span>
                                    </div>
                                    <!--end::Input-->
                                    
                                </div>
                                <div class="col-xl-6">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label>Course</label>
                                        <select name="course" id="course" class="form-control form-control-solid" required>
                                            <option></option>
                                            @foreach($courses as $course)
                                                <option value="{{$course->course_code}}">{{$course->course_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted">Please select course</span>
                                    </div>
                                    <!--end::Input-->
                                    
                                </div>
                            
                            </div>
                        </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold"> <i class=" fas fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editStudentModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="errors"></div>
                <div class="card-body p-0">
                    
                <h4 class="mb-10 font-weight-bold text-dark">Update the Details of the Student</h4>
                    
                    <div class="row">
                        <div class="col-xl-6">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="edit_fname" id="edit_fname" placeholder="First Name" value="" />
                                <span class="form-text text-muted">Please enter your First Name</span>
                            </div>
                            <!--end::Input-->
                        </div>
                        <div class="col-xl-6">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="edit_lname" id="edit_lname" placeholder="Last Name" value="" />
                                <span class="form-text text-muted">Please enter your Last Name</span>
                            </div>
                            <!--end::Input-->
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="edit_contact_number" id="edit_contact_number" placeholder="0909999999" value="" />
                                <span class="form-text text-muted">Please enter your contact number.</span>
                            </div>
                            <!--end::Input-->
                            
                        </div>
                        <div class="col-xl-6">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Address / House No.</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="edit_address" id="edit_address" placeholder="Address" value="" />
                                <span class="form-text text-muted">Please enter your house number.</span>
                            </div>
                            <!--end::Input-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="edit_student_id" id="edit_student_id">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="editStudent"> <i class=" fas fa-save"></i> Update</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyStudentModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="alert alert-danger" role="alert"> Are you sure you want activate/deactivate this student?</div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="student_modify_id" id="student_modify_id">
            <input type="hidden" class="form-control" name="student_modify_status" id="student_modify_status">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="modifyStudent"> <i class=" fas fa-check"></i> Modify</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyStudentModalSuccess" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert"> Student modified</div>
            </div>
            <div class="modal-footer">
           
                <button type="button" class="btn btn-light-success btn-sm font-weight-bold closemodify" data-dismiss="modal"> <i class=" fas fa-check"></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jslinks')

<script src="{{asset('js/students.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>  
@endsection