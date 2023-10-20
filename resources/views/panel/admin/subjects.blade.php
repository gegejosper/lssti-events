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
								<span class="card-label font-weight-bolder text-dark">Subjects</span>
							</h3>
							<div class="card-toolbar">
								<a href="javascript:;" class="btn btn-primary font-weight-bolder font-size-sm mr-3 add-subject" data-toggle="modal"><i class="fas fa-plus"></i> New Subject</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0 pb-3">
							<div class="tab-content">
								<!--begin::Table-->
								<div class="table-responsive">
									<table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="subjectTable">
										<thead>
											<tr class="text-left text-uppercase">
												<th style="" class="pl-7">
													<span class="text-dark-75">Name</span>
												</th>
                                                
												<th style="min-width: 100px">Status</th>
												<th style="min-width: 80px">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach($subjects as $subject)
											<tr class="row{{$subject->id}}">
												<td class="py-8">
													<div class="d-flex align-items-center">
														<div>
															<strong>{{$subject->name}}</strong>
														</div>
													</div>
												</td>
												
												<td>
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$subject->status}}</span>
													
												</td>
												
												<td class="pr-0">
                                                <a href="/panel/admin/subject/{$subject->id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
												<a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-subject"
													data-subject_id="{{$subject->id}}"
													data-subject="{{$subject->name}}"
												><i class="fas fa-pen"></i></a>
												@if($subject->status == 'active')
                                                <a href="javascript:;" id="modifysubject{{$subject->id}}" class="btn btn-sm btn-warning modify-subject"
                                                    data-subject_id="{{$subject->id}}"
                                                    data-subject_status="inactive">
                                                    <i class="far fa-eye-slash"></i>
                                                </a>
                                                @elseif($subject->status == 'inactive')
                                                <a href="javascript:;" id="modifysubject{{$subject->id}}" class="btn btn-sm btn-info modify-subject"
                                                    data-subject_id="{{$subject->id}}"
                                                    data-subject_status="active">
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
<div class="modal fade" id="addSubjectModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body p-1">
                @csrf
                <div class="errors"></div>
                <div class="card-body">
                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Subject Details</h3>
                    <hr>
					<div class="">
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Subject</label>
                            <div class="col-lg-11">
                                <input type="text" class="form-control" placeholder="Subject name" name="subject" id="subject">
                                <span class="form-text text-muted">Please enter subject name</span>
                            </div>
                            
                        </div>
						
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-primary btn-sm font-weight-bold" id="addSubject"> <i class=" fas fa-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editSubjectModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="errors"></div>
                <div class="card-body p-0">
                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Subject Details</h3>
					<hr>
                    <div class="">
						<div class="form-group row">
                            <label class="col-lg-1 col-form-label">Subject</label>
                            <div class="col-lg-11">
                                <input type="text" class="form-control" placeholder="" name="edit_subject" id="edit_subject">
                                <span class="form-text text-muted">Please enter subject name</span>
                            </div>
                           
                        </div>
					
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="edit_subject_id" id="edit_subject_id">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="editSubject"> <i class=" fas fa-save"></i> Update</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifySubjectModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="alert alert-danger" role="alert"> Are you sure you want activate/deactivate this subject?</div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="subject_modify_id" id="subject_modify_id">
            <input type="hidden" class="form-control" name="subject_modify_status" id="subject_modify_status">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="modifySubject"> <i class=" fas fa-check"></i> Modify</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifySubjectModalSuccess" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert"> Subject modified</div>
            </div>
            <div class="modal-footer">
           
                <button type="button" class="btn btn-light-success btn-sm font-weight-bold closemodify" data-dismiss="modal"> <i class=" fas fa-check"></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jslinks')
<script src="{{secure_asset('js/subjects.js')}}"></script>
<script src="{{secure_asset('js/app.js')}}"></script>  
@endsection