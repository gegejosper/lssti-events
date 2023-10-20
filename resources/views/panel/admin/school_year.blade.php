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
								<span class="card-label font-weight-bolder text-dark">School Years</span>
							</h3>
							<div class="card-toolbar">
								<a href="javascript:;" class="btn btn-primary font-weight-bolder font-size-sm mr-3 add-school_year" data-toggle="modal"><i class="fas fa-plus"></i> New School_year</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0 pb-3">
							<div class="tab-content">
								<!--begin::Table-->
								<div class="table-responsive">
									<table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="school_yearTable">
										<thead>
											<tr class="text-left text-uppercase">
												<th style="" class="pl-7">
													<span class="text-dark-75">School Year</span>
												</th>
												<th style="min-width: 100px">Semester</th>
												<th style="min-width: 100px">Status</th>
												<th style="min-width: 80px"></th>
											</tr>
										</thead>
										<tbody>
											@foreach($school_years as $school_year)
											<tr class="row{{$school_year->id}}">
												<td class="py-8">
													<div class="d-flex align-items-center">
														<div>
															<strong>{{$school_year->cy}}</strong>
														</div>
													</div>
												</td>
												<td>
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$school_year->semester}}</span>
												</td>
												<td>
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$school_year->status}}</span>
													
												</td>
												
												<td class="pr-0 text-right">
												<a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-school_year"
													data-school_year_id="{{$school_year->id}}"
													data-school_year="{{$school_year->cy}}"
													data-semester="{{$school_year->semester}}"
												><i class="fas fa-pen"></i></a>
												@if($school_year->status == 'active')
                                                <a href="javascript:;" id="modifyschool_year{{$school_year->id}}" class="btn btn-sm btn-warning modify-school_year"
                                                    data-school_year_id="{{$school_year->id}}"
                                                    data-school_year_status="inactive">
                                                    <i class="far fa-eye-slash"></i>
                                                </a>
                                                @elseif($school_year->status == 'inactive')
                                                <a href="javascript:;" id="modifyschool_year{{$school_year->id}}" class="btn btn-sm btn-info modify-school_year"
                                                    data-school_year_id="{{$school_year->id}}"
                                                    data-school_year_status="active">
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
<div class="modal fade" id="addSchool_yearModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New School_year</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body p-1">
                @csrf
                <div class="errors"></div>
                <div class="card-body">
                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">School Year Details</h3>
                    <hr>
					<div class="">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">School Year</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="2021-2022" name="school_year" id="school_year">
                                <span class="form-text text-muted">Please enter school year</span>
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-lg-3 col-form-label">Semester</label>
                            <div class="col-lg-9">
                                <select name="semester" id="semester" class="form-control">
                                    <option value="1st Semester">1st Semester</option>
                                    <option value="2nd Semester">2nd Semester</option>
                                    <option value="Summer">Summer</option>
                                </select>
                                <span class="form-text text-muted">Please select semester</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-primary btn-sm font-weight-bold" id="addSchool_year"> <i class=" fas fa-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editSchool_yearModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit School_year</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="errors"></div>
                <div class="card-body p-0">
                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">School_year Details</h3>
					<hr>
                    <div class="">
						<div class="form-group row">
                            <label class="col-lg-3 col-form-label">School Year</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="2020-2021" name="edit_school_year" id="edit_school_year">
                                <span class="form-text text-muted">Please enter school year</span>
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-lg-3 col-form-label">Semester:</label>
                            <div class="col-lg-9">
                                <select name="edit_semester" id="edit_semester" class="form-control">
                                    <option value="1st Semester">1st Semester</option>
                                    <option value="2nd Semester">2nd Semester</option>
                                    <option value="Summer">Summer</option>
                                </select>
                                <span class="form-text text-muted">Please select semester</span>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="edit_school_year_id" id="edit_school_year_id">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="editSchool_year"> <i class=" fas fa-save"></i> Update</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifySchool_yearModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify School_year</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="alert alert-danger" role="alert"> Are you sure you want activate/deactivate this school_year?</div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="school_year_modify_id" id="school_year_modify_id">
            <input type="hidden" class="form-control" name="school_year_modify_status" id="school_year_modify_status">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="modifySchool_year"> <i class=" fas fa-check"></i> Modify</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifySchool_yearModalSuccess" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify School_year</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert"> School Year modified</div>
            </div>
            <div class="modal-footer">
           
                <button type="button" class="btn btn-light-success btn-sm font-weight-bold closemodify" data-dismiss="modal"> <i class=" fas fa-check"></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jslinks')
<script src="{{secure_asset('js/school_years.js')}}"></script>
<script src="{{secure_asset('js/app.js')}}"></script>  
@endsection