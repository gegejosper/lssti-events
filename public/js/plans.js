$(document).ready(function() {
    $(document).on('click', '.add-plan', function() {
        $('#addPlanModal').modal('show');
        console.log('Clicked');
    });
    $(document).on('click', '.closemodify', function() {
        location.reload();
    });
    

    $(document).on('click', '.modify-plan', function() {
        $('#plan_modify_id').val($(this).data('plan_id'));
        $('#plan_modify_status').val($(this).data('plan_status'));
        $('#modifyPlanModal').modal('show');
    });
    
    $('.modal-footer').on('click', '#modifyPlan', function() {
  
        $.ajax({
            type: 'post',
            url: '/panel/admin/plans/modify',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'plan_id': $('input[name=plan_modify_id]').val(),
                'plan_status': $('input[name=plan_modify_status]').val()
                
            },
            success: function(data) {
                $('#modifyPlanModal').modal('toggle');
                $('#modifyPlanModalSuccess').modal('show');
                
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


    $(document).on('click', '.edit-plan', function() {
        $('#edit_plan_name').val($(this).data('plan_name'));
        $('#edit_plan_description').val($(this).data('plan_description'));
        $('#edit_plan_price').val($(this).data('plan_price'));
        $('#edit_plan_id').val($(this).data('plan_id'));
        $('#editPlanModal').modal('show');
    });
    $('.modal-footer').on('click', '#editPlan', function() {
  
          $.ajax({
              type: 'post',
              url: '/panel/admin/plans/update',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'plan_name': $('input[name=edit_plan_name]').val(),
                  'plan_description': $('textarea[name=edit_plan_description]').val(),
                  'plan_price': $('input[name=edit_plan_price]').val(),
                  'plan_id': $('input[name=edit_plan_id]').val()
              },
              success: function(data) {
                $('#editPlanModal').modal('toggle');
                
                $('.row'+ data.id).replaceWith(`
                <tr class="row${data.id}">
                    <td class="py-8">
                        <div class="d-flex align-items-center">
                            <div>
                                <a href="/panel/admin/plans/${data.id}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">${data.plan_name}</a>
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
                        <a href="/panel/admin/plans/${data.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                    <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-plan"
                        data-plan_id="${data.id}"
                        data-plan_name="${data.plan_name}"
                        data-plan_description="${data.description}"
                        data-plan_price="${data.price}"
                    ><i class="fas fa-pen"></i></a>
                    
                    <a href="javascript:;" id="modifyplan${data.id}" class="btn btn-sm btn-warning modify-plan"
                        data-plan_id="${data.id}"
                        data-plan_status="inactive">
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
                toastr.success("Plan updated");
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
    
    $("#addPlan").click(function(data) {
          $.ajax({
              type: 'post',
              url: '/panel/admin/plans/add',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'plan_name': $('input[name=plan_name]').val(),
                  'plan_description': $('textarea[name=plan_description]').val(),
                  'plan_price': $('input[name=plan_price]').val()
              },
              success: function(data) {
                $('#planTable').append(`
                    <tr class="row${data.id}">
                        <td class="py-8">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="/panel/admin/plans/${data.id}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">${data.plan_name}</a>
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
                            <a href="/panel/admin/plans/${data.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                        <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-plan"
                            data-plan_id="${data.id}"
                            data-plan_name="${data.plan_name}"
                            data-plan_description="${data.description}"
                            data-plan_price="${data.price}"
                        ><i class="fas fa-pen"></i></a>
                        
                        <a href="javascript:;" id="modifyplan${data.id}" class="btn btn-sm btn-warning modify-plan"
                            data-plan_id="${data.id}"
                            data-plan_status="inactive">
                            <i class="far fa-eye-slash"></i>
                        </a>
                        
                        </td>
                    </tr>
                `);
                $('#plan_name').val('');
                $('#plan_description').val('');
                $('#plan_price').val(0);
                $('#addPlanModal').modal('toggle');
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
                toastr.success("Plan added");
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
  