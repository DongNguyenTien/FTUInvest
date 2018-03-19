@extends('layout')
@section('title','Thử thách')
@section('content')

    <div class="container">
        <div class="text-center">
            <h4 style="color: #f3f3f3 !important;"> Cuộc thi <span style="color: #198440;font-size: 110%">I-INVEST! 2018 </span> </h4>
            <h1 style="color: #198440" > VÒNG 1: I-START! </h1>
            <div class="separate-content"></div>
        </div>

        <div style="float:right">
            <span class="count-time" >45 phút: 00 giây</span>
        </div>

        <div class="container test-content" >


            <div id="overlay" style="display: none;">
                <div class="countdown-challenge">
                    <h1 style="color: #0c0c0c">Chuẩn bị làm bài trong</h1>
                    <div class="seconds-wrapper">
                        <span class="seconds" id="ready"></span> <br>giây
                    </div>
                </div>

            </div>


            <div id="rule">
                <p style="color: #000"> Bài thi sẽ được công nhận ngay sau khi bạn nhấn nút "nộp bài". Bạn chỉ được quyền làm bài thi một lần duy nhất và chúng tôi sẽ lấy kết quả thi Vòng 1 của bạn. BTC được quyền hủy bỏ kết quả thi nếu phát hiện có bất kì gian lận nào trong quá trình làm bài.
                    <br>
                    Bài thi gồm 40 câu hỏi trắc nghiệm. Bạn có tối đa 45' thời gian làm bài. Chúc bạn may mắn !
                <div class="checkbox">
                    <label><input type="checkbox" value="1">Tôi đã đọc và đồng ý</label>
                </div>

                </p>

                <div class="separate-content" style="width: 100%"></div>
            </div>



            <form action="{{route('submit_result')}}" method="post" id="result">
                {{csrf_field()}}
                <input hidden value="{{$checking}}" name="checking">
            <div id="list-question" hidden>

                <input type="submit" class="btn btn-challenge btn-lg center-block" style="" value="NỘP BÀI">

            </div>
            </form>

            </div>
        </div>
    </div>
    @endsection

@section('scripts')
    <script type="text/javascript">
        var html = "";
        var array_question = {!! $list_question !!};

        for(var i = 0; i < array_question.length; i++) {
            html += '<div class="header-question">' +
                '                    <h5> <b>Câu '+ (i+1) +': </b>'+array_question[i].question+' </h5>';

            if (array_question[i].image !== null) {
                html +=  '<img class="img-question" src="'+array_question[i].image+'">';
            }

            html+=
                '                    <div class="row answer-between">' +
                '                        <div class="answer-left col-md-4">' +
                '                            <div class="radio">' +
                '                                <label>' +
                '                                    <input type="radio" name="'+i+'" value="0">'+array_question[i].answer[0]+'' +
                '                                </label>' +
                '                            </div>' +
                '                        </div>' +
                '                        <div class="col-md-offset-3 col-md-4">' +
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
                '                        <div class="col-md-offset-3 col-md-4">' +
                '                            <div class="radio">' +
                '                                <label>' +
                '                                    <input type="radio" name="'+i+'" value="3">'+array_question[i].answer[3]+'' +
                '                                </label>' +
                '                            </div>' +
                '                        </div>' +
                '                    </div>' +
                '                </div>'
        }


        $('input[type=checkbox]').click(function(e){
            var now = new Date();

            $(this).attr("check","check");
            $("body").css("overflow", "hidden");
            $('#overlay').css('display','block');


            $('#ready').countdown(new Date(+now + 10000))
                .on('update.countdown', function(event) {
                    var format = '%-S';
                    $(this).html(event.strftime(format));
                })

                .on('finish.countdown', function(event) {
                    $('#overlay').css('display','none');
                    $("body").css("overflow", "auto");

                    $('#list-question').prepend(html);
                    $('#list-question').css('display','block');

                    $('#rule').css('display','none');



                    $('.count-time').countdown(new Date(+now + 271e4))
                    // $('.count-time').countdown(new Date(+now + 100000))
                        .on('update.countdown', function(event) {
                            var format = '%-M phút : %-S giây';
                            $(this).html(event.strftime(format));
                        })

                        .on('finish.countdown', function(event) {
                            $('form#result').submit();
                        });

                });
        })


    </script>
@endsection