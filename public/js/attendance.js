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
                // toastr.options = {
                //     "closeButton": false,
                //     "debug": false,
                //     "newestOnTop": false,
                //     "progressBar": false,
                //     "positionClass": "toast-bottom-right",
                //     "preventDuplicates": false,
                //     "onclick": null,
                //     "showDuration": "300",
                //     "hideDuration": "1000",
                //     "timeOut": "5000",
                //     "extendedTimeOut": "1000",
                //     "showEasing": "swing",
                //     "hideEasing": "linear",
                //     "showMethod": "fadeIn",
                //     "hideMethod": "fadeOut"
                //   };
                // toastr.success("success...");
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
  