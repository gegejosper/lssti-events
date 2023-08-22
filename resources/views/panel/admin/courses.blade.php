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
				<div class="col-lg-6">
					<!--begin::Advance Table Widget 4-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 py-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Courses</span>
							</h3>
							<div class="card-toolbar">
								<a href="javascript:;" class="btn btn-primary font-weight-bolder font-size-sm mr-3 add-course" data-toggle="modal"><i class="fas fa-plus"></i> New Course</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0 pb-3">
							<div class="tab-content">
								<!--begin::Table-->
								<div class="table-responsive">
									<table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="courseTable">
										<thead>
											<tr class="text-left text-uppercase">
												<th style="" class="pl-7">
													<span class="text-dark-75">Name</span>
												</th>
                                                <th style="min-width: 100px">Code</th>
												<th style="min-width: 100px">Status</th>
												<th style="min-width: 80px">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach($courses as $course)
											<tr class="row{{$course->id}}">
												<td class="py-8">
													<div class="d-flex align-items-center">
														<div>
															<strong>{{$course->course_name}}</strong>
														</div>
													</div>
												</td>
												<td>{{$course->course_code}}</td>
												<td>
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$course->status}}</span>
													
												</td>
												
												<td class="pr-0">
                                                <!-- <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a> -->
												<a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-course"
													data-course_id="{{$course->id}}"
													data-course_name="{{$course->course_name}}"
                                                    data-course_code="{{$course->course_code}}"
												><i class="fas fa-pen"></i></a>
												@if($course->status == 'active')
                                                <a href="javascript:;" id="modifycourse{{$course->id}}" class="btn btn-sm btn-warning modify-course"
                                                    data-course_id="{{$course->id}}"
                                                    data-course_status="inactive">
                                                    <i class="far fa-eye-slash"></i>
                                                </a>
                                                @elseif($course->status == 'inactive')
                                                <a href="javascript:;" id="modifycourse{{$course->id}}" class="btn btn-sm btn-info modify-course"
                                                    data-course_id="{{$course->id}}"
                                                    data-course_status="active">
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
<div class="modal fade" id="addCourseModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body p-1">
                @csrf
                <div class="errors"></div>
                <div class="card-body">
					<div class="">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Course</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Course name" name="course_name" id="course_name">
                                <span class="form-text text-muted">Please enter course name</span>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Course Code</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Course code" name="course_code" id="course_code">
                                <span class="form-text text-muted">Please enter course code</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-primary btn-sm font-weight-bold" id="addCourse"> <i class=" fas fa-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editCourseModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="errors"></div>
                <div class="card-body p-0">
                    <div class="">
						<div class="form-group row">
                            <label class="col-lg-2 col-form-label">Course</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="" name="edit_course_name" id="edit_course_name">
                                <span class="form-text text-muted">Please enter course name</span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Course Code</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Course code" name="edit_course_code" id="edit_course_code">
                                <span class="form-text text-muted">Please enter course code</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="edit_course_id" id="edit_course_id">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="editCourse"> <i class=" fas fa-save"></i> Update</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyCourseModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="alert alert-danger" role="alert"> Are you sure you want activate/deactivate this course?</div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="course_modify_id" id="course_modify_id">
            <input type="hidden" class="form-control" name="course_modify_status" id="course_modify_status">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="modifyCourse"> <i class=" fas fa-check"></i> Modify</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyCourseModalSuccess" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert"> Course modified</div>
            </div>
            <div class="modal-footer">
           
                <button type="button" class="btn btn-light-success btn-sm font-weight-bold closemodify" data-dismiss="modal"> <i class=" fas fa-check"></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jslinks')
<script src="{{asset('js/courses.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>  
@endsection