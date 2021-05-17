$(document).ready(function() {
    $(document).on('click', '.add-subject', function() {
        $('#addSubjectModal').modal('show');
        console.log('Clicked');
    });
    $(document).on('click', '.closemodify', function() {
        location.reload();
    });
    

    $(document).on('click', '.modify-subject', function() {
        $('#subject_modify_id').val($(this).data('subject_id'));
        $('#subject_modify_status').val($(this).data('subject_status'));
        $('#modifySubjectModal').modal('show');
    });
    
    $('.modal-footer').on('click', '#modifySubject', function() {
  
        $.ajax({
            type: 'post',
            url: '/panel/admin/subject/modify',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'subject_id': $('input[name=subject_modify_id]').val(),
                'subject_status': $('input[name=subject_modify_status]').val()
                
            },
            success: function(data) {
                $('#modifySubjectModal').modal('toggle');
                $('#modifySubjectModalSuccess').modal('show');
                
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


    $(document).on('click', '.edit-subject', function() {
        $('#edit_subject').val($(this).data('subject'));
        $('#edit_subject_id').val($(this).data('subject_id'));
        $('#editSubjectModal').modal('show');
    });
    $('.modal-footer').on('click', '#editSubject', function() {
  
          $.ajax({
              type: 'post',
              url: '/panel/admin/subject/update',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'subject': $('input[name=edit_subject]').val(),
                  'subject_id': $('input[name=edit_subject_id]').val()
              },
              success: function(data) {
                $('#editSubjectModal').modal('toggle');
                
                $('.row'+ data.id).replaceWith(`
                <tr class="row${data.id}">
                    <td class="py-8">
                        <div class="d-flex align-items-center">
                            <div>
                                ${data.name}
                                
                            </div>
                        </div>
                    </td>
                   
                    <td>
                        <strong>${data.status}</strong>
                    </td>
                    <td class="pr-0 text-right">
                    <a href="/panel/admin/subject/${data.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                    <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-subject"
                        data-subject_id="${data.id}"
                        data-subject="${data.name}"
                    ><i class="fas fa-pen"></i></a>
                    
                    <a href="javascript:;" id="modifysubject${data.id}" class="btn btn-sm btn-warning modify-subject"
                        data-subject_id="${data.id}"
                        data-subject_status="inactive">
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
                toastr.success("Subject updated...");
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
    
    $("#addSubject").click(function(data) {
          $.ajax({
              type: 'post',
              url: '/panel/admin/subject/add',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'subject': $('input[name=subject]').val()
              },
              success: function(data) {
                $('#subjectTable').append(`
                    <tr class="row${data.id}">
                        <td class="py-8">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="/panel/admin/subject/${data.id}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">${data.name}</a>
                                </div>
                            </div>
                        </td>
                        
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.status}</span>
                            
                        </td>
                        
                        <td class="pr-0 text-right">
                            <a href="/panel/admin/subject/${data.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                        <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-subject"
                            data-subject_id="${data.id}"
                            data-subject="${data.name}"
    
                        ><i class="fas fa-pen"></i></a>
                        
                        <a href="javascript:;" id="modifysubject${data.id}" class="btn btn-sm btn-warning modify-subject"
                            data-subject_id="${data.id}"
                            data-subject_status="inactive">
                            <i class="far fa-eye-slash"></i>
                        </a>
                        
                        </td>
                    </tr>
                `);
                $('#subject').val('');

                $('#addSubjectModal').modal('toggle');
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
  