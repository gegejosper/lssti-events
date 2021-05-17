$(document).ready(function() {
    $(document).on('click', '.add-strand', function() {
        $('#addStrandModal').modal('show');
        console.log('Clicked');
    });
    $(document).on('click', '.closemodify', function() {
        location.reload();
    });
    

    $(document).on('click', '.modify-strand', function() {
        $('#strand_modify_id').val($(this).data('strand_id'));
        $('#strand_modify_status').val($(this).data('strand_status'));
        $('#modifyStrandModal').modal('show');
    });
    
    $('.modal-footer').on('click', '#modifyStrand', function() {
  
        $.ajax({
            type: 'post',
            url: '/panel/admin/strand/modify',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'strand_id': $('input[name=strand_modify_id]').val(),
                'strand_status': $('input[name=strand_modify_status]').val()
                
            },
            success: function(data) {
                $('#modifyStrandModal').modal('toggle');
                $('#modifyStrandModalSuccess').modal('show');
                
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


    $(document).on('click', '.edit-strand', function() {
        $('#edit_strand').val($(this).data('strand'));
        $('#edit_strand_id').val($(this).data('strand_id'));
        $('#editStrandModal').modal('show');
    });
    $('.modal-footer').on('click', '#editStrand', function() {
  
          $.ajax({
              type: 'post',
              url: '/panel/admin/strand/update',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'strand': $('input[name=edit_strand]').val(),
                  'track': $('select[name=edit_track]').val(),
                  'strand_id': $('input[name=edit_strand_id]').val()
              },
              success: function(data) {
                $('#editStrandModal').modal('toggle');
                
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
                        <strong>${data.track}</strong>
                    </td>
                    <td>
                        <strong>${data.status}</strong>
                    </td>
                    <td class="pr-0 text-right">
                    <a href="/panel/admin/strand/${data.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                    <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-strand"
                        data-strand_id="${data.id}"
                        data-strand="${data.name}"
                    ><i class="fas fa-pen"></i></a>
                    
                    <a href="javascript:;" id="modifystrand${data.id}" class="btn btn-sm btn-warning modify-strand"
                        data-strand_id="${data.id}"
                        data-strand_status="inactive">
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
                toastr.success("Strand updated...");
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
    
    $("#addStrand").click(function(data) {
          $.ajax({
              type: 'post',
              url: '/panel/admin/strand/add',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'strand': $('input[name=strand]').val(),
                  'track': $('select[name=track]').val()
              },
              success: function(data) {
                $('#strandTable').append(`
                    <tr class="row${data.id}">
                        <td class="py-8">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="/panel/admin/strand/${data.id}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">${data.name}</a>
                                </div>
                            </div>
                        </td>
                        <td>
                        <strong>${data.track}</strong>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.status}</span>
                            
                        </td>
                        
                        <td class="pr-0 text-right">
                            <a href="/panel/admin/strand/${data.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                        <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-strand"
                            data-strand_id="${data.id}"
                            data-strand="${data.name}"
    
                        ><i class="fas fa-pen"></i></a>
                        
                        <a href="javascript:;" id="modifystrand${data.id}" class="btn btn-sm btn-warning modify-strand"
                            data-strand_id="${data.id}"
                            data-strand_status="inactive">
                            <i class="far fa-eye-slash"></i>
                        </a>
                        
                        </td>
                    </tr>
                `);
                $('#strand').val('');

                $('#addStrandModal').modal('toggle');
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
  