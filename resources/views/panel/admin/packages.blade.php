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
								<span class="card-label font-weight-bolder text-dark">Packages</span>
								<span class="text-muted mt-3 font-weight-bold font-size-sm">List of Jujiedso internet packages listed here.</span>
							</h3>
							<div class="card-toolbar">
								<a href="javascript:;" class="btn btn-primary font-weight-bolder font-size-sm mr-3 add-package" data-toggle="modal"><i class="fas fa-plus"></i> New Package</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0 pb-3">
							<div class="tab-content">
								<!--begin::Table-->
								<div class="table-responsive">
									<table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="packageTable">
										<thead>
											<tr class="text-left text-uppercase">
												<th style="min-width: 250px" class="pl-7">
													<span class="text-dark-75">Name</span>
												</th>
												<th style="min-width: 100px">Plan</th>
												<th style="min-width: 100px">Status</th>
												<th style="min-width: 80px"></th>
											</tr>
										</thead>
										<tbody>
											@foreach($packages as $package)
											<tr class="row{{$package->id}}">
												<td class="py-8">
													<div class="d-flex align-items-center">
														<div>
															<a href="/panel/admin/packages/{{$package->id}}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$package->package_name}}</a>
															<span class="text-muted font-weight-bold d-block">{{$package->description}}</span>
														</div>
													</div>
												</td>
												<td>
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$package->plan->plan_name}}</span>
												</td>
												<td>
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$package->status}}</span>
													
												</td>
												
												<td class="pr-0 text-right">
													<a href="/panel/admin/packages/{{$package->id}}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
												<a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-package"
													data-package_id="{{$package->id}}"
													data-package_name="{{$package->package_name}}"
													data-package_description="{{$package->description}}"
													data-package_plan_id="{{$package->plan_id}}"
													data-package_plan_name="{{$package->plan->plan_name}}"
												><i class="fas fa-pen"></i></a>
												@if($package->status == 'active')
                                                <a href="javascript:;" id="modifypackage{{$package->id}}" class="btn btn-sm btn-warning modify-package"
                                                    data-package_id="{{$package->id}}"
                                                    data-package_status="inactive">
                                                    <i class="far fa-eye-slash"></i>
                                                </a>
                                                @elseif($package->status == 'inactive')
                                                <a href="javascript:;" id="modifybank{{$package->id}}" class="btn btn-sm btn-info modify-package"
                                                    data-package_id="{{$package->id}}"
                                                    data-package_status="active">
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
<div class="modal fade" id="addPackageModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body p-1">
                @csrf
                <div class="errors"></div>
                <div class="card-body">
                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Package Details</h3>
                    <hr>
					<div class="">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Name:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Package " name="package_name" id="package_name">
                                <span class="form-text text-muted">Please enter package name</span>
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-lg-3 col-form-label">Description:</label>
                            <div class="col-lg-9">
                               <textarea name="package_description" id="package_description" class="form-control" cols="30" rows="10"></textarea>
                                <span class="form-text text-muted">Please enter description</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Price:</label>
                            <div class="col-lg-9">
                                <select name="plan_id" id="plan_id" class="form-control">
									@foreach($plans as $plan)
									<option value="{{$plan->id}}">{{$plan->plan_name}}</option>
									@endforeach
								</select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-primary btn-sm font-weight-bold" id="addPackage"> <i class=" fas fa-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editPackageModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="errors"></div>
                <div class="card-body p-0">
                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Package Details</h3>
					<hr>
                    <div class="">
						<div class="form-group row">
                            <label class="col-lg-3 col-form-label">Name:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Package " name="edit_package_name" id="edit_package_name">
                                <span class="form-text text-muted">Please enter package name</span>
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-lg-3 col-form-label">Description:</label>
                            <div class="col-lg-9">
                               <textarea name="edit_package_description" id="edit_package_description" class="form-control" cols="30" rows="10"></textarea>
                                <span class="form-text text-muted">Please enter description</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Plan:</label>
                            <div class="col-lg-9">
								<select name="edit_package_plan_id" id="edit_package_plan_id" class="form-control">
									@foreach($plans as $plan)
									<option value="{{$plan->id}}">{{$plan->plan_name}}</option>
									@endforeach
								</select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="edit_package_id" id="edit_package_id">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="editPackage"> <i class=" fas fa-save"></i> Update</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyPackageModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="alert alert-danger" role="alert"> Are you sure you want activate/deactivate this package?</div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="package_modify_id" id="package_modify_id">
            <input type="hidden" class="form-control" name="package_modify_status" id="package_modify_status">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="modifyPackage"> <i class=" fas fa-check"></i> Modify</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyPackageModalSuccess" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert"> Package modified</div>
            </div>
            <div class="modal-footer">
           
                <button type="button" class="btn btn-light-success btn-sm font-weight-bold closemodify" data-dismiss="modal"> <i class=" fas fa-check"></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jslinks')
<script src="{{asset('js/packages.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>  
@endsection