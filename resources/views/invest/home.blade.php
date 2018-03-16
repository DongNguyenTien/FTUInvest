@extends('layout')
@section('title','Homepage')
@section('content')
    <div class="container">
        <div class="container text-center">
            <div class="text-left"><img id="quoteL" src="{{asset('/html/images/quoteL.png')}}"></div>
            <p> Thời sinh viên ai cũng đã từng được trao cho những cơ hội khác nhau để phát triển khả năng. Thế nhưng cho đến những năm <br> cuối Đại học, số đông đều cảm thấy tiếc nuối vì đã bỏ lỡ nhiều cơ hội quý giá. Tại sao vậy? Mọi sự tiếc nuối đều không tồn tại <br> nếu mỗi chúng ta dứt khoát bước khỏi vùng an toàn của mình. I-INVEST! được sinh ra để giải quyết một vấn đề rất rõ ràng: <br><br></p>

                <span id="txtBorder"> <i>đã đến lúc sinh viên cần tự nắm lấy một cơ hội để bứt phá </i>

                </span>
            <br>
            <br>
            <p> Trải qua 9 năm tổ chức I-INVEST luôn khẳng định là cuộc thi Kinh tế - Tài chính lớn nhất miền Bắc với sự đầu <br> tư về chất lượng và quy mô. Hơn cả một cuộc thi dành cho sinh viên, I-INVEST! được CLB chứng khoán(SIC) <br> cho ra đời với sứ mệnh mang đến cho các bạn trẻ một cơ hội để thấu hiểu chính mình và lĩnh vực đang theo <br> đuổi. Từ đó, chúng tôi tin rằng, các bạn sẽ có thể thử thách và khẳng định bản thân trên con đường đã chọn</p>
            <div class="text-right thumb"><img id="quoteR" src="{{asset('/html/images/quoteR.png')}}"></div>
        </div>
    </div>
    <div class="container text-center countdown">

        <div class="table-responsive " style="width: 70%;margin-left: 15%;" >
            <table class="table no-border">
                <tbody>
                <tr>
                    <td style="text-align: right;"><h2>Bạn còn</h2></td>


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
                    
                    <td style="text-align: left;"><h2>để</h2></td>
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

        <a href="{{route('challenge')}}" type="button" id="btn-thuthach" class="btn">THỬ THÁCH</a>

    </div>



    @endsection

@section('scripts')
    <script type="text/javascript">
        // $('#clock').countdown('03/17/2018');

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
    </script>
    @endsection