@extends('startup2019.layout')
@section('title','Trang chủ')
@section('content')
    <div class="container-startup">

        <div class="board row">
            {{--<div class="col-md-6 col-lg-6">--}}
                {{--<p class="sub-title">Thời gian</p>--}}
                {{--<div class="content-board">--}}
                    {{--<p>Bước vào cánh cổng Đại học, ai cũng mang theo</p>--}}
                    {{--<p><i><strong>Khai giảng:</strong> 19:00 thứ 2</i></p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-6 col-lg-6">--}}
                {{--<p class="sub-title">Địa điểm</p>--}}
                {{--<div class="content-board">--}}
                    {{--<p><strong>Funny ai cũng</strong></p>--}}
                    {{--<p>Tây sơn, đống đa</p>--}}
                {{--</div>--}}
            {{--</div>--}}

        </div>
        <img src="{{asset('/startup2019/cover.png?v=1.1')}}">
    </div>
    <div class="content-startup">
        <div class="text-center container">
            <div class="text-left" style="margin-top: 30px"></div>
            <p>Bước vào cánh cổng Đại học, ai cũng mang theo mình những khát vọng lớn lao cho tương lai của bản thân. Thế nhưng, chỉ có số ít người là thành công sau cùng với những điều mình mong muốn. Bởi chúng ta hầu hết đều bị vướng mắc bởi một rào cản nào đó, hay nói cách khác là chưa tìm được động lực để thử trải nghiệm, cố gắng hết mình. Vì vậy, trên con đường khám phá và chinh phục ước mơ, có những người sắp đi đến thành công thì giữa đường lại “quay đầu”.</p>

            <div style="margin: 40px 0">
                <div class="txtBorder "><i class="quote-home">Hãy nghiêm túc tìm ra “động lực thay đổi” của bản thân
                    </i> </div>
                <div class="txtBorder"><i class="quote-home"> và đầu tư cho tương lai của bạn ngay từ hôm nay.</i></div>
            </div>

            <br>
            <p><strong>Khóa học Chứng khoán Cơ bản START-UP 2019 </strong> CHÍNH THỨC TRỞ LẠI năm thứ 12 với nhiều đổi mới về chất lượng và phương thức tổ chức, tự tin mang lại một môi trường học tập thực tiễn, với những giá trị thiết thực, đem đến cho các bạn sinh viên cơ hội học tập và trao đổi cùng những vị chuyên gia hàng đầu trong lĩnh vực, nâng bước các bạn tiến tới thành công trên con đường Chứng khoán.</p>
            <div class="text-right thumb"></div>
        </div>
    </div>

    <div class="container text-center countdown">

        <div class="table-responsive " >
            <h2>Bạn còn</h2>
            <div class="list-cell-countdown">
                <div class="cell-countdown">
                    <h3 id="countdown-day"></h3>
                    <p>Ngày</p>
                </div>
                <div class="cell-countdown">
                    <h3 id="countdown-hour"></h3>
                    <p>Giờ</p>
                </div>
                <div class="cell-countdown">
                    <h3 id="countdown-minute"></h3>
                    <p>Phút</p>
                </div>
                <div class="cell-countdown">
                    <h3 id="countdown-second"></h3>
                    <p>Giây</p>
                </div>
            </div>

        </div>

        <a href={{route('dangky')}} type="button" id="btn-thuthach" class="btn" >Đăng ký ngay</a>

    </div>
    <div class="footer">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xs-12">
                <p><strong>LIÊN HỆ: </strong>Mr. Văn Long: 079 901 1640</p>
                <p class="text-footer-margin">Ms. Minh Anh: 079 620 0896</p>
            </div>
            <div class="col-md-4 col-lg-4 col-xs-12">
                <p><strong>WEBSITE: </strong>Start-up.sic-ftu.org</p>
                <p><strong>EMAIL: </strong>btcstu2019@gmail.com</p>
            </div>
            <div class="col-md-4 col-lg-4 col-xs-12">
                <p><strong>FACEBOOK: </strong>fb.com/startup.sic</p>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script type="text/javascript" >
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-purple',
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
                    $.post('{{route('register')}}',$(this).serialize(), function(response) {
                        $('#overlay').css('display','none');
                        if (response.status == 1) {
                            alert(response.method);
                            $(this).reset();
                        } else {
                            alert(response.message)
                        }

                    });
                }

                return false;
            });

            $('.input-group-addon').click(function(){
                $('#datetimepicker ').datetimepicker("show","format:\"DD-MM-YYYY\"");
            });




            $('.cell-countdown h3').countdown('11/17/2019')
                .on('update.countdown', function(event) {
                    var totalDays= event.offset.totalDays;

                    $('h3#countdown-day').html(totalDays);
                    $('h3#countdown-hour').html(event.strftime('%H'));
                    $('h3#countdown-minute').html(event.strftime('%M'));
                    $('h3#countdown-second').html(event.strftime('%S'));


                })
                .on('finish.countdown', function(event) {
                    $('.table-responsive ').replaceWith('<h1>Thời gian đăng ký đã kết thúc</h1>')
                    $('#btn-thuthach').remove();

                });

            $('input#isFriend').on('ifChecked',function (event) {
                $('input[name^="friend_"]').prop('required',true).prop('readonly',false);



            })
            $('input#isFriend').on('ifUnchecked',function (event) {
                $('input[name^="friend_"]').prop('required',false).prop('readonly',true);


            })
        });








    </script>

@endsection