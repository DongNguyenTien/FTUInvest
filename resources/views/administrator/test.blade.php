@extends('layout')
@section('title','Trang chủ')
@section('content')
    <div class="container">
        <div class="container text-center">
            <div class="text-left"><img id="quoteL" src="{{asset('/html/images/quoteL.png')}}"></div>
            <p> Bước vào cánh cổng Đại học, ai cũng mang theo mình những khát vọng lớn lao cho tương lai của bản thân. Thế nhưng, chỉ có số ít là người thành công sau cùng với những điều mình mong muốn. Bởi không phải ai, cũng sẵn sàng học khi người khác ngủ, lao động khi người khác lười nhác, chuẩn bị khi người khác chơi bời, và có giấc mơ khi người khác chỉ ước ao. </p>

            <span id="txtBorder"> <i>Hãy nghiêm túc đầu tư cho chính bản thân ngày hôm nay để làm giàu cho chính tương lai ngay mai của bạn!</i>

                </span>
            <br>
            <br>
            <p>Khóa học Chứng khoán Cơ bản START-UP 2018 CHÍNH THỨC TRỞ LẠI năm thứ 11 với nhiều đổi mới về chất lượng và phương thức tổ chức tự tin mang lại một môi trường học tập thực tiễn, với những giá trị thiết thực, đem đến cho các bạn sinh viên cơ hội học tập và trao đổi cùng những vị chuyên gia hàng đầu trong lĩnh vực, nâng bước các bạn tiến tới thành công trên con đường Chứng khoán.</p>
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

        <button type="button" id="btn-thuthach" class="btn" data-toggle="modal" data-target=".challenge">THỬ THÁCH</button>

    </div>


    @if(empty($member))
        <div class="modal fade challenge" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form enctype="multipart/form-data" id="form-register" method="post" action="">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Đăng ký thông tin trước vòng thi</h4>
                        </div>

                        <div class="modal-body">
                            <div class="alert alert-info">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                Vui lòng điền đầy đủ và chính xác thông tin cá nhân của bạn. Các thông tin này sẽ được dùng để xác thực trong những vòng thi tiếp theo. BTC cam kết sẽ không sử dụng thông tin cá nhân của bạn vào bất kì mục đích riêng nào khác.
                            </div>
                            <div id="overlay" style="display: none;">
                                <div class="sk-fading-circle" style="top:15%">
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


                            <div class="alert alert-danger"  style="display: none; text-align: center">
                                <strong id="alert">Error!</strong>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Họ và tên (*)</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ngày tháng năm sinh (*)</label>
                                        <div class='input-group date'>
                                            <input type="text" class="form-control" id="datetimepicker" name="dateOfBirth">
                                            <label class="input-group-addon btn" for="date">
                                                <span class="fa fa-calendar open-datetimepicker"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Địa chỉ email (*)</label>
                                        <input type="email" class="form-control"   placeholder="name@example.com" name="email">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số điện thoại (*)</label>
                                        <input type="text" class="form-control" name="phone">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số chứng minh nhân dân (*)</label>
                                        <input type="text" class="form-control" name="identification">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Trường đại học hiện tại (*)</label>
                                        <input type="text" class="form-control" name="university">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Chuyên ngành (*)</label>
                                        <input type="text" class="form-control"  name="speciality">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Khoá (*)</label>
                                        <input type="text" class="form-control" name="course">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mã số sinh viên (*)</label>
                                        <input type="text" class="form-control" name="MSSV">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Trang facebook của bạn </label>
                                        <input type="text" class="form-control" placeholder=facebook.com/example name="facebook">
                                    </div>


                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">CV của bạn</label><span>: Up lên một bản CV để chia sẻ thêm với BTC về bản thân mình, bạn nhé!</span>
                                        <input type="file" class="form-control" placeholder="CV của bạn" name="CV" accept=".pdf">
                                    </div>
                                </div>
                            </div>




                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-primary" onclick="return challenge()">Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="modal fade challenge" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form enctype="multipart/form-data" method="get" action="{{route('test')}}">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Thông báo</h4>
                        </div>
                        <div class="modal-body">
                            <div class="score-screen">
                                <h3> Xin chào <span class="invest-font">{{$member->name}}</span></h3>
                                <h3> Bạn đã hoàn thành bài thi Vòng 1: I-START! Cuộc thi <span class="invest-font">I-INVEST! 2018 </span> </h3>
                                <h3> Số điểm của bạn là <span style="font-size:200%;color: #198440">{{$member->score."/40"}}</span></h3>
                                <h3> Cảm ơn bạn! </h3>
                            </div>
                            <input type="hidden" value="1" name="flag">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary" >Đăng ký thí sinh mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endif

@endsection

@section('scripts')
    <script type="text/javascript" >
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




                $('.clock').countdown('04/05/2019')
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
                            $('#alert').text('<span class="error"> '+data['messages']+'</span>');
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
                if ($(this).val() == "" && $(this).attr('name')!== "facebook") {
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

    </script>

@endsection