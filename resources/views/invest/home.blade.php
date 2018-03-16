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

        <button type="button" id="btn-thuthach" class="btn" data-toggle="modal" data-target=".challenge">THỬ THÁCH</button>

    </div>


    <div class="modal fade challenge" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data" id="form-register" method="post" action="">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Đăng ký thông tin trước vòng thi</h4>
                </div>
                <div class="modal-body">
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
                                    <label for="exampleInputPassword1">Trang facebook của bạn (*)</label>
                                    <input type="text" class="form-control" placeholder=facebook.com/example name="facebook">
                                </div>


                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">CV của bạn</label>
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


    @endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/js/home.js')}}">


    </script>
    @endsection