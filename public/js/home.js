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


$('.clock').countdown('03/19/2018 21:00:00')
    .on('update.countdown', function(event) {

        var totalDays= event.offset.totalDays;


        $('span#countdown-day').html(totalDays);
        $('span#countdown-hour').html(event.strftime('%H'));
        $('span#countdown-minute').html(event.strftime('%M'));
        $('span#countdown-second').html(event.strftime('%S'));

        $('#btn-thuthach').prop('disabled',true);

    })

    .on('finish.countdown', function(event) {
        $('#btn-thuthach').css('disable','');

        $('.clock').countdown('04/05/2018')
        .on('update.countdown', function(event) {
            var totalDays= event.offset.totalDays;

            $('span#countdown-day').html(totalDays);
            $('span#countdown-hour').html(event.strftime('%H'));
            $('span#countdown-minute').html(event.strftime('%M'));
            $('span#countdown-second').html(event.strftime('%S'));


        })
            .on('finish.countdown', function(event) {
                $('.table-responsive ').replaceWith('<h1>Thời gian thử thách đã kết thúc</h1>')
                $('#btn-thuthach').remove();

            });

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
