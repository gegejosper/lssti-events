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
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0 pb-3">
                            <form class="no-print" action="{{route('panel.admin.filter_students')}}" method="post">
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
                                    <h3>Results for {{$year}} | {{$semester}}</h3>
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
                        
												<th >Grade</th>
												<th >Section</th>
											</tr>
										</thead>
										<tbody id="studentTable">
											@foreach($students as $student)
											<tr class="row{{$student->id}}">
												<td>{{$student->student->id_number}}</td>
												<td class="py-8">
													<div class="d-flex align-items-center">
														<div>
															<strong>{{$student->student->first_name}} {{$student->student->last_name}}</strong>
														</div>
													</div>
												</td>
												<td>{{$student->student->parent_name}}</td>
												<td>{{$student->student->contact_number}}</td>
                                                <td>{{$student->student->grade_year}}</td>
                                                <td>{{$student->section_info->section}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
                                    <button class="btn btn-info no-print" onclick="window.print();"><i class="fas fa-print"></i>  Print</button>
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