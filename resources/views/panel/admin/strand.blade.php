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
								<span class="card-label font-weight-bolder text-dark">Strands</span>
							</h3>
							<div class="card-toolbar">
								<a href="javascript:;" class="btn btn-primary font-weight-bolder font-size-sm mr-3 add-strand" data-toggle="modal"><i class="fas fa-plus"></i> New Strand</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0 pb-3">
							<div class="tab-content">
								<!--begin::Table-->
								<div class="table-responsive">
									<table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="strandTable">
										<thead>
											<tr class="text-left text-uppercase">
												<th style="" class="pl-7">
													<span class="text-dark-75">Name</span>
												</th>
                                                <th style="" class="pl-7">
													<span class="text-dark-75">Track</span>
												</th>
												<th style="min-width: 100px">Status</th>
												<th style="min-width: 80px">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach($strands as $strand)
											<tr class="row{{$strand->id}}">
												<td class="py-8">
													<div class="d-flex align-items-center">
														<div>
															<strong>{{$strand->name}}</strong>
														</div>
													</div>
												</td>
												<td>{{$strand->track}}</td>
												<td>
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$strand->status}}</span>
													
												</td>
												
												<td class="pr-0">
                                                <a href="/panel/admin/strand/{$strand->id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
												<a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-strand"
													data-strand_id="{{$strand->id}}"
													data-strand="{{$strand->name}}"
												><i class="fas fa-pen"></i></a>
												@if($strand->status == 'active')
                                                <a href="javascript:;" id="modifystrand{{$strand->id}}" class="btn btn-sm btn-warning modify-strand"
                                                    data-strand_id="{{$strand->id}}"
                                                    data-strand_status="inactive">
                                                    <i class="far fa-eye-slash"></i>
                                                </a>
                                                @elseif($strand->status == 'inactive')
                                                <a href="javascript:;" id="modifystrand{{$strand->id}}" class="btn btn-sm btn-info modify-strand"
                                                    data-strand_id="{{$strand->id}}"
                                                    data-strand_status="active">
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
<div class="modal fade" id="addStrandModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Strand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body p-1">
                @csrf
                <div class="errors"></div>
                <div class="card-body">
                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Strand Details</h3>
                    <hr>
					<div class="">
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Strand</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" placeholder="Strand name" name="strand" id="strand">
                                <span class="form-text text-muted">Please enter strand name</span>
                            </div>
                            <label class="col-lg-1 col-form-label">Track</label>
                            <div class="col-lg-5">
                                <select name="track" id="track" class="form-control form-control-solid">
                                    <option value="ACADEMIC">ACADEMIC</option>
                                    <option value="TVL">TVL</option>
                                    <option value="SPORTS-ARTS">SPORTS-ARTS</option>
                                </select>
                                <span class="form-text text-muted">Please enter strand name</span>
                            </div>
                        </div>
						
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-primary btn-sm font-weight-bold" id="addStrand"> <i class=" fas fa-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editStrandModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Strand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="errors"></div>
                <div class="card-body p-0">
                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Strand Details</h3>
					<hr>
                    <div class="">
						<div class="form-group row">
                            <label class="col-lg-1 col-form-label">Strand</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" placeholder="" name="edit_strand" id="edit_strand">
                                <span class="form-text text-muted">Please enter strand name</span>
                            </div>
                            <label class="col-lg-1 col-form-label">Track</label>
                            <div class="col-lg-5">
                                
                                <select name="edit_track" id="edit_track" class="form-control form-control-solid">
                                    <option value="ACADEMIC">ACADEMIC</option>
                                    <option value="TVL">TVL</option>
                                    <option value="SPORTS-ARTS">SPORTS-ARTS</option>
                                </select>
                                <span class="form-text text-muted">Please enter strand name</span>
                            </div>
                        </div>
					
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="edit_strand_id" id="edit_strand_id">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="editStrand"> <i class=" fas fa-save"></i> Update</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyStrandModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Strand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="alert alert-danger" role="alert"> Are you sure you want activate/deactivate this strand?</div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="strand_modify_id" id="strand_modify_id">
            <input type="hidden" class="form-control" name="strand_modify_status" id="strand_modify_status">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="modifyStrand"> <i class=" fas fa-check"></i> Modify</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyStrandModalSuccess" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Strand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert"> Strand modified</div>
            </div>
            <div class="modal-footer">
           
                <button type="button" class="btn btn-light-success btn-sm font-weight-bold closemodify" data-dismiss="modal"> <i class=" fas fa-check"></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jslinks')
<script src="{{asset('js/strand.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>  
@endsection