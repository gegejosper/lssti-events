$(document).ready(function() {
    $(document).on('click', '.add-teacher', function() {
        $('#addTeacherModal').modal('show');
        console.log('Clicked');
    });
    $(document).on('click', '.closemodify', function() {
        location.reload();
    });
    

    $(document).on('click', '.modify-teacher', function() {
        $('#teacher_modify_id').val($(this).data('teacher_id'));
        $('#teacher_modify_status').val($(this).data('teacher_status'));
        $('#modifyTeacherModal').modal('show');
    });
    
    $('.modal-footer').on('click', '#modifyTeacher', function() {
  
        $.ajax({
            type: 'post',
            url: '/panel/admin/teacher/modify',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'teacher_id': $('input[name=teacher_modify_id]').val(),
                'teacher_status': $('input[name=teacher_modify_status]').val()
                
            },
            success: function(data) {
                $('#modifyTeacherModal').modal('toggle');
                $('#modifyTeacherModalSuccess').modal('show');
                
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


    $(document).on('click', '.edit-teacher', function() {
        $('#edit_fname').val($(this).data('fname'));
        $('#edit_lname').val($(this).data('lname'));
        $('#edit_contact_number').val($(this).data('contact_number'));
        $('#edit_address').val($(this).data('address'));
        $('#edit_teacher_id').val($(this).data('teacher_id'));
        $('#editTeacherModal').modal('show');
    });
    $('.modal-footer').on('click', '#editTeacher', function() {
  
          $.ajax({
              type: 'post',
              url: '/panel/admin/teacher/update',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'fname': $('input[name=edit_fname]').val(),
                  'lname': $('select[name=edit_lname]').val(),
                  'contact_number': $('input[name=edit_contact_number]').val(),
                  'address': $('select[name=edit_address]').val(),
                  'teacher_id': $('input[name=edit_teacher_id]').val()
              },
              success: function(data) {
                $('#editTeacherModal').modal('toggle');
                
                $('.row'+ data.id).replaceWith(`
                <tr class="row${data.id}">
                    <td class="py-8">
                        <div class="d-flex align-items-center">
                            <div>
                            ${data.first_name} ${data.last_name}
                            </div>
                        </div>
                    </td>
                    <td>${data.contact_number}</td>
                    <td>${data.address}</td>
                    <td>
                        <strong>${data.status}</strong>
                    </td>
                    <td class="pr-0 text-right">
                    <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-teacher"
                        data-teacher_id="${data.id}"
                        data-fname="${data.fname}"
                        data-lname="${data.lname}"
                        data-contact_number="${data.contact_number}"
                        data-address="${data.address}"
                    ><i class="fas fa-pen"></i></a>
                    
                    <a href="javascript:;" id="modifyteacher${data.id}" class="btn btn-sm btn-warning modify-teacher"
                        data-teacher_id="${data.id}"
                        data-teacher_status="inactive">
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
                toastr.success("Teacher updated...");
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
    
    $("#addTeacher").click(function(data) {
          $.ajax({
              type: 'post',
              url: '/panel/admin/teacher/add',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'first_name': $('input[name=fname]').val(),
                  'last_name': $('input[name=lname]').val(),
                  'contact_number': $('input[name=contact_number]').val(),
                  'address': $('input[name=address]').val()
              },
              success: function(data) {
                $('#teacherTable').append(`
                    <tr class="row${data.id}">
                        <td class="py-8">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="/panel/admin/teacher/${data.id}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">${data.first_name} ${data.last_name}</a>
                                </div>
                            </div>
                        </td>
                        <td>${data.contact_number}</td>
                        <td>${data.address}</td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.status}</span>
                            
                        </td>
                        
                        <td class="pr-0 text-right">
                            <a href="/panel/admin/teacher/${data.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                        <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-teacher"
                            data-teacher_id="${data.id}"
                            data-teacher="${data.name}"
    
                        ><i class="fas fa-pen"></i></a>
                        
                        <a href="javascript:;" id="modifyteacher${data.id}" class="btn btn-sm btn-warning modify-teacher"
                            data-teacher_id="${data.id}"
                            data-teacher_status="inactive">
                            <i class="far fa-eye-slash"></i>
                        </a>
                        
                        </td>
                    </tr>
                `);
                $('#teacher').val('');

                $('#addTeacherModal').modal('toggle');
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
  