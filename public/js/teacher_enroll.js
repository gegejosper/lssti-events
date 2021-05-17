$(document).ready(function() {

    $(document).on('click', '.closemodify', function() {
        location.reload();
        //window.location.href = "/panel/student/attendance";
    });
    

    $(document).on('click', '.approve-subject', function() {
        $('#schedule_id').val($(this).data('schedule_id'));
        $('#modifyEnrollModal').modal('show');
    });

    $('.modal-footer').on('click', '#processEnroll', function() {
  
        $.ajax({
            type: 'post',
            url: '/panel/teacher/enroll/approve',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'schedule_id': $('input[name=schedule_id]').val()
                
            },
            success: function(data) {
                $('#modifyEnrollModal').modal('toggle');
                $('#modifyEnrollModalSuccess').modal('show');
                
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
  