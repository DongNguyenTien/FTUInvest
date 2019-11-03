@extends('startup2019.layout')
@section('title','Đăng ký')
@section('content')
    <div class="text-center">
        <img src="{{asset('startup2019/logo.png')}}" class="img-banner">
    </div>
    <form enctype="multipart/form-data" class="validate" id="form-input" method="post" action="{{route('register')}}">
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
        <div class="container-info box-register">

            @if($errors->any())
                <div class="alert alert-danger">
                <p>{{$errors->first()}}</p>
                </div>
            @endif


            {{--<h2 class="text-main-color register-title">Thông tin cá nhân</h2>--}}
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12 form-group">
                    <label for="exampleInputEmail1">Họ và tên (*):</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12 form-group">
                    <label for="exampleInputEmail1">Số chứng minh thư / căn cước công dân (*):</label>
                    <input type="text" class="form-control" name="identification" required>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5 col-md-5 col-xs-12 form-group">
                    <label for="exampleInputEmail1">Bạn là (*):</label>
                    <select name="who" class="form-control" required>
                        <option value >--Chọn tình trạng--</option>
                        <option value="1">Sinh viên năm nhất</option>
                        <option value="2">Sinh viên năm 2</option>
                        <option value="3">Sinh viên năm 3</option>
                        <option value="4">Sinh viên năm 4</option>
                        <option value="5">Đã đi làm</option>
                    </select>
                </div>
                <div class="col-lg-7 col-md-7 col-xs-12 form-group">
                    <label for="exampleInputEmail1">Nơi làm việc/học tập (*):</label>
                    <input type="text" class="form-control" name="work_place" required>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5 col-md-5 col-xs-12 form-group">
                    <label for="exampleInputEmail1">Số điện thoại (*):</label>
                    <input type="text" class="form-control" name="phone" required>
                </div>
                <div class="col-lg-7 col-md-7 col-xs-12 form-group">
                    <label for="exampleInputEmail1">Email (*):</label>
                    <input type="email" class="form-control" placeholder="name@example.com" name="email" required>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 form-group">
                    <label>Link facebook (*):</label>
                    <input type="text" class="form-control" name="facebook" required>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 form-group">
                    <label>Bạn đóng tiền dưới hình thức (*):</label>
                    <select name="dong_tien"  class="form-control" required>
                        <option value="1">Offline (Bàn trực)</option>
                        <option value="2">Online (Chuyển khoản)</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 form-group">
                    <label>Tự nhận xét trình độ kiến thức chuyên môn Chứng khoán hiện tại của bạn (*):</label>
                    <select name="trinh_do"  class="form-control" required>
                        <option value="1">Chưa biết</option>
                        <option value="2">Biết một vài kiến thức cơ bản</option>
                        <option value="3">Kiến thức cơ bản ổn</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 form-group">
                    <label>Bạn đã đầu tư chứng khoán chưa?</label>
                    <select name="dau_tu_chua"  class="form-control" required>
                        <option value="1">Chưa</option>
                        <option value="2">Có đầu tư theo yêu thích</option>
                        <option value="3">Có đầu tư bài bản</option>
                    </select>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 form-group">
                    <label>Bạn mong muốn gì về khóa học Chứng khoán cơ bản START-UP 2019?</label>
                    <textarea rows="5" type="text" class="form-control" name="mong_muon"></textarea>
                </div>
            </div>

            <h2 class="text-main-color register-title">Dành cho sinh viên đăng ký theo nhóm</h2>

            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12 form-group">
                    <label for="exampleInputEmail1">Họ và tên người đăng ký cùng bạn:</label>
                    <input type="text" class="form-control" name="fr_name">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12 form-group">
                    <label for="exampleInputEmail1">Số chứng minh thư / căn cước công dân :</label>
                    <input type="text" class="form-control" name="fr_identification">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-5 col-xs-12 form-group">
                    <label for="exampleInputEmail1">Số điện thoại:</label>
                    <input type="text" class="form-control" name="fr_phone">
                </div>
                <div class="col-lg-7 col-md-7 col-xs-12 form-group">
                    <label for="exampleInputEmail1">Email:</label>
                    <input type="email" class="form-control" placeholder="name@example.com" name="fr_email">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12 form-group">
                    <label for="exampleInputEmail1">Link facebook:</label>
                    <input type="text" class="form-control" name="fr_facebook">
                </div>
            </div>



            <div class="pull-right">
                <input type="submit" class="btn btn-challenge btn-lg center-block" style="" value="ĐĂNG KÝ">

            </div>
        </div>
    </form>


@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            $("#form-input").validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
            });

            $('#datetimepicker').datetimepicker({
                format: "DD-MM-YYYY",
            });

            {{--$('#form-input').on('submit',function(e) {--}}
            {{--e.preventDefault();--}}

            {{--if ($(this).valid()) {--}}
            {{--$('#overlay').css('display','block');--}}
            {{--$.post('{{route('register')}}',$(this).serialize(), function(response) {--}}
            {{--$('#overlay').css('display','none');--}}
            {{--if (response.success === 1) {--}}
            {{--alert("BTC xin thông báo bạn đã đăng ký thành công\n" +--}}
            {{--"Vui lòng check hòm mail để nhận thông tin đăng nhập và tham gia thi Vòng 1");--}}
            {{--window.location.href = '{{route('home')}}'--}}
            {{--} else {--}}
            {{--alert(response.messages)--}}
            {{--}--}}

            {{--});--}}
            {{--}--}}

            {{--return false;--}}
            {{--});--}}
        })

    </script>
@endsection