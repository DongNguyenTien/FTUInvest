@extends('2019.layout')
@section('title','Đăng ký')
@section('content')
    <div class="text-center">
        <img src="{{asset('/2019/text i-invest .png')}}" class="img-banner">
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
            <h2 class="text-main-color register-title">Thông tin cá nhân</h2>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12 form-group">
                    <label for="exampleInputEmail1">Họ và tên (*):</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                    <label>Năm sinh (*):</label>
                    <input type="text" class="form-control" id="datetimepicker" name="dateOfBirth" required>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                    <label for="exampleInputEmail1">Email (*):</label>
                    <input type="email" class="form-control" placeholder="name@example.com" name="email" required>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                    <label for="exampleInputEmail1">Số điện thoại (*):</label>
                    <input type="text" class="form-control" name="phone" required>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                    <label>Bạn là sinh viên năm (*):</label>
                    <input type="text" class="form-control" name="year" required>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 form-group">
                    <label>Trường học (*):</label>
                    <input type="text" class="form-control" name="university" required>
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
        $(function(){
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