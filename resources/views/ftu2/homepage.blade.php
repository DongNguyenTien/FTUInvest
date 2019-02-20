@extends('layout')
@section('title','Trang chủ')
@section('content')
    <div class="container">
        <div class="container text-center">
            <div class="text-left" style="margin-top: 30px"></div>
            <p> Bước vào cánh cổng Đại học, ai cũng mang theo mình những khát vọng lớn lao cho tương lai của bản thân. Thế nhưng, chỉ có số ít là người thành công sau cùng với những điều mình mong muốn. Bởi không phải ai, cũng sẵn sàng học khi người khác ngủ, lao động khi người khác lười nhác, chuẩn bị khi người khác chơi bời, và có giấc mơ khi người khác chỉ ước ao. </p>

            <div style="margin: 40px 0">
                <div class="txtBorder "><i class="quote-home">Hãy nghiêm túc đầu tư cho chính bản thân ngày hôm nay</i> </div>
                <div class="txtBorder"><i class="quote-home"> để làm giàu cho chính tương lai ngay mai của bạn!</i></div>
            </div>

            <br>
            <p><strong style="font-family: SanFranciscoBold;">Khóa học Chứng khoán Cơ bản START-UP 2018</strong> CHÍNH THỨC TRỞ LẠI năm thứ 11 với nhiều đổi mới về chất lượng và phương thức tổ chức tự tin mang lại một môi trường học tập thực tiễn, với những giá trị thiết thực, đem đến cho các bạn sinh viên cơ hội học tập và trao đổi cùng những vị chuyên gia hàng đầu trong lĩnh vực, nâng bước các bạn tiến tới thành công trên con đường Chứng khoán.</p>
            <div class="text-right thumb"></div>
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

        <button type="button" id="btn-thuthach" class="btn" data-toggle="modal" data-target=".challenge">Đăng ký ngay</button>

    </div>


        <div class="modal fade challenge" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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

                                    {{--<div class="form-group">--}}
                                        {{--<label for="exampleInputEmail1">Ngày tháng năm sinh (*)</label>--}}
                                        {{--<div class='input-group date'>--}}
                                            {{--<input type="text" class="form-control" id="datetimepicker" name="dateOfBirth">--}}
                                            {{--<label class="input-group-addon btn" for="date">--}}
                                                {{--<span class="fa fa-calendar open-datetimepicker"></span>--}}
                                            {{--</label>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label>Giới tính (*)</label>--}}
                                        {{--<select name="sex" class="form-control" required>--}}
                                            {{--<option value >--Chọn giới tính--</option>--}}
                                            {{--<option value="0">Nam</option>--}}
                                            {{--<option value="1">Nữ</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
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


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bạn là (*)</label>
                                        <select name="status" class="form-control" required>
                                            <option value >--Chọn tình trạng--</option>
                                            <option value="1">Sinh viên năm nhất</option>
                                            <option value="2">Sinh viên năm 2</option>
                                            <option value="3">Sinh viên năm 3</option>
                                            <option value="4">Sinh viên năm 4</option>
                                            <option value="5">Sinh viên năm 5</option>
                                            <option value="6">Đã đi làm</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Nơi làm việc / học tập (*): </label>
                                        <input name="work_place" class="form-control" placeholder="" required>
                                    </div>



                                </div>

                                <div class="col-md-6 col-sm-12">

                                    <div class="form-group">
                                        <label>Trang facebook của bạn (*)</label>
                                        <input type="text" class="form-control" placeholder=facebook.com/example name="facebook" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Bạn đóng tiền dưới hình thức (*):</label>
                                        <select name="payment_type" required class="form-control">
                                            <option value>--Chọn câu trả lời--</option>
                                            <option value="0">Offline (Bàn trực...)</option>
                                            <option value="1">Online (Chuyển khoản...)</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Tự nhận xét trình độ kiến thức chuyên môn Chứng khoán hiện tại của bạn: </label>
                                        <select name="level" class="form-control">
                                            <option value>--Chọn câu trả lời--</option>
                                            <option value="1">Chưa biết</option>
                                            <option value="2">Biết một vài kiến thức cơ bản</option>
                                            <option value="3">Kiến thức cơ bản ổn</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Bạn đã đầu tư Chứng khoán chưa?</label>
                                        <select name="is_sponsor" class="form-control">
                                            <option value>--Chọn câu trả lời--</option>
                                            <option value="1">Chưa</option>
                                            <option value="2">Có đầu tư theo yêu thích</option>
                                            <option value="3">Có đầu tư bài bản</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Bạn mong muốn gì về Khóa học Chứng khoán cơ bản START-UP 2018?</label>
                                        <textarea name="aspiration" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="box box-success box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Dành cho học viên đăng kí theo nhóm</h3>
                                            <span class="is_friend" ><input id="isFriend" name="is_have_friend" type="checkbox" ></span>
                                            <!-- /.box-tools -->
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Họ và tên người đăng kí cùng bạn</label>
                                                        <input name="friend_name" type="text" class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Email người đăng kí cùng bạn</label>
                                                        <input name="friend_email" type="email" class="form-control" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Số điện thoại người đăng kí cùng bạn</label>
                                                        <input name="friend_phone" type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">


                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Số chứng minh thư/căn cước công dân người đăng kí cùng bạn</label>
                                                        <input name="friend_identification" type="text" class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Link Facebook người đăng kí cùng bạn</label>
                                                        <input name="friend_facebook" type="text" class="form-control" readonly>
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




            $('.clock').countdown('11/07/2018')
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

            $('input#isFriend').on('ifChecked',function (event) {
                $('input[name^="friend_"]').prop('required',true).prop('readonly',false);



            })
            $('input#isFriend').on('ifUnchecked',function (event) {
                $('input[name^="friend_"]').prop('required',false).prop('readonly',true);


            })
        });








    </script>

@endsection