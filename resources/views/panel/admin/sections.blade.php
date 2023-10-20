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
				<div class="col-lg-8">
					<!--begin::Advance Table Widget 4-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 py-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Sections</span>
							</h3>
							<div class="card-toolbar">
								<a href="javascript:;" class="btn btn-primary font-weight-bolder font-size-sm mr-3 add-section" data-toggle="modal"><i class="fas fa-plus"></i> New Section</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0 pb-3">
							<div class="tab-content">
								<!--begin::Table-->
								<div class="table-responsive">
									<table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="sectionTable">
										<thead>
											<tr class="text-left text-uppercase">
												<th style="" class="pl-7">
													<span class="text-dark-75">Name</span>
												</th>
                                                <th style="" class="pl-7">
													<span class="text-dark-75">Track</span>
												</th>
                                                <th style="" class="pl-7">
													<span class="text-dark-75">Grade</span>
												</th>
												<th class="pl-7">
                                                <span class="text-dark-75">Status</span></th>
												<th style="min-width: 80px">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach($sections as $section)
											<tr class="row{{$section->id}}">
												<td class="py-8">
													<div class="d-flex align-items-center">
														<div>
															<strong>{{$section->section}}</strong>
														</div>
													</div>
												</td>
												<td>{{$section->track}}</td>
                                                <td>{{$section->grade_year}}</td>
												<td>
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$section->status}}</span>
													
												</td>
												
												<td class="pr-0">
                                                <a href="/panel/admin/section/{$section->id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
												<a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-section"
													data-section_id="{{$section->id}}"
													data-section="{{$section->section}}"
												><i class="fas fa-pen"></i></a>
												@if($section->status == 'active')
                                                <a href="javascript:;" id="modifysection{{$section->id}}" class="btn btn-sm btn-warning modify-section"
                                                    data-section_id="{{$section->id}}"
                                                    data-section_status="inactive">
                                                    <i class="far fa-eye-slash"></i>
                                                </a>
                                                @elseif($section->status == 'inactive')
                                                <a href="javascript:;" id="modifysection{{$section->id}}" class="btn btn-sm btn-info modify-section"
                                                    data-section_id="{{$section->id}}"
                                                    data-section_status="active">
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
<div class="modal fade" id="addSectionModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body p-1">
                @csrf
                <div class="errors"></div>
                <div class="card-body">
                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Section Details</h3>
                    <hr>
					<div class="">
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Section</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" placeholder="Section name" name="section" id="section">
                                <span class="form-text text-muted">Please enter section name</span>
                            </div>
                            <label class="col-lg-1 col-form-label">Track</label>
                            <div class="col-lg-5">
                                <select name="track" id="track" class="form-control form-control-solid">
                                    <option value="ACADEMIC">ACADEMIC</option>
                                    <option value="TVL">TVL</option>
                                    <option value="SPORTS-ARTS">SPORTS-ARTS</option>
                                </select>
                                <span class="form-text text-muted">Please enter section name</span>
                            </div>
                        </div>	
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Grade</label>
                            <div class="col-lg-11">
                                <select name="grade_year" id="grade_year" class="form-control form-control-solid">
                                   <option value="Grade-11">Grade 11</option>
                                   <option value="Grade-12">Grade 12</option>
                                </select>
                                <span class="form-text text-muted">Please select grade</span>
                            </div>
                        </div>	
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-primary btn-sm font-weight-bold" id="addSection"> <i class=" fas fa-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editSectionModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="errors"></div>
                <div class="card-body p-0">
                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Section Details</h3>
					<hr>
                    <div class="">
						<div class="form-group row">
                            <label class="col-lg-1 col-form-label">Section</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" placeholder="" name="edit_section" id="edit_section">
                                <span class="form-text text-muted">Please enter section name</span>
                            </div>
                            <label class="col-lg-1 col-form-label">Track</label>
                            <div class="col-lg-5">
                                
                                <select name="edit_track" id="edit_track" class="form-control form-control-solid">
                                    <option value="ACADEMIC">ACADEMIC</option>
                                    <option value="TVL">TVL</option>
                                    <option value="SPORTS-ARTS">SPORTS-ARTS</option>
                                </select>
                                <span class="form-text text-muted">Please enter section name</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Grade</label>
                            <div class="col-lg-11">
                                <select name="edit_grade" id="edit_grade" class="form-control form-control-solid">
                                   <option value="Grade-11">Grade 11</option>
                                   <option value="Grade-12">Grade 12</option>
                                </select>
                                <span class="form-text text-muted">Please select grade</span>
                            </div>
                        </div>	
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="edit_section_id" id="edit_section_id">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="editSection"> <i class=" fas fa-save"></i> Update</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifySectionModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="alert alert-danger" role="alert"> Are you sure you want activate/deactivate this section?</div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="section_modify_id" id="section_modify_id">
            <input type="hidden" class="form-control" name="section_modify_status" id="section_modify_status">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="modifySection"> <i class=" fas fa-check"></i> Modify</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifySectionModalSuccess" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert"> Section modified</div>
            </div>
            <div class="modal-footer">
           
                <button type="button" class="btn btn-light-success btn-sm font-weight-bold closemodify" data-dismiss="modal"> <i class=" fas fa-check"></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jslinks')
<script src="{{secure_asset('js/sections.js')}}"></script>
<script src="{{secure_asset('js/app.js')}}"></script>  
@endsection