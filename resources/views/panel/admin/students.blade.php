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
                        <form action="{{route('panel.admin.filter_students')}}" method="post">
                                <div class="form-group row">
                                    @csrf
                                    <div class="col-lg-2">
                                        <label class="col-form-label">School Year</label>
                                        <select name="year" id="year" class="form-control form-control-solid">
                                           <option value="2021-2022">2021-2022</option>
                                           <option value="2022-2023">2022-2023</option>
                                           <option value="2023-2024">2023-2024</option>
                                           <option value="2024-2025">2024-2025</option>
                                        </select>
                                        <span class="form-text text-muted">Please select month</span>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="col-form-label">Semester</label>
                                        <select name="semester" id="semester" class="form-control form-control-solid">
                                            <option value="1st Semester">1st Semester</option>
                                            <option value="2nd Semester">2nd Semester</option>
                                            <option value="Summer">Summer</option>
                                        </select>
                                        <span class="form-text text-muted">Please select month</span>
                                    </div>
                                    <div class="col-lg-2 pt-11">
                                        <label class="col-form-label"> &nbsp;</label>
                                        <button type="submit" class="btn btn-primary"> Students</button>
                                    </div>
                                </div>
                            </form>
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
												<th>Parent Name</th>
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
												<td>{{$student->parent_name}}</td>
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
            <div class="modal-body p-1">
                @csrf
                <div class="errors"></div>
                <div class="card-body">
                    <h4 class="mb-10 font-weight-bold text-dark">Enter the Details of the Student</h4>
                    
                    <div class="row">
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>ID #</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="id_number" id="id_number" placeholder="ID #" value="" />
                                <span class="form-text text-muted">Please enter your ID Number</span>
                            </div>
                            <!--end::Input-->
                        </div>    
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="fname" id="fname" placeholder="First Name" value="" />
                                <span class="form-text text-muted">Please enter your First Name</span>
                            </div>
                            <!--end::Input-->
                        </div>
                        <div class="col-xl-4">
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
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Parent Name</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="parent_name" id="parent_name" placeholder="Parent Name" value="" />
                                <span class="form-text text-muted">Please enter students parent name.</span>
                            </div>
                            <!--end::Input-->
                            
                        </div>
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="contact_number" id="contact_number" placeholder="0909999999" value="" />
                                <span class="form-text text-muted">Please enter your contact number.</span>
                            </div>
                            <!--end::Input-->
                            
                        </div>
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="address" id="address" placeholder="Address" value="" />
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
                                <label>Strand | Track</label>
                                <select name="strand" id="strand" class="form-control form-control-solid">
                                    @foreach($strands as $strand)
                                    <option value="{{$strand->id}}">
                                        {{$strand->name}} | {{$strand->track}}
                                    </option>
                                    @endforeach
                                </select>
                                <span class="form-text text-muted">Please select strand</span>
                            </div>
                            <!--end::Input-->
                            
                        </div>
                        
                        
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Grade</label>
                                <select name="grade" id="grade" class="form-control form-control-solid">
                                   <option value="Grade-11">Grade 11</option>
                                   <option value="Grade-12">Grade 12</option>
                                </select>
                                <span class="form-text text-muted">Please select grade</span>
                            </div>
                            <!--end::Input-->
                            
                        </div>
                        <div class="col-xl-6">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Section</label>
                                <select name="section" id="section" class="form-control form-control-solid">
                                    @foreach($sections as $section)
                                        <option value="{{$section->id}}">{{$section->section}}</option>
                                    @endforeach
                                </select>
                                <span class="form-text text-muted">Please select section</span>
                            </div>
                            <!--end::Input-->
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-primary btn-sm font-weight-bold" id="addStudent"> <i class=" fas fa-save"></i> Save</button>
            </div>
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
<script>
    $(document).ready(function () {
        $("#grade").change(function () {
			console.log('Clicked!');
            var value=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{route("panel.admin.students_search_section")}}',
                data:{'search':value},
                success:function(data){
                    //$("#loading_city_municipality").css("display", "block");
                    setTimeout(function(){
                        //$("#loading_city_municipality").css("display", "none");
                        //$("#municipality").css("display", "block");
                        $('#section').find('option').remove().end();
                        $('#section').append(data);
                    },500);
                } 
            });
        });

    });
</script>
<script src="{{asset('js/students.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>  
@endsection