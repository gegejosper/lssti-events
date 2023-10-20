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
								<span class="card-label font-weight-bolder text-dark">Events</span>
							</h3>
							<div class="card-toolbar">
								<a href="javascript:;" class="btn btn-primary font-weight-bolder font-size-sm mr-3 add-event" data-toggle="modal"><i class="fas fa-plus"></i> New Event</a>
							</div>
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
												<th style="min-width: 100px">Status</th>
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
												<td>
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$event->status}}</span>
													
												</td>
												
												<td class="pr-0">
                                                <a href="/panel/admin/events/{{$event->id}}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-folder"></i></a>
												<a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-event"
													data-event_id="{{$event->id}}"
													data-event_name="{{$event->event_name}}"
                                                    data-event_date="{{$event->eventd_date}}"
												><i class="fas fa-pen"></i></a>
												@if($event->status == 'active')
                                                <a href="javascript:;" id="modifyevent{{$event->id}}" class="btn btn-sm btn-warning modify-event"
                                                    data-event_id="{{$event->id}}"
                                                    data-event_status="inactive">
                                                    <i class="far fa-eye-slash"></i>
                                                </a>
                                                @elseif($event->status == 'inactive')
                                                <a href="javascript:;" id="modifyevent{{$event->id}}" class="btn btn-sm btn-info modify-event"
                                                    data-event_id="{{$event->id}}"
                                                    data-event_status="active">
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
<!-- Modal-->
<div class="modal fade" id="addEventModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Event</h5>
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
                            <label class="col-lg-1 col-form-label">Event</label>
                            <div class="col-lg-11">
                                <input type="text" class="form-control" placeholder="Event name" name="event_name" id="event_name">
                                <span class="form-text text-muted">Please enter event name</span>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Event Date</label>
                            <div class="col-lg-11">
                                <input type="date" class="form-control" placeholder="Event date" name="event_date" id="event_date">
                                <span class="form-text text-muted">Please enter event date</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-primary btn-sm font-weight-bold" id="addEvent"> <i class=" fas fa-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editEventModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="errors"></div>
                <div class="card-body p-0">
                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Event Details</h3>
					<hr>
                    <div class="">
						<div class="form-group row">
                            <label class="col-lg-1 col-form-label">Event</label>
                            <div class="col-lg-11">
                                <input type="text" class="form-control" placeholder="" name="edit_event_name" id="edit_event_name">
                                <span class="form-text text-muted">Please enter event name</span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="">
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Event Date</label>
                            <div class="col-lg-11">
                                <input type="date" class="form-control" placeholder="Event date" name="edit_event_date" id="edit_event_date">
                                <span class="form-text text-muted">Please enter event date</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="edit_event_id" id="edit_event_id">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="editEvent"> <i class=" fas fa-save"></i> Update</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyEventModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="alert alert-danger" role="alert"> Are you sure you want activate/deactivate this event?</div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="event_modify_id" id="event_modify_id">
            <input type="hidden" class="form-control" name="event_modify_status" id="event_modify_status">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="modifyEvent"> <i class=" fas fa-check"></i> Modify</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyEventModalSuccess" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert"> Event modified</div>
            </div>
            <div class="modal-footer">
           
                <button type="button" class="btn btn-light-success btn-sm font-weight-bold closemodify" data-dismiss="modal"> <i class=" fas fa-check"></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jslinks')
<script src="{{secure_asset('js/events.js')}}"></script>
<script src="{{secure_asset('js/app.js')}}"></script>  
@endsection