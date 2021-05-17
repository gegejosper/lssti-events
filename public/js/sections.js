$(document).ready(function() {
    $(document).on('click', '.add-section', function() {
        $('#addSectionModal').modal('show');
        console.log('Clicked');
    });
    $(document).on('click', '.closemodify', function() {
        location.reload();
    });
    

    $(document).on('click', '.modify-section', function() {
        $('#section_modify_id').val($(this).data('section_id'));
        $('#section_modify_status').val($(this).data('section_status'));
        $('#modifySectionModal').modal('show');
    });
    
    $('.modal-footer').on('click', '#modifySection', function() {
  
        $.ajax({
            type: 'post',
            url: '/panel/admin/section/modify',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'section_id': $('input[name=section_modify_id]').val(),
                'section_status': $('input[name=section_modify_status]').val()
                
            },
            success: function(data) {
                $('#modifySectionModal').modal('toggle');
                $('#modifySectionModalSuccess').modal('show');
                
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


    $(document).on('click', '.edit-section', function() {
        $('#edit_section').val($(this).data('section'));
        $('#edit_section_id').val($(this).data('section_id'));
        
        $('#editSectionModal').modal('show');
    });
    $('.modal-footer').on('click', '#editSection', function() {
  
          $.ajax({
              type: 'post',
              url: '/panel/admin/section/update',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'section': $('input[name=edit_section]').val(),
                  'track': $('select[name=edit_track]').val(),
                  'section_id': $('input[name=edit_section_id]').val(),
                  'grade_year': $('select[name=edit_grade]').val()
              },
              success: function(data) {
                $('#editSectionModal').modal('toggle');
                
                $('.row'+ data.id).replaceWith(`
                <tr class="row${data.id}">
                    <td class="py-8">
                        <div class="d-flex align-items-center">
                            <div>
                                ${data.section}
                                
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
                    <a href="/panel/admin/section/${data.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                    <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-section"
                        data-section_id="${data.id}"
                        data-section="${data.name}"
                    ><i class="fas fa-pen"></i></a>
                    
                    <a href="javascript:;" id="modifysection${data.id}" class="btn btn-sm btn-warning modify-section"
                        data-section_id="${data.id}"
                        data-section_status="inactive">
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
                toastr.success("Section updated...");
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
    
    $("#addSection").click(function(data) {
          $.ajax({
              type: 'post',
              url: '/panel/admin/section/add',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'section': $('input[name=section]').val(),
                  'track': $('select[name=track]').val(),
                  'grade_year': $('select[name=grade_year]').val()
              },
              success: function(data) {
                $('#sectionTable').append(`
                    <tr class="row${data.id}">
                        <td class="py-8">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="/panel/admin/section/${data.id}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">${data.section}</a>
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
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.status}</span>
                            
                        </td>
                        
                        <td class="pr-0 text-right">
                            <a href="/panel/admin/section/${data.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                        <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-section"
                            data-section_id="${data.id}"
                            data-section="${data.name}"
    
                        ><i class="fas fa-pen"></i></a>
                        
                        <a href="javascript:;" id="modifysection${data.id}" class="btn btn-sm btn-warning modify-section"
                            data-section_id="${data.id}"
                            data-section_status="inactive">
                            <i class="far fa-eye-slash"></i>
                        </a>
                        
                        </td>
                    </tr>
                `);
                $('#section').val('');

                $('#addSectionModal').modal('toggle');
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
  