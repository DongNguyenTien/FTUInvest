@extends('2019.layout')
@section('title','Trang chủ')
@section('banner')

    @endsection
@section('content')
    <div class="banner-final" style="background-image: url('/2019/final_images/banner.jpg?v=1.1')">
{{--        <img class="" src="{{asset('/2019/placeholder-banner.jpg')}}">--}}
    </div>
    <div class="container text-center countdown final-margin" >
        <div class="title-countdown">
            <h1 class="color-text-gradient">Thời gian đăng ký đã kết thúc</h1>
        </div>
        {{--<div class="table-responsive final-homepage" >--}}
            {{--<table class="table no-border" style="display: flex; justify-content: center">--}}
                {{--<tbody>--}}
                {{--<tr >--}}
                    {{--<td class="time">--}}
                        {{--<span class="clock" id="countdown-day"></span>--}}
                    {{--</td>--}}
                    {{--<td class="">--}}
                        {{--<span class="after-clock-final">:</span>--}}
                    {{--</td>--}}
                    {{--<td class="time">--}}
                        {{--<span class="clock" id="countdown-hour"></span>--}}
                    {{--</td>--}}
                    {{--<td class="">--}}
                        {{--<span class="after-clock-final">:</span>--}}
                    {{--</td>--}}
                    {{--<td class="time">--}}
                        {{--<span class="clock" id="countdown-minute"></span>--}}
                    {{--</td>--}}
                    {{--<td class="">--}}
                        {{--<span class="after-clock-final">:</span>--}}
                    {{--</td>--}}
                    {{--<td class="time">--}}
                        {{--<span class="clock" id="countdown-second"></span>--}}
                    {{--</td>--}}


                {{--</tr>--}}

                {{--<tr>--}}
                    {{--<td class="under-countdown">DAYS</td>--}}
                    {{--<td class="">--}}
                        {{--<span class="after-clock-final"></span>--}}
                    {{--</td>--}}
                    {{--<td class="under-countdown">HOURS</td>--}}
                    {{--<td class="">--}}
                        {{--<span class="after-clock-final"></span>--}}
                    {{--</td>--}}
                    {{--<td class="under-countdown">MINUTES</td>--}}
                    {{--<td class="">--}}
                        {{--<span class="after-clock-final"></span>--}}
                    {{--</td>--}}
                    {{--<td class="under-countdown">SECONDS</td>--}}

                {{--</tr>--}}

                {{--</tbody>--}}
            {{--</table>--}}

        </div>

        {{--<a type="button" id="btn-thuthach" class="btn button-final" href="{{route('dangky')}}"><span>Đăng ký ngay</span></a>--}}

    </div>
    <div class="container-price" >

        <div class="contest-rule">
            <div class="row">
                <div class="col-md-5 col-xs-12">
                    <div class="rule-left">
                        <div class="restric-title-final">
                            <h1 class="home-title tongquan-title" style="letter-spacing: 4px;">CHẶNG ĐUA </h1>
                            <h1 class="home-title tongquan-title"><span class="block-span"></span>CUỐI CÙNG </h1>
                        </div>

                        <img class="light" src="{{asset('/2019/logo-01.png')}}">
                        <img style="width: 12%;position: absolute;left: 58%; top: 49%; opacity: 0.2;" src="{{asset('/2019/yellow.png')}}">
                        <img style="width: 8%;position: absolute;left: 30%;top: 35%; opacity: 0.1;" src="{{asset('/2019/yellow.png')}}">
                        <img style="width: 11%;position: absolute;left: 80%;top: 30%; opacity: 0.53;" src="{{asset('/2019/yellow.png')}}">
                        <img style="width: 7%;position: absolute;left: 64%;top: 28%; opacity: 0.45;" src="{{asset('/2019/yellow.png')}}">
                        <img style="width: 4%;position: absolute;left: 83%;top: 44%; opacity: 0.67;" src="{{asset('/2019/yellow.png')}}">

                        <img style="width: 5%;position: absolute;left: 60%;top: 70%; opacity: 0.6;" src="{{asset('/2019/yellow.png')}}">

                        <img style="width: 4%;position: absolute;left: 50%; top: 40%; opacity: 0.3;" src="{{asset('/2019/yellow.png')}}">
                        <img style="width: 9%;position: absolute;left: 40%;top: 45%; opacity: 0.7;" src="{{asset('/2019/yellow.png')}}">
                        <img style="width: 11%;position: absolute;left: 73%;top: 58%; opacity: 0.2;" src="{{asset('/2019/yellow.png')}}">
                        <img style="width: 3%;position: absolute;left: 20%;top: 80%; opacity: 0.5;" src="{{asset('/2019/yellow.png')}}">
                    </div>
                </div>
                <div class="col-md-7 col-xs-12 rule-right-final" >
                    <div class="long-text-final">
                        So tài tại Cuộc thi Tài chính - Chứng khoán lớn nhất miền Bắc dành cho sinh viên, mỗi một thí sinh đến với <strong>I-INVEST! 2019</strong> đều mang trong mình ý chí vươn lên mạnh mẽ, nhằm hướng tới một Trải nghiệm khác biệt thách thức những giới hạn của bản thân mình. Mỗi vòng thi đã qua là một chặng đua với mức độ tăng dần khó khăn, thử thách, đòi hỏi thí sinh không ngừng nâng cao kiến thức, kỹ năng cũng như sự can đảm và quyết tâm để vượt qua nó.
                    </div>
                    <div class="long-text-final">
                        Bứt phá ngoạn mục để tiến gần hơn về vạch đích, đường đua tới ngôi vị Quán quân của Cuộc thi <strong>I-INVEST! 2019</strong> đã nhường lại cho 05 thí sinh xuất sắc nhất. Chặng đua cuối cùng - <strong>Đêm GALA Chung kết I-SHINE!</strong> hứa hẹn sẽ đem tới những màn trình diễn Ấn tượng - Quyết liệt và là một sân khấu bùng nổ, là nơi tỏa sáng của 05 ứng cử viên tài năng nhất Cuộc thi.
                    </div>
                    <div class="long-text-final">
                        05 thí sinh - 05 cá tính riêng biệt, ai sẽ người bước lên đỉnh vinh quang để nâng cao chiếc cúp vô địch và khẳng định giá trị bản thân mình? Tất cả sẽ được làm sáng tỏ tại <strong>Đêm GALA Chung kết I-SHINE!</strong> - Đêm thi của những nhiệt huyết bùng cháy.
                    </div>

                </div>

                <div class="col-md-12 col-lg-12 top5-final col-xs-12">
                    <div class="row">
                        <div class="col-md-9 col-lg-9 col-xs-12">
                            <div class="slider-top5">
                                <img src="{{asset('/2019/final_images/top-5-01.jpg?v=1.1')}}">
                                <img src="{{asset('/2019/final_images/top-5-02.jpg')}}">
                                <img src="{{asset('/2019/final_images/top-5-04.jpg')}}">
                                <img src="{{asset('/2019/final_images/top-5-03.jpg')}}">
                                <img src="{{asset('/2019/final_images/top-5-06.jpg')}}">
                                <img src="{{asset('/2019/final_images/top-5-05.jpg')}}">
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xs-12">
                            <div class="top5-title">
                                <h1 class="home-title tongquan-title">Top 05 <span class="block-span"></span></h1>
                                <h1 class="home-title tongquan-title">i-invest! </h1>
                                <h1 class="home-title tongquan-title">2019 </h1>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-md-12 col-xs-12 price-minus" style="margin-top: 10%">
                    <div class="text-center">
                        <h1 class="home-title round-1">GIẢI THƯỞNG</h1>
                    </div>
                </div>
            </div>






        </div>

        <div class="row text-center">
            <div class="col-md-4">
                <h3 class="text-main-color text-price-label text-bold">Giải nhất </h3>
                <div class="price-box">
                    <div class="price" >
                        <p class="price-money text-bold">165.000.000 VNĐ</p>
                    </div>
                    <div class="price-box-extra">
                        <p> 20.000.000 VNĐ tiền mặt </p>
                        <p>01 suất thực tập tại Công ty TNHH Chứng khoán Ngân hàng TMCP Ngoại thương Việt Nam -  VCBS</p>
                        <p>01 năm sử dụng hệ thống FiinPro trị giá 108.000.000 VNĐ</p>
                        <p>01 suất học bổng 60% học phí chương trình CFA 3 Levels tại Smart Train trị giá 30.600.000 VNĐ</p>
                        <p>01 suất học bổng toàn phần khóa học “Nghiệp vụ nguồn vốn - đầu tư trong ngân hàng” tại Future Financiers</p>
                    </div>

                </div>

            </div>

            <div class="col-md-4">
                <h3 class="text-main-color text-price-label text-bold">Giải nhì </h3>
                <div class="price-box">
                    <div class="price" >
                        <p class="price-money text-bold">95.000.000 VNĐ</p>
                    </div>
                    <div class="price-box-extra">
                        <p> 10.000.000 VNĐ tiền mặt </p>
                        <p>01 suất thực tập tại Công ty TNHH Chứng khoán Ngân hàng TMCP Ngoại thương Việt Nam -  VCBS</p>
                        <p>06 tháng sử dụng hệ thống FiinPro trị giá 54.000.000 VNĐ</p>
                        <p>01 suất học bổng 50% học phí chương trình CFA 3 Levels tại Smart Train trị giá 25.500.000 VNĐ</p>
                        <p>01 suất học bổng 50% khóa học “Nghiệp vụ nguồn vốn - đầu tư trong ngân hàng” tại Future Financiers</p>

                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <h3 class="text-main-color text-price-label text-bold">Giải ba </h3>
                <div class="price-box">
                    <div class="price" >
                        <p class="price-money text-bold">55.000.000 VNĐ</p>
                    </div>
                    <div class="price-box-extra">
                        <p>5.000.000 VNĐ tiền mặt</p>
                        <p>01 suất thực tập tại Công ty TNHH Chứng khoán Ngân hàng TMCP Ngoại thương Việt Nam -  VCBS</p>
                        <p>03 tháng sử dụng hệ thống FiinPro trị giá 27.000.000 VNĐ</p>
                        <p>01 suất học bổng 40% học phí chương trình CFA 3 Levels tại Smart Train trị giá 20.400.000 VNĐ</p>
                        <p>01 suất học bổng 30% khóa học “Nghiệp vụ nguồn vốn - đầu tư trong ngân hàng” tại Future Financiers</p>
                    </div>

                </div>
            </div>
        </div>

    </div>


@endsection

@section('scripts')
    <script type="text/javascript" >
        $(function () {
            $('.slider-top5').slick({
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                arrows: false,
                autoplay: true,
                autoplaySpeed: 2000,
                swipe: true,
                swipeToSlide: false,
                touchMove: true
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




            $('.clock').countdown('12:00 05/23/2019')
                .on('update.countdown', function(event) {
                    var totalDays= event.offset.totalDays;

                    $('span#countdown-day').html(totalDays);
                    $('span#countdown-hour').html(event.strftime('%H'));
                    $('span#countdown-minute').html(event.strftime('%M'));
                    $('span#countdown-second').html(event.strftime('%S'));


                })
                .on('finish.countdown', function(event) {
                    $('#btn-thuthach').remove();
                    $('.title-countdown').empty().append('<h1 class="color-text-gradient">Thời gian đăng ký đã kết thúc</h1>')
                    $('.table-responsive ').replaceWith('')

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