$(document).ready(function() {
    $(document).on('click', '.add-student', function() {
        $('#addStudentModal').modal('show');
    });
    $(document).on('click', '.closemodify', function() {
        location.reload();
    });

    $(document).on('click', '.modify-student', function() {
        $('#student_modify_id').val($(this).data('student_id'));
        $('#student_modify_status').val($(this).data('student_status'));
        $('#modifyStudentModal').modal('show');
    });
    
    $('.modal-footer').on('click', '#modifyStudent', function() {
  
        $.ajax({
            type: 'post',
            url: '/panel/admin/student/modify',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'student_id': $('input[name=student_modify_id]').val(),
                'student_status': $('input[name=student_modify_status]').val()
                
            },
            success: function(data) {
                $('#modifyStudentModal').modal('toggle');
                $('#modifyStudentModalSuccess').modal('show');
                
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

    $(document).on('click', '.edit-student', function() {
        $('#edit_id_number').val($(this).data('id_number'));
        $('#edit_fname').val($(this).data('fname'));
        $('#edit_lname').val($(this).data('lname'));
        $('#edit_contact_number').val($(this).data('contact_number'));
        $('#edit_address').val($(this).data('address'));
        $('#edit_student_id').val($(this).data('student_id'));
        $('#editStudentModal').modal('show');
    });
    $('.modal-footer').on('click', '#editStudent', function() {
  
          $.ajax({
              type: 'post',
              url: '/panel/admin/student/update',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'fname': $('input[name=edit_fname]').val(),
                  'lname': $('input[name=edit_lname]').val(),
                  'contact_number': $('input[name=edit_contact_number]').val(),
                  'address': $('input[name=edit_address]').val(),
                  'student_id': $('input[name=edit_student_id]').val(),
                  'id_number': $('input[name=edit_id_number]').val(),
                  'gender': $('select[name=edit_gender]').val(),
                  'course': $('select[name=edit_course]').val(),
              },
              success: function(data) {
                $('#editStudentModal').modal('toggle');
                
                $('.row'+ data.id).replaceWith(`
                <tr class="row${data.id}">
                    <td>${data.id_number}</td>
                    <td class="py-8">
                        <div class="d-flex align-items-center">
                            <div>
                            ${data.first_name} ${data.last_name}
                            </div>
                        </div>
                    </td>
                    <td>${data.course}</td>
                    <td>${data.contact_number}</td>
                    <td>${data.address}</td>
                    <td>
                        <strong>${data.status}</strong>
                    </td>
                    <td class="pr-0 text-right">
                   
                    <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-student"
                        data-student_id="${data.id}"
                        data-id_number="${data.id_number}"
                        data-fname="${data.first_name}"
                        data-lname="${data.last_name}"
                        data-contact_number="${data.contact_number}"
                        data-address="${data.address}"
                    ><i class="fas fa-pen"></i></a>
                    
                    <a href="javascript:;" id="modifystudent${data.id}" class="btn btn-sm btn-warning modify-student"
                        data-student_id="${data.id}"
                        data-student_status="inactive">
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
                toastr.success("Student updated...");
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
    
    $(document).on('submit', '#form_student', function(e) {
        e.preventDefault();
        console.log(e);
          $.ajax({
              type: 'post',
              url: '/panel/admin/student/add',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'id_number': $('input[name=id_number]').val(),
                  'first_name': $('input[name=fname]').val(),
                  'middle_name': $('input[name=mname]').val(),
                  'last_name': $('input[name=lname]').val(),
                  'course': $('select[name=course]').val(),
                  'gender': $('select[name=gender]').val(),
                  'contact_number': $('input[name=contact_number]').val(),
                  'address': $('input[name=address]').val()
              },
              success: function(data) {
                $('#studentTable').prepend(`
                    <tr class="row${data.id}">
                        <td class="py-8">
                            <div class="d-flex align-items-center">
                                <div>
                                    ${data.id_number}
                                </div>
                            </div>
                        </td>
                        <td class="py-8">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="/panel/admin/student/${data.id}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">${data.first_name} ${data.last_name}</a>
                                </div>
                            </div>
                        </td>
                        <td>${data.course}</td>
                        <td>${data.contact_number}</td>
                        <td>${data.address}</td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.status}</span>
                            
                        </td>
                        
                        <td class="pr-0 text-right">
                        <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-student btn-sm"
                            data-student_id="${data.id}"
                            data-student="${data.name}"
    
                        ><i class="fas fa-pen"></i></a>
                        
                        <a href="javascript:;" id="modifystudent${data.id}" class="btn btn-sm btn-warning modify-student btn-sm"
                            data-student_id="${data.id}"
                            data-student_status="inactive">
                            <i class="far fa-eye-slash"></i>
                        </a>
                        
                        </td>
                    </tr>
                `);
                $('#fname').val('');
                $('#mname').val('');
                $('#lname').val('');
                $('#id_number').val('');
                $('#contact_number').val('');
                $('#address').val('');
                $('#addStudentModal').modal('toggle');
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
                toastr.success("Student added");
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
  