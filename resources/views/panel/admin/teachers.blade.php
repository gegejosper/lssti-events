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
								<span class="card-label font-weight-bolder text-dark">Teachers</span>
							</h3>
							<div class="card-toolbar">
								<a href="javascript:;" class="btn btn-primary font-weight-bolder font-size-sm mr-3 add-teacher" data-toggle="modal"><i class="fas fa-plus"></i> New Teacher</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0 pb-3">
							<div class="tab-content">
								<!--begin::Table-->
								<div class="table-responsive">
									<table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="teacherTable">
										<thead>
											<tr class="text-left text-uppercase">
												<th style="" class="pl-7">
													<span class="text-dark-75">Name</span>
												</th>
                                                <th>Contact Number</th>
                                                <th>Address</th>
												<th style="min-width: 100px">Status</th>
												<th style="min-width: 80px"></th>
											</tr>
										</thead>
										<tbody>
											@foreach($teachers as $teacher)
											<tr class="row{{$teacher->id}}">
												<td class="py-8">
													<div class="d-flex align-items-center">
														<div>
															<strong>{{$teacher->first_name}} {{$teacher->last_name}}</strong>
														</div>
													</div>
												</td>
												
												<td>{{$teacher->contact_number}}</td>
                                                <td>{{$teacher->address}}</td>
                                                <td>
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$teacher->status}}</span>
												</td>
												<td class="pr-0 text-right">
                                                <a href="/panel/admin/teacher/{{$teacher->id}}" class="btn btn-light-success font-weight-bolder font-size-sm btn-sm"><i class="fas fa-search"></i></a>
												<a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-teacher btn-sm"
													data-teacher_id="{{$teacher->id}}"
													data-fname="{{$teacher->name}}"
                                                    data-lname="{{$teacher->name}}"
                                                    data-contact_number="{{$teacher->name}}"
                                                    data-address="{{$teacher->name}}"
												><i class="fas fa-pen"></i></a>
												@if($teacher->status == 'active')
                                                <a href="javascript:;" id="modifyteacher{{$teacher->id}}" class="btn btn-sm btn-warning modify-teacher btn-sm"
                                                    data-teacher_id="{{$teacher->id}}"
                                                    data-teacher_status="inactive">
                                                    <i class="far fa-eye-slash"></i>
                                                </a>
                                                @elseif($teacher->status == 'inactive')
                                                <a href="javascript:;" id="modifyteacher{{$teacher->id}}" class="btn btn-sm btn-info modify-teacher btn-sm"
                                                    data-teacher_id="{{$teacher->id}}"
                                                    data-teacher_status="active">
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
<div class="modal fade" id="addTeacherModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body p-1">
                @csrf
                <div class="errors"></div>
                <div class="card-body">
                    <h4 class="mb-10 font-weight-bold text-dark">Enter the Details of the Teacher</h4>
                    
                    <div class="row">
                        <div class="col-xl-6">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="fname" id="fname" placeholder="First Name" value="" />
                                <span class="form-text text-muted">Please enter your First Name</span>
                            </div>
                            <!--end::Input-->
                        </div>
                        <div class="col-xl-6">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="lname" id="lname" placeholder="Last Name" value="" />
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
                                <input type="text" class="form-control form-control-solid form-control-lg" name="contact_number" id="contact_number" placeholder="0909999999" value="" />
                                <span class="form-text text-muted">Please enter your contact number.</span>
                            </div>
                            <!--end::Input-->
                            
                        </div>
                        <div class="col-xl-6">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Address / House No.</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="address" id="address" placeholder="Address" value="" />
                                <span class="form-text text-muted">Please enter your house number.</span>
                            </div>
                            <!--end::Input-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-primary btn-sm font-weight-bold" id="addTeacher"> <i class=" fas fa-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editTeacherModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="errors"></div>
                <div class="card-body p-0">
                    
                <h4 class="mb-10 font-weight-bold text-dark">Update the Details of the Teacher</h4>
                    
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
            <input type="hidden" class="form-control" name="edit_teacher_id" id="edit_teacher_id">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="editTeacher"> <i class=" fas fa-save"></i> Update</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyTeacherModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="alert alert-danger" role="alert"> Are you sure you want activate/deactivate this teacher?</div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="teacher_modify_id" id="teacher_modify_id">
            <input type="hidden" class="form-control" name="teacher_modify_status" id="teacher_modify_status">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="modifyTeacher"> <i class=" fas fa-check"></i> Modify</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyTeacherModalSuccess" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert"> Teacher modified</div>
            </div>
            <div class="modal-footer">
           
                <button type="button" class="btn btn-light-success btn-sm font-weight-bold closemodify" data-dismiss="modal"> <i class=" fas fa-check"></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jslinks')
<script src="{{secure_asset('js/teachers.js')}}"></script>
<script src="{{secure_asset('js/app.js')}}"></script>  
@endsection