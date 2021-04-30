$(document).ready(function() {
    $(document).on('click', '.add-package', function() {
        $('#addPackageModal').modal('show');
        console.log('Clicked');
    });
    $(document).on('click', '.closemodify', function() {
        location.reload();
    });
    

    $(document).on('click', '.modify-package', function() {
        $('#package_modify_id').val($(this).data('package_id'));
        $('#package_modify_status').val($(this).data('package_status'));
        $('#modifyPackageModal').modal('show');
    });
    
    $('.modal-footer').on('click', '#modifyPackage', function() {
  
        $.ajax({
            type: 'post',
            url: '/panel/admin/packages/modify',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'package_id': $('input[name=package_modify_id]').val(),
                'package_status': $('input[name=package_modify_status]').val()
                
            },
            success: function(data) {
                $('#modifyPackageModal').modal('toggle');
                $('#modifyPackageModalSuccess').modal('show');
                
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


    $(document).on('click', '.edit-package', function() {
        $('#edit_package_name').val($(this).data('package_name'));
        $('#edit_package_description').val($(this).data('package_description'));
        // $('#edit_package_plan_id').val($(this).data('package_plan_id'));
        // $('#edit_package_plan_id').text($(this).data('package_plan_name'));
        $('#edit_package_id').val($(this).data('package_id'));
        $('#editPackageModal').modal('show');
    });
    $('.modal-footer').on('click', '#editPackage', function() {
  
          $.ajax({
              type: 'post',
              url: '/panel/admin/packages/update',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'package_name': $('input[name=edit_package_name]').val(),
                  'package_description': $('textarea[name=edit_package_description]').val(),
                  'package_plan_id': $('select[name=edit_package_plan_id]').val(),
                  'package_id': $('input[name=edit_package_id]').val()
              },
              success: function(data) {
                $('#editPackageModal').modal('toggle');
                
                $('.row'+ data.id).replaceWith(`
                <tr class="row${data.id}">
                    <td class="py-8">
                        <div class="d-flex align-items-center">
                            <div>
                                <a href="/panel/admin/packages/${data.id}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">${data.package_name}</a>
                                <span class="text-muted font-weight-bold d-block">${data.description}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.price}</span>
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.status}</span>
                        
                    </td>
                    
                    <td class="pr-0 text-right">
                        <a href="/panel/admin/packages/${data.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                    <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-package"
                        data-package_id="${data.id}"
                        data-package_name="${data.package_name}"
                        data-package_description="${data.description}"
                        data-package_price="${data.plan_name}"
                    ><i class="fas fa-pen"></i></a>
                    
                    <a href="javascript:;" id="modifypackage${data.id}" class="btn btn-sm btn-warning modify-package"
                        data-package_id="${data.id}"
                        data-package_status="inactive">
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
                toastr.success("Package updated");
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
    
    $("#addPackage").click(function(data) {
          $.ajax({
              type: 'post',
              url: '/panel/admin/packages/add',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'package_name': $('input[name=package_name]').val(),
                  'package_description': $('textarea[name=package_description]').val(),
                  'package_plan_id': $('select[name=plan_id]').val()
              },
              success: function(data) {
                $('#packageTable').append(`
                    <tr class="row${data.id}">
                        <td class="py-8">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="/panel/admin/packages/${data.id}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">${data.package_name}</a>
                                    <span class="text-muted font-weight-bold d-block">${data.description}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.price}</span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.status}</span>
                            
                        </td>
                        
                        <td class="pr-0 text-right">
                            <a href="/panel/admin/packages/${data.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                        <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-package"
                            data-package_id="${data.id}"
                            data-package_name="${data.package_name}"
                            data-package_description="${data.description}"
                            data-package_price="${data.plan_name}"
                        ><i class="fas fa-pen"></i></a>
                        
                        <a href="javascript:;" id="modifypackage${data.id}" class="btn btn-sm btn-warning modify-package"
                            data-package_id="${data.id}"
                            data-package_status="inactive">
                            <i class="far fa-eye-slash"></i>
                        </a>
                        
                        </td>
                    </tr>
                `);
                $('#package_name').val('');
                $('#package_description').val('');
                $('#addPackageModal').modal('toggle');
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
                toastr.success("Package added");
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
  