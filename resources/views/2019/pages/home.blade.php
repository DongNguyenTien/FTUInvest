@extends('2019.layout')
@section('title','Trang chủ')
@section('content')
    <h2 class="home-title">Cuộc thi i-invest! 2019</h2>
    <h1 class="home-title round-1">vòng 1</h1>
    <div class="container-info text-center countdown">

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

        {{--<button type="button" id="btn-thuthach" class="btn" data-toggle="modal" data-target=".challenge">Đăng ký ngay</button>--}}
        <a type="button" id="btn-dangky" href="{{route('dangky')}}" class="btn" >Đăng ký ngay</a>

    </div>


   {{-- <div class="modal fade challenge" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data" class="validate" id="form-input" method="post" action="{{route('register')}}">
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
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Đăng kí Khóa học Chứng khoán cơ bản START-UP 2018 </h4>
                    </div>

                    <div class="modal-body">
                        <div class="alert alert-info">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            Các thông tin này sẽ được dùng để xác thực việc đăng ký tham gia Khóa học chứng khoán Cơ bản START-UP 2018 của bạn.
                            <i>(Phần thông tin để BTC xác nhận bạn đã đăng kí theo nhóm, không nhằm mục đích đăng kí hộ người khác.)</i>
                        </div>



                        <div class="alert alert-danger"  style="display: none; text-align: center">
                            <strong id="alert">Error!</strong>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ và tên (*)</label>
                                    <input type="text" class="form-control" name="name" required>
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
                                <label>Giới tính (*)</label>
                                <select name="sex" class="form-control" required>
                                <option value >--Chọn giới tính--</option>
                                <option value="0">Nam</option>
                                <option value="1">Nữ</option>
                                </select>
                                </div>
                                <div class="form-group">
                                    <label >Số chứng minh nhân dân (*)</label>
                                    <input type="text" class="form-control" name="identification" required>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ email (*)</label>
                                    <input type="email" class="form-control"   placeholder="name@example.com" name="email" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại (*)</label>
                                    <input type="text" class="form-control" name="phone" required>
                                </div>







                            </div>

                            <div class="col-md-6 col-sm-12">

                                <div class="form-group">
                                    <label>Trang facebook của bạn (*)</label>
                                    <input type="text" class="form-control" placeholder=facebook.com/example name="facebook" required>
                                </div>

                                <div class="form-group">
                                    <label>Trường</label>
                                    <input type="text" class="form-control"  name="university" required>
                                </div>

                                <div class="form-group">
                                    <label>Thành tích học tập, kinh nghiệm làm việc nổi bật</label>
                                    <textarea name="prices" rows="4" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Thành tích ngoại khóa nổi bật (tối đa 3 cái)</label>
                                    <textarea name="extracurricular" rows="4" class="form-control"></textarea>
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="box box-success box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Đăng kí địa điểm và lịch thi (nếu được vào vòng 2)</h3>
                                        <!-- /.box-tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Địa điểm</label>
                                                    <select name="location" class="form-control" required>
                                                        <option value >--Chọn địa điểm--</option>
                                                        <option value="1">Đại học Kinh tế Quốc dân</option>
                                                        <option value="2">Đại học Ngoại thương</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Ca thi</label>
                                                    <select name="shift" class="form-control" required>
                                                        <option value >--Chọn ca thi--</option>
                                                        <option value="1">Ca 1: 8h00 - 9h30</option>
                                                        <option value="2">Ca 2: 10h00 - 11h30</option>
                                                        <option value="3">Ca 3: 14h00 - 15h30</option>
                                                        <option value="4">Ca 4: 16h00 - 17h30</option>
                                                    </select>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                    <!-- /.box-body -->
                                </div>

                            </div>


                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" id="button-submit">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>--}}


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
                    $.post('{{route('register')}}',$(this).serialize(), function(response) {
                        $('#overlay').css('display','none');
                        if (response.status == 1) {
                            alert("Đăng ký thành công");
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




            $('.clock').countdown('11/07/2019')
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