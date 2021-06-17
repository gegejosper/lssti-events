$(document).ready(function() {

    $(document).on('click', '.closemodify', function() {
        //location.reload();
        window.location.href = "/panel/student/attendance";
    });
    

    $(document).on('click', '.mark-present', function() {
        $('#schedule_id').val($(this).data('schedule_id'));
        var schedule_id =$(this).data('schedule_id');
        var student_id =$(this).data('student_id');

        $.ajax({
            type: 'post',
            url: '/panel/teacher/present/student',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'schedule_id': schedule_id,
                'student_id' : student_id
                
            },
            success: function(data) {

                location.reload();
                
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

    $(document).on('click', '.mark-late', function() {
        $('#schedule_id').val($(this).data('schedule_id'));
        var schedule_id =$(this).data('schedule_id');
        var student_id =$(this).data('student_id');

        $.ajax({
            type: 'post',
            url: '/panel/teacher/late/student',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'schedule_id': schedule_id,
                'student_id' : student_id
                
            },
            success: function(data) {

                location.reload();
                
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

    $('.modal-footer').on('click', '#processEnroll', function() {
  
        
    });

  });
  