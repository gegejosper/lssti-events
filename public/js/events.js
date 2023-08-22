$(document).ready(function() {
    $(document).on('click', '.add-event', function() {
        $('#addEventModal').modal('show');
        console.log('Clicked');
    });
    $(document).on('click', '.closemodify', function() {
        location.reload();
    });
    

    $(document).on('click', '.modify-event', function() {
        $('#event_modify_id').val($(this).data('event_id'));
        $('#event_modify_status').val($(this).data('event_status'));
        $('#modifyEventModal').modal('show');
    });
    
    $('.modal-footer').on('click', '#modifyEvent', function() {
  
        $.ajax({
            type: 'post',
            url: '/panel/admin/event/modify',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'event_id': $('input[name=event_modify_id]').val(),
                'event_status': $('input[name=event_modify_status]').val()
                
            },
            success: function(data) {
                $('#modifyEventModal').modal('toggle');
                $('#modifyEventModalSuccess').modal('show');
                
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


    $(document).on('click', '.edit-event', function() {
        $('#edit_event_name').val($(this).data('event_name'));
        $('#edit_event_id').val($(this).data('event_id'));
        $('#editEventModal').modal('show');
    });
    $('.modal-footer').on('click', '#editEvent', function() {
  
          $.ajax({
              type: 'post',
              url: '/panel/admin/event/update',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'event_name': $('input[name=edit_event_name]').val(),
                  'event_date': $('input[name=edit_event_date]').val(),
                  'event_id': $('input[name=edit_event_id]').val()
              },
              success: function(data) {
                $('#editEventModal').modal('toggle');
                
                $('.row'+ data.id).replaceWith(`
                <tr class="row${data.id}">
                    <td class="py-8">
                        <div class="d-flex align-items-center">
                            <div>
                                ${data.event_name}
                                
                            </div>
                        </div>
                    </td>
                    <td>
                        <strong>${data.event_date}</strong>
                    </td>
                    <td>
                        <strong>${data.status}</strong>
                    </td>
                    <td class="pr-0 text-right">
                    <a href="/panel/admin/event/${data.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                    <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-event"
                        data-event_id="${data.id}"
                        data-event_name="${data.event_name}"
                        data-event_date="${data.event_date}"
                    ><i class="fas fa-pen"></i></a>
                    
                    <a href="javascript:;" id="modifyevent${data.id}" class="btn btn-sm btn-warning modify-event"
                        data-event_id="${data.id}"
                        data-event_status="inactive">
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
                toastr.success("Event updated...");
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
    
    $("#addEvent").click(function(data) {
          $.ajax({
              type: 'post',
              url: '/panel/admin/event/add',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'event_name': $('input[name=event_name]').val(),
                  'event_date': $('input[name=event_date]').val()
              },
              success: function(data) {
                $('#eventTable').append(`
                    <tr class="row${data.id}">
                        <td class="py-8">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="/panel/admin/event/${data.id}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">${data.event_name}</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <strong>${data.event_date}</strong>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">${data.status}</span>
                            
                        </td>
                        
                        <td class="pr-0 text-right">
                            <a href="/panel/admin/event/${data.id}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                        <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-event"
                            data-event_id="${data.id}"
                            data-event_name="${data.event_name}"
                            data-event_date="${data.event_date}"
    
                        ><i class="fas fa-pen"></i></a>
                        
                        <a href="javascript:;" id="modifyevent${data.id}" class="btn btn-sm btn-warning modify-event"
                            data-event_id="${data.id}"
                            data-event_status="inactive">
                            <i class="far fa-eye-slash"></i>
                        </a>
                        
                        </td>
                    </tr>
                `);
                $('#event').val('');

                $('#addEventModal').modal('toggle');
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
  