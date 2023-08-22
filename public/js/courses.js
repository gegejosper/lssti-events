$(document).ready(function() {
    $(document).on('click', '.add-course', function() {
        $('#addCourseModal').modal('show');
    });
    $(document).on('click', '.closemodify', function() {
        location.reload();
    });
    

    $(document).on('click', '.modify-course', function() {
        $('#course_modify_id').val($(this).data('course_id'));
        $('#course_modify_status').val($(this).data('course_status'));
        $('#modifyCourseModal').modal('show');
    });
    $(document).on('click', '.edit-course', function() {
        $('#edit_course_name').val($(this).data('course_name'));
        $('#edit_course_code').val($(this).data('course_code'));
        $('#edit_course_id').val($(this).data('course_id'));
        $('#editCourseModal').modal('show');
    });
    
    $('.modal-footer').on('click', '#modifyCourse', function() {
  
        $.ajax({
            type: 'post',
            url: '/panel/admin/course/modify',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'course_id': $('input[name=course_modify_id]').val(),
                'course_status': $('input[name=course_modify_status]').val()
                
            },
            success: function(data) {
                $('#modifyCourseModal').modal('toggle');
                $('#modifyCourseModalSuccess').modal('show');
                
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


    
    $('.modal-footer').on('click', '#editCourse', function() {
  
          $.ajax({
              type: 'post',
              url: '/panel/admin/course/update',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'course_name': $('input[name=edit_course_name]').val(),
                  'course_code': $('input[name=edit_course_code]').val(),
                  'course_id': $('input[name=edit_course_id]').val()
              },
              success: function(data) {
                $('#editCourseModal').modal('toggle');
                
                $('.row'+ data.id).replaceWith(`
                <tr class="row${data.id}">
                    <td class="py-8">
                        <div class="d-flex align-items-center">
                            <div>
                                ${data.course_name}
                                
                            </div>
                        </div>
                    </td>
                    <td>
                        <strong>${data.course_code}</strong>
                    </td>
                    <td>
                        <strong>${data.status}</strong>
                    </td>
                    <td class="pr-0">
                   
                    <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-course"
                        data-course_id="${data.id}"
                        data-course_name="${data.course_name}"
                        data-course_code="${data.course_code}"
                    ><i class="fas fa-pen"></i></a>
                    
                    <a href="javascript:;" id="modifycourse${data.id}" class="btn btn-sm btn-warning modify-course"
                        data-course_id="${data.id}"
                        data-course_status="inactive">
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
                toastr.success("Course updated...");
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
    
    $("#addCourse").click(function(data) {
          $.ajax({
              type: 'post',
              url: '/panel/admin/course/add',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'course_name': $('input[name=course_name]').val(),
                  'course_code': $('input[name=course_code]').val()
              },
              success: function(data) {
                $('#courseTable').append(`
                    <tr class="row${data.id}">
                        <td class="py-8">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="/panel/admin/course/${data.id}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">${data.course_name}</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <strong>${data.course_code}</strong>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.status}</span>
                            
                        </td>
                        
                        <td class="pr-0 text-right">
                            <a href="/panel/admin/course/${data.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                        <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-course"
                            data-course_id="${data.id}"
                            data-course_name="${data.course_name}"
                            data-course_code="${data.course_code}"
    
                        ><i class="fas fa-pen"></i></a>
                        
                        <a href="javascript:;" id="modifycourse${data.id}" class="btn btn-sm btn-warning modify-course"
                            data-course_id="${data.id}"
                            data-course_status="inactive">
                            <i class="far fa-eye-slash"></i>
                        </a>
                        
                        </td>
                    </tr>
                `);
                $('#course').val('');

                $('#addCourseModal').modal('toggle');
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
                toastr.success("New Course added");
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
  