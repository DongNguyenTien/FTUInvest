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



            <div id="list-question" style="display: none">
                <!-- cau hoi 2-->
                <div style="margin-top: 30px">
                    <h5> <b>Câu 2:</b> Đề bài (abscmsadasirpsadpasdasd) </h5>
                    <div style="margin-top:20px" class="row">
                        <div class="col-md-offset-1 col-md-7">
                            <lable class="radio-inline">
                                <input type="radio" name="optradio">Đáp án 1
                            </lable>
                        </div>
                        <div class="col-md-4">
                            <lable class="radio-inline">
                                <input type="radio" name="optradio">Đáp án 2
                            </lable>
                        </div>
                    </div>
                    <div style="margin-top:20px" class="row">
                        <div class="col-md-offset-1 col-md-7">
                            <lable class="radio-inline">
                                <input type="radio" name="optradio">Đáp án 3
                            </lable>
                        </div>
                        <div class="col-md-4">
                            <lable class="radio-inline">
                                <input type="radio" name="optradio">Đáp án 4
                            </lable>
                        </div>
                    </div>
                </div>
                <!-- cau hoi 2-->
                <div style="margin-top: 30px">
                    <h5> <b>Câu 3:</b> Đề bài (abscmsadasirpsadpasdasd) </h5>
                    <div style="margin-top:20px" class="row">
                        <div class="col-md-offset-1 col-md-7">
                            <lable class="radio-inline">
                                <input type="radio" name="optradio2">Đáp án 1
                            </lable>
                        </div>
                        <div class="col-md-4">
                            <lable class="radio-inline">
                                <input type="radio" name="optradio2">Đáp án 2
                            </lable>
                        </div>
                    </div>
                    <div style="margin-top:20px" class="row">
                        <div class="col-md-offset-1 col-md-7">
                            <lable class="radio-inline">
                                <input type="radio" name="optradio2">Đáp án 3
                            </lable>
                        </div>
                        <div class="col-md-4">
                            <lable class="radio-inline">
                                <input type="radio" name="optradio2">Đáp án 4
                            </lable>
                        </div>
                    </div>
                </div>

                <!-- cau hoi 2-->
                <div style="margin-top: 30px">
                    <h5> <b>Câu 4:</b> Đề bài (abscmsadasirpsadpasdasd) </h5>
                    <div style="margin-top:20px" class="row">
                        <div class="col-md-offset-1 col-md-7">
                            <lable class="radio-inline">
                                <input type="radio" name="optradio">Đáp án 1
                        </div>
                        <div class="col-md-4">
                            <lable class="radio-inline">
                                <input type="radio" name="optradio">Đáp án 2
                            </lable>
                        </div>
                    </div>
                    <div style="margin-top:20px" class="row">
                        <div class="col-md-offset-1 col-md-7">
                            <lable class="radio-inline">
                                <input type="radio" name="optradio">Đáp án 3
                            </lable>
                        </div>
                        <div class="col-md-4">
                            <lable class="radio-inline">
                                <input type="radio" name="optradio">Đáp án 4
                            </lable>
                        </div>
                    </div>
                </div>

                <!-- cau hoi 2-->
                <div style="margin-top: 30px">
                    <h5> <b>Câu 5:</b> Đề bài (abscmsadasirpsadpasdasd) </h5>
                    <div style="margin-top:20px" class="row">
                        <div class="col-md-offset-1 col-md-7">
                            <lable class="radio-inline">
                                <input type="radio" name="optradio">Đáp án 1
                        </div>
                        <div class="col-md-4">
                            <lable class="radio-inline">
                                <input type="radio" name="optradio">Đáp án 2
                            </lable>
                        </div>
                    </div>
                    <div style="margin-top:20px" class="row">
                        <div class="col-md-offset-1 col-md-7">
                            <lable class="radio-inline">
                                <input type="radio" name="optradio">Đáp án 3
                            </lable>
                        </div>
                        <div class="col-md-4">
                            <lable class="radio-inline">
                                <input type="radio" name="optradio">Đáp án 4
                            </lable>
                        </div>
                    </div>
            </div>
                <input type="submit" class="btn btn-challenge btn-lg" style="" value="NỘP BÀI">

            </div>
        </div>
    </div>
    @endsection

@section('scripts')
    <script type="text/javascript">




        $('input[type=checkbox]').click(function(e){

            $(this).attr("check","check");
            $("body").css("overflow", "hidden");
            $('#overlay').css('display','block');
            $('#ready').countdown('{{date('Y-m-d H:i:s',strtotime('+10 seconds'))}}')
                .on('update.countdown', function(event) {
                    var format = '%-S';
                    $(this).html(event.strftime(format));
                })

                .on('finish.countdown', function(event) {
                    $('#overlay').css('display','none');
                    $('#list-question').css('display','block');
                    $('#rule').css('display','none');
                    $("body").css("overflow", "auto");



                    $('.count-time').countdown('{{date('Y-m-d H:i:s',strtotime('+2709 seconds'))}}')
                        .on('update.countdown', function(event) {
                            var format = '%-M phút : %-S giây';
                            $(this).html(event.strftime(format));
                        })

                        .on('finish.countdown', function(event) {
                            $(this).html('This offer has expired!')
                                .parent().addClass('disabled');

                        });

                });
        })


    </script>
@endsection