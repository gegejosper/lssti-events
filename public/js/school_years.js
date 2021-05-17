$(document).ready(function() {
    $(document).on('click', '.add-school_year', function() {
        $('#addSchool_yearModal').modal('show');
        console.log('Clicked');
    });
    $(document).on('click', '.closemodify', function() {
        location.reload();
    });
    

    $(document).on('click', '.modify-school_year', function() {
        $('#school_year_modify_id').val($(this).data('school_year_id'));
        $('#school_year_modify_status').val($(this).data('school_year_status'));
        $('#modifySchool_yearModal').modal('show');
    });
    
    $('.modal-footer').on('click', '#modifySchool_year', function() {
  
        $.ajax({
            type: 'post',
            url: '/panel/admin/school_year/modify',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'school_year_id': $('input[name=school_year_modify_id]').val(),
                'school_year_status': $('input[name=school_year_modify_status]').val()
                
            },
            success: function(data) {
                $('#modifySchool_yearModal').modal('toggle');
                $('#modifySchool_yearModalSuccess').modal('show');
                
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


    $(document).on('click', '.edit-school_year', function() {
        $('#edit_school_year').val($(this).data('school_year'));
        $('#edit_school_year_id').val($(this).data('school_year_id'));
        $('#editSchool_yearModal').modal('show');
    });
    $('.modal-footer').on('click', '#editSchool_year', function() {
  
          $.ajax({
              type: 'post',
              url: '/panel/admin/school_year/update',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'school_year': $('input[name=edit_school_year]').val(),
                  'semester': $('select[name=edit_semester]').val(),
                  'school_year_id': $('input[name=edit_school_year_id]').val()
              },
              success: function(data) {
                $('#editSchool_yearModal').modal('toggle');
                
                $('.row'+ data.id).replaceWith(`
                <tr class="row${data.id}">
                    <td class="py-8">
                        <div class="d-flex align-items-center">
                            <div>
                                ${data.cy}
                                
                            </div>
                        </div>
                    </td>
                    <td>
                        <strong>${data.semester}</strong>
                    </td>
                    <td>
                        <strong>${data.status}</strong>
                    </td>
                    <td class="pr-0 text-right">
                    <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-school_year"
                        data-school_year_id="${data.id}"
                        data-school_year="${data.cy}"
                        data-semester="${data.semester}"
                    ><i class="fas fa-pen"></i></a>
                    
                    <a href="javascript:;" id="modifyschool_year${data.id}" class="btn btn-sm btn-warning modify-school_year"
                        data-school_year_id="${data.id}"
                        data-school_year_status="inactive">
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
                toastr.success("School_year updated...");
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
    
    $("#addSchool_year").click(function(data) {
          $.ajax({
              type: 'post',
              url: '/panel/admin/school_year/add',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'school_year': $('input[name=school_year]').val(),
                  'semester': $('select[name=semester]').val()
              },
              success: function(data) {
                $('#school_yearTable').append(`
                    <tr class="row${data.id}">
                        <td class="py-8">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="/panel/admin/school_year/${data.id}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">${data.cy}</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.semester}</span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.status}</span>
                            
                        </td>
                        
                        <td class="pr-0 text-right">
                        <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-school_year"
                            data-school_year_id="${data.id}"
                            data-school_year="${data.cy}"
                            data-semester="${data.semester}"
                        ><i class="fas fa-pen"></i></a>
                        
                        <a href="javascript:;" id="modifyschool_year${data.id}" class="btn btn-sm btn-warning modify-school_year"
                            data-school_year_id="${data.id}"
                            data-school_year_status="inactive">
                            <i class="far fa-eye-slash"></i>
                        </a>
                        
                        </td>
                    </tr>
                `);
                $('#school_year').val('');

                $('#addSchool_yearModal').modal('toggle');
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
  