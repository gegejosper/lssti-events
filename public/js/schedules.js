$(document).ready(function() {
    $(document).on('click', '.add-schedule', function() {
        $('#addScheduleModal').modal('show');
        console.log('Clicked');
    });
    $(document).on('click', '.closemodify', function() {
        location.reload();
    });
    

    $(document).on('click', '.modify-schedule', function() {
        $('#schedule_modify_id').val($(this).data('schedule_id'));
        $('#schedule_modify_status').val($(this).data('schedule_status'));
        $('#modifyScheduleModal').modal('show');
    });
    
    $('.modal-footer').on('click', '#modifySchedule', function() {
  
        $.ajax({
            type: 'post',
            url: '/panel/teacher/schedule/modify',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'schedule_id': $('input[name=schedule_modify_id]').val(),
                'schedule_status': $('input[name=schedule_modify_status]').val()
                
            },
            success: function(data) {
                $('#modifyScheduleModal').modal('toggle');
                $('#modifyScheduleModalSuccess').modal('show');
                
            },
            
            error: function(data){
              var errors = data.responseJSON.errors;
              var errormessage = '';
              Object.keys(errors).forEach(function(key) {
                  errormessage += errors[key] + '<br />';
                  $('.errors').html('');
                  $('.errors').append(`
                  <div class="alert alert-danger" role="alert"> ${errormessage} </div>
                  `);
              });
            }
        });
    });


    $(document).on('click', '.edit-schedule', function() {
        $('#edit_schedule').val($(this).data('schedule'));
        $('#edit_schedule_id').val($(this).data('schedule_id'));
        
        $('#editScheduleModal').modal('show');
    });
    $('.modal-footer').on('click', '#editSchedule', function() {
  
          $.ajax({
              type: 'post',
              url: '/panel/admin/schedule/update',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'schedule': $('input[name=edit_schedule]').val(),
                  'track': $('select[name=edit_track]').val(),
                  'schedule_id': $('input[name=edit_schedule_id]').val(),
                  'grade_year': $('select[name=edit_grade]').val()
              },
              success: function(data) {
                $('#editScheduleModal').modal('toggle');
                
                $('.row'+ data.id).replaceWith(`
                <tr class="row${data.id}">
                    <td class="py-8">
                        <div class="d-flex align-items-center">
                            <div>
                                ${data.schedule}
                                
                            </div>
                        </div>
                    </td>
                    <td>
                        <strong>${data.track}</strong>
                    </td>
                    <td>
                        <strong>${data.grade_year}</strong>
                        </td>
                    <td>
                        <strong>${data.status}</strong>
                    </td>
                    <td class="pr-0 text-right">
                    <a href="/panel/admin/schedule/${data.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                    <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-schedule"
                        data-schedule_id="${data.id}"
                        data-schedule="${data.name}"
                    ><i class="fas fa-pen"></i></a>
                    
                    <a href="javascript:;" id="modifyschedule${data.id}" class="btn btn-sm btn-warning modify-schedule"
                        data-schedule_id="${data.id}"
                        data-schedule_status="inactive">
                        <i class="far fa-eye-slash"></i>
                    </a>
                    
                    </td>
                </tr>
                `);
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  };
                toastr.success("Schedule updated...");
              },
              
              error: function(data){
                var errors = data.responseJSON.errors;
                var errormessage = '';
                Object.keys(errors).forEach(function(key) {
                    errormessage += errors[key] + '<br />';
                    $('.errors').html('');
                    $('.errors').append(`
                    <div class="alert alert-danger" role="alert"> ${errormessage} </div>
                    `);
                });
              }
          });
    });
    
    $("#addSchedule").click(function(data) {
        var subject_days = [];
        $(".subject_days").each(function () {
            var ischecked = $(this).is(":checked");
            if (ischecked) {
                subject_days.push($(this).val());
            }
        });
        $.ajax({
              type: 'post',
              url: '/panel/teacher/schedule/add',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'subject': $('select[name=subject]').val(),
                  'subject_time': $('input[name=subject_time]').val(),
                  'subject_days': subject_days
              },
              success: function(data) {
                $('#scheduleTable').append(`
                    <tr class="row${data.id}">
                        <td class="py-8">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="/panel/admin/schedule/${data.id}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">${data.subject_name}</a>
                                </div>
                            </div>
                        </td>
                        <td>
                        <strong>${data.subject_time}</strong>
                        </td>
                        <td>
                        <strong>${data.subject_days}</strong>
                        </td>
                        <td>
                        <strong>${data.semester} | ${data.year}</strong>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.status}</span>
                            
                        </td>
                        
                        <td class="pr-0 text-right">
                        <a href="/panel/teacher/schedule/${data.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                        
                        <a href="javascript:;" id="modifyschedule${data.id}" class="btn btn-sm btn-warning modify-schedule"
                            data-schedule_id="${data.id}"
                            data-schedule_status="inactive">
                            <i class="far fa-eye-slash"></i>
                        </a>
                        
                        </td>
                    </tr>
                `);
                $('#schedule').val('');

                $('#addScheduleModal').modal('toggle');
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr.success("School year added");
              },
              error: function(data){
                var errors = data.responseJSON.errors;
                var errormessage = '';
                Object.keys(errors).forEach(function(key) {
                    errormessage += errors[key] + '<br />';
                    $('.errors').html('');
                    $('.errors').append(`
                    <div class="alert alert-danger" role="alert"> ${errormessage} </div>
                    `);
                });
              }
  
          });
    });
   
  });
  