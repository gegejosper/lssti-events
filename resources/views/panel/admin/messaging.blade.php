@extends('layouts.panel')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">				
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			<div class="row">
				<div class="col-lg-6">
					<!--begin::Base Table Widget 10-->
					<div class="card card-custom gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 pt-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Quick SMS</span>
								<span class="text-muted mt-3 font-weight-bold font-size-sm">Send Quick SMS to users
								</span>
							</h3>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
                        @if(session('success'))
                            <div class="alert alert-success my-10" role="alert">
                                {{ session('success') }}     
                            </div>
                        @endif
						<div class="card-body pt-2 pb-0 mt-n3">
                            <form action="{{route('panel.admin.send_sms')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleSelect1">Select receiver
                                    <span class="text-danger">*</span></label>
                                    <select class="form-control" id="reciever" name="reciever">
                                        <option value='student'>Student's Parent</option>
                                        <option value='teacher'>Teacher</option>
                                    </select>
                                </div>
                                <div class="form-group mb-1">
                                    <label for="exampleTextarea">Message
                                    <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="sms_message" name="sms_message" rows="3"></textarea>
                                </div>

                                <div class="form-group mb-5 text-right mt-3">
                                    <button type="submit" class="btn btn-primary"> Send</button>
                                </div>
                            </form>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Base Table Widget 10-->
					
				</div>
			</div>
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
@endsection