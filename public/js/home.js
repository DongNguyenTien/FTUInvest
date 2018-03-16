$(function () {
    $('#datetimepicker').datetimepicker({
        format: "DD-MM-YYYY",
    });

});

$(document).ready(function(){
    $('.input-group-addon').click(function(){
        $('#datetimepicker ').datetimepicker("show","format:\"DD-MM-YYYY\"");
    });
});


$('.clock').countdown('04/17/2018')
    .on('update.countdown', function(event) {
        var format = '%-H : %-M : %-S';

        var totalDays= event.offset.weeks * 7 + event.offset.totalDays;
        var hours = event.offset.hours;
        var minutes = event.offset.minutes;
        var seconds = event.offset.seconds;


        $('span#countdown-day').html(totalDays);
        $('span#countdown-hour').html(event.strftime('%H'));
        $('span#countdown-minute').html(event.strftime('%M'));
        $('span#countdown-second').html(event.strftime('%S'));


    })

    .on('finish.countdown', function(event) {
        $(this).html('This offer has expired!')
            .parent().addClass('disabled');

    });

/**
 *
 * @returns {boolean}
 */
function challenge() {
    //Validate
    var flag = validateData();

    if (flag === 0) {
        var data = new FormData($("form#form-register")[0]);
        console.log(data);
        $.ajax({
            beforeSend: function() {
                on();
            },
            url: '/register',
            type: 'post',
            data: data,

            // Do something while uploading file finish
            success: function(data) {

                off();

                if (data['success'] === 1) {
                    window.location.href = '/challenge';

                    return false;
                } else {
                    console.log(data);
                    $('.error').remove();
                    $('#alert').after('<span class="error"> '+data['messages']+'</span>');
                    $('.alert-danger').css('display','block');

                    return false;
                }
            },

            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    } else {
        off();
        return false;
    }
}


/**
 *
 * @returns {number}
 */
function validateData() {
    var flag = 0;

    $('input[type=text]').each(function(){
        $(this).css('border','1px solid black');
        if ($(this).val() == "") {
            flag = 1;
            $(this).effect( "bounce" );
            $(this).css('border','1px solid red');

        }
    });

    if ($('input[type=email]').val() === "") {
        flag = 1;
        $('input[type=email]').effect( "bounce" );
        $('input[type=email]').css('border','1px solid red');
    } else {
        $('input[type=email]').css('border','1px solid black');
    }

    return flag;
}
