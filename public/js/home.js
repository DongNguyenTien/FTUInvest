$(function () {
    $('#datetimepicker').datetimepicker({
        format: "DD-MM-YYYY",
    });

});

$(document).ready(function(){

    //Initialization
    $('.modal').modal({
        inDuration: 150,
        outDuration: 150
    });
    $('select').formSelect();

    $('.input-group-addon').click(function(){
        $('#datetimepicker ').datetimepicker("show","format:\"DD-MM-YYYY\"");
    });
});



        $('.clock').countdown('05/04/2019')
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



/**
 *
 * @returns {boolean}
 */
$("form#form-register").validate({
    errorPlacement: function(error, element) {},
    // errorClass:"errormassagevalide",
    // rules: {
    //     OPRID: "required",
    //     OPRDEFNDESC: "required"
    //     //other form element
    //
    // },
    // messages: {
    //     OPRID: "please  insert please ",
    //     OPRDEFNDESC: " please  insert OPRDEFNDESC"
    // },
    // highlight: function(element) {
    //     jQuery(element).parent().addClass("has-error");
    // },
    // unhighlight: function(element) {
    //     jQuery(element).parent().removeClass("has-error");
    // },
    submitHandler: function(form) {//your ajax code
        var data = new FormData($("form#form-register")[0]);
        // console.log(data);
        $.ajax({
            beforeSend: function() {
                on();
            },
            url: '/subscribe',
            type: 'post',
            data: data,

            // Do something while uploading file finish
            success: function(data) {

                off();

                if (data['success'] === 1) {
                    // window.location.href = '/challenge';
                    alert(123);
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
    },
});





/**
 *
 * @returns {number}
 */
function validateData() {
    var flag = 0;
    //
    // $('input[type=text]').each(function(){
    //     $(this).css('border','1px solid black');
    //     if ($(this).val() == "" && $(this).attr('name')!== "facebook") {
    //         flag = 1;
    //         $(this).effect( "bounce" );
    //         $(this).css('border','1px solid red');
    //
    //     }
    // });
    //
    // if ($('input[type=email]').val() === "") {
    //     flag = 1;
    //     $('input[type=email]').effect( "bounce" );
    //     $('input[type=email]').css('border','1px solid red');
    // } else {
    //     $('input[type=email]').css('border','1px solid black');
    // }
    //
    return flag;
}





