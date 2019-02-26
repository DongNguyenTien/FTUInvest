@extends('2019.layout')
@section('title','Trang chủ')
@section('content')

    <img class="cover" src="{{asset('/2019/cover-web-01.jpg')}}">
    <div class="text-center countdown homepage">
        <p>Bạn muốn khẳng định giá trị của bản thân trong chính lĩnh vực mà mình yêu thích. Để làm được điều đó, bạn không ngừng tìm kiếm các cơ hội tiếp cận với nghề nghiệp trong tương lai trước nhiều người giỏi và có cùng đam mê như mình. Tuy nhiên, nếu bạn nhận ra được cơ hội nào là đắt giá để thử, để trải nghiệm hết mình, đó đã là bước đầu thành công giúp bạn nâng tầm giá trị bản thân. Chúng tôi tin rằng:</p>
        <h3 class="text-main-color quotes">
            “Giá trị bản thân làm nên sự khác biệt”
        </h3>
        <i class="text-bold under-quotes">Sự khác biệt của người thành công và không thành công cũng nằm ở chỗ họ có nhìn ra được cơ hội tốt ngay trước mắt và nắm bắt lấy nó hay không.</i>
        <p></p>
        <p>Với sự đầu tư kỹ càng về quy mô cũng như chất lượng nội dung chuyên môn, <span class="text-bold">CLB Chứng khoán trường đại học Ngoại Thương (SIC)</span> hy vọng <span class="text-bold">Cuộc thi I-INVEST! 2019</span> sẽ là nơi tỏa sáng dành cho những sinh viên tài năng và khát khao khẳng định giá trị bản thân mình.</p>
        <div class="table-responsive " style="" >
            <table class="table no-border" style="margin-top: -6%;">
                <tbody>
                <tr>
                    <td style="text-align: right; padding-right: 5%;">
                        <h2 class="text-main-color">Bạn còn</h2>
                    </td>
                    <td class="time">
                        <span class="clock" id="countdown-day"></span>
                        <span class="after-clock">:</span>
                    </td>
                    <td class="time">
                        <span class="clock" id="countdown-hour"></span>
                        <span class="after-clock">:</span>
                    </td>
                    <td class="time">
                        <span class="clock" id="countdown-minute"></span>
                        <span class="after-clock">:</span>
                    </td>
                    <td class="time">
                        <span class="clock" id="countdown-second"></span>
                    </td>

                    <td style="text-align: left;">
                        <h2 class="text-main-color">để</h2>
                    </td>
                </tr>

                <tr>
                    <td ></td>

                    <td class="under-countdown">ngày</td>
                    <td class="under-countdown">giờ</td>
                    <td class="under-countdown">phút</td>
                    <td class="under-countdown">giây</td>

                    <td></td>
                </tr>

                </tbody>
            </table>

        </div>

        @if (\Illuminate\Support\Facades\Auth::check())
            <a type="button" id="btn-dangky" href="{{route('challenge')}}" class="btn" >Thử thách</a>
        @else
            <button type="button" id="btn-dangky" class="btn" data-toggle="modal" data-target=".challenge">Thử thách</button>

        @endif

    </div>


    <div class="modal fade challenge" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data" class="validate" id="form-input" method="post" action="{{route('loginPost')}}">
                    {{csrf_field()}}
                    <div id="overlay" style="display: none;">
                        <div class="sk-fading-circle" style="top:45%; margin: auto;">
                            <div class="sk-circle1 sk-circle"></div>
                            <div class="sk-circle2 sk-circle"></div>
                            <div class="sk-circle3 sk-circle"></div>
                            <div class="sk-circle4 sk-circle"></div>
                            <div class="sk-circle5 sk-circle"></div>
                            <div class="sk-circle6 sk-circle"></div>
                            <div class="sk-circle7 sk-circle"></div>
                            <div class="sk-circle8 sk-circle"></div>
                            <div class="sk-circle9 sk-circle"></div>
                            <div class="sk-circle10 sk-circle"></div>
                            <div class="sk-circle11 sk-circle"></div>
                            <div class="sk-circle12 sk-circle"></div>
                        </div>
                    </div>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Đăng nhập I-Invest 2019! </h4>
                    </div>

                    <div class="modal-body">

                        <div class="alert alert-info">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            (*) Nếu chưa có tài khoản, bạn vui lòng ấn nút "Đăng ký" để tham gia cuộc thi
                        </div>

                        <div class="alert alert-danger"  style="display: none; text-align: center">
                            <strong id="alert">Error!</strong>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email (*)</label>
                                    <input type="text" class="form-control" name="email" required>
                                </div>

                                <div class="form-group">
                                    <label >Mật khẩu (*)</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-lg btn-default" href="{{route('dangky')}}">Đăng ký</a>
                        <button type="submit" class="btn btn-lg btn-primary" id="button-submit">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script type="text/javascript" >
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-red',
                increaseArea: '20%' // optional
            });
            $('#datetimepicker').datetimepicker({
                format: "DD-MM-YYYY",
            });

            $("#form-input").validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
            });


            $('#form-input').on('submit',function(e) {
                e.preventDefault();
                if ($(this).valid()) {
                    $('#overlay').css('display','block');
                    $.post('{{route('loginPost')}}',$(this).serialize(), function(response) {
                        $('#overlay').css('display','none');
                        if (response.success == true) {
                            window.location.href = '{{route('challenge')}}'
                        } else {
                            alert(response.errors)
                        }

                    });
                }

                return false;
            });


            $('.clock').countdown('03/10/2019')
                .on('update.countdown', function(event) {
                    var totalDays= event.offset.totalDays;

                    $('span#countdown-day').html(totalDays);
                    $('span#countdown-hour').html(event.strftime('%H'));
                    $('span#countdown-minute').html(event.strftime('%M'));
                    $('span#countdown-second').html(event.strftime('%S'));


                })
                .on('finish.countdown', function(event) {
                    $('.table-responsive ').replaceWith('<h1>Thời gian đăng ký đã kết thúc</h1>')
                    $('#btn-thuthach').remove();

                });


        });








    </script>

@endsection