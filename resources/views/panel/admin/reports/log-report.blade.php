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
								<span class="card-label font-weight-bolder text-dark">Event Reports</span>
							</h3>
							
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0 pb-3">
							<div class="tab-content">
								<!--begin::Table-->
								<div class="table-responsive">
									<table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="eventTable">
										<thead>
											<tr class="text-left text-uppercase">
												<th style="" class="pl-7">
													<span class="text-dark-75">Name</span>
												</th>
                                                <th>Date</th>
												<th style="min-width: 80px">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach($events as $event)
											<tr class="row{{$event->id}}">
												<td class="py-8">
													<div class="d-flex align-items-center">
														<div>
															<strong>{{$event->event_name}}</strong>
														</div>
													</div>
												</td>
												<td>{{$event->event_date}}</td>

												
												<td class="pr-0">
                                                <a href="/panel/admin/events/{{$event->id}}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-folder"></i></a>
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
                    <button class="btn btn-info no-print" onclick="window.print();"><i class="fas fa-print"></i>  Print</button>
				</div>
			</div>
			<!--end::Row-->
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>

@endsection

@section('jslinks')
<script src="{{secure_asset('js/app.js')}}"></script>  
@endsection