@extends('2019.layout')
@section('title','Thử thách')
@section('content')
    <div class="text-center">
        <h2 class="home-title">Cuộc thi i-invest! 2019</h2>
        <h1 class="home-title round-1">vòng 1</h1>
    </div>
    <div>


        <div class="container-info test-content text-center">


            <div id="overlay" style="display: none;">
                <div class="countdown-challenge">
                    <h1 style="color: #0c0c0c">Chuẩn bị làm bài trong</h1>
                    <div class="seconds-wrapper">
                        <span class="seconds" id="ready"></span> <br>giây
                    </div>
                </div>

            </div>


            <div id="rule">
                <p>Bài thi gồm <span class="text-bold">20 câu hỏi trắc nghiệm</span></p>
                <p style="margin-bottom: 30px;">Thời gian làm bài <span class="text-bold">20 phút </span></p>

                <i><u>Lưu ý trước khi làm bài:</u></i>
                <p style="margin-top: 15px;">- Bạn chỉ được quyền làm bài thi <strong class="text-bold">một lần duy
                        nhất.</strong></p>
                <p>- BTC được quyền hủy bỏ kết quả thi nếu phát hiện có bất kỳ gian lận nào trong quá trình làm bài.</p>
                <p>Chúc bạn may mắn!</p>

                <div class="margin-top">
                    <input type="checkbox" class="check-accept"><span
                            class="text-main-color">Tôi đã đọc và đồng ý.</span>
                </div>
            </div>


            <form action="{{route('submit_result')}}" method="post" id="result">
                {{csrf_field()}}
                <input hidden id="check" value="" name="checking">
                <div id="list-question" hidden>

                    <input type="submit" class="btn btn-challenge btn-lg center-block" style="" value="NỘP BÀI">

                </div>
            </form>

        </div>
    </div>

    <div id="someid"></div>
@endsection
<div style="float:right">
    <span class="count-time">20':00</span>
</div>
@section('scripts')
    <script type="text/javascript">
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-red',
            increaseArea: '20%' // optional
        });

        var html = "";


        $('input[type=checkbox]').on('ifChecked',function(e){
            var now = new Date();

            $(this).attr("check","check");
            $("body").css("overflow", "hidden");
            $('#overlay').css('display','block');


            $('#ready').countdown(new Date(+now + 1000))
                .on('update.countdown', function(event) {
                    var format = '%-S';
                    $(this).html(event.strftime(format));
                })

                .on('finish.countdown', function(event) {
                    $('#overlay').css('display','none');
                    $("body").css("overflow", "auto");

                    var data = $.post('{{route('getExam')}}',[], function(response){
                        html = generate(response.exam)

                        $('#list-question').closest('.container-info').removeClass('container-info text-center').addClass('container-question')
                        $('#list-question').prepend(html);
                        $('#list-question').css('display','block');
                        $('input#check').val(response.check)

                        $('#rule').css('display','none');



                        $('.count-time').countdown(new Date(+now + 120e4))
                        // $('.count-time').countdown(new Date(+now + 100000))
                            .on('update.countdown', function(event) {
                                var format = "%-M':%-S";
                                $(this).html(event.strftime(format));
                            })

                            .on('finish.countdown', function(event) {
                                $('form#result').submit();
                            });
                    });



                });
        })

        function generate(array_question) {
            for(var i = 0; i < array_question.length; i++) {
                html += '<div class="header-question">' +
                    '                    <h4> <strong class="text-bold">Câu '+ (i+1) +': </strong>'+array_question[i].question+' :</h4>';


                html+=
                    '                    <div class="row answer-between">' +
                    '                        <div class="answer-left col-md-4">' +
                    '                            <div class="radio">' +
                    '                                <label>' +
                    '                                    <input type="radio" name="'+i+'" value="0">'+array_question[i].answer[0]+'' +
                    '                                </label>' +
                    '                            </div>' +
                    '                        </div>' +
                    '                        <div class="col-md-offset-2 col-md-4">' +
                    '                            <div class="radio">' +
                    '                                <label>' +
                    '                                    <input type="radio" name="'+i+'" value="1">'+array_question[i].answer[1]+' ' +
                    '                                </label>' +
                    '                            </div>' +
                    '                        </div>' +
                    '                    </div>' +
                    '                    <div class="row">' +
                    '                        <div class="answer-left col-md-4">' +
                    '                            <div class="radio">' +
                    '                                <label>' +
                    '                                    <input type="radio" name="'+i+'" value="2">'+array_question[i].answer[2]+'' +
                    '                                </label>' +
                    '                            </div>' +
                    '                        </div>' +
                    '                        <div class="col-md-offset-2 col-md-4">' +
                    '                            <div class="radio">' +
                    '                                <label>' +
                    '                                    <input type="radio" name="'+i+'" value="3">'+array_question[i].answer[3]+'' +
                    '                                </label>' +
                    '                            </div>' +
                    '                        </div>' +
                    '                    </div>' +
                    '                </div>'
            }

            return html
        }

    </script>
@endsection