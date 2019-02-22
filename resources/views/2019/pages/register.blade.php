@extends('2019.layout')
@section('title','Đăng ký')
@section('content')
    <div class="text-center">
        <img src="{{asset('/2019/text i-invest .png')}}" class="img-banner">
    </div>
    <form enctype="multipart/form-data" class="validate" id="form-input" method="post" action="{{route('register')}}">
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
                    <input type="text" class="form-control" name="dateOfBirth" required>
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
                    <label>Trường học:</label>
                    <input type="text" class="form-control" name="university">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                    <label for="exampleInputEmail1">Chuyên ngành: </label>
                    <input type="text" class="form-control" name="speciality">
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                    <label for="exampleInputEmail1">Khóa:</label>
                    <input type="text" class="form-control" name="year">
                </div>


            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12 form-group">
                    <label>Số chứng minh nhân dân (căn cước công dân) (*):</label>
                    <input type="text" class="form-control" name="identification" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12 form-group">
                    <label>Link facebook:</label>
                    <input type="text" class="form-control" placeholder=facebook.com/example name="facebook" require>
                    <i>VD: https://www.facebook.com/nkthu.6399</i>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12 form-group">
                    <label>Thành tích học tập, kinh nghiệm làm việc nổi bật:</label>
                    <textarea name="prices" rows="6" class="form-control"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12 form-group">
                    <label>Thành tích ngoại khóa nổi bật (tối đa 3):</label>
                    <textarea name="extracurricular" rows="6" class="form-control"></textarea>
                </div>
            </div>

            <h2 class="text-main-color register-title" style="margin: 6% 0 0px">Đăng kí địa điểm và lịch thi </h2>
            <h3 class="text-main-color" style="margin-bottom: 30px">(nếu được vào vòng 2)</h3>

            <div>
                <label>Địa điểm:</label>
                <div class="row register-radio">
                    <div class="col-md-6 col-lg-6 col-xs-12 form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="location" value="1">Đại học Kinh tế Quốc dân
                            </label>
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-5 col-lg-5 col-xs-12 form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="location" value="2">Đại học Ngoại thương
                            </label>
                        </div>
                    </div>
                </div>

            </div>

            <div>
                <label>Thời gian:</label>
                <div class="row register-radio" style="margin-bottom: 0">
                    <div class="col-md-6 col-lg-6 col-xs-12 form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="shift" value="1">Ca 1: 8h00 - 9h30
                            </label>
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-5 col-lg-5 col-xs-12 form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="shift" value="2">Ca 2: 10h00 - 11h30
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row register-radio">
                    <div class="col-md-6 col-lg-6 col-xs-12 form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="shift" value="3">Ca 3: 14h00 - 15h30
                            </label>
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-5 col-lg-5 col-xs-12 form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="shift" value="4">Ca 4: 16h00 - 17h30
                            </label>
                        </div>
                    </div>
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


            $('#form-input').on('submit',function(e) {
                e.preventDefault();
                if ($(this).valid()) {
                    $('#overlay').css('display','block');
                    $.post('{{route('register')}}',$(this).serialize(), function(response) {
                        $('#overlay').css('display','none');
                        if (response.success === 1) {
                            alert("Đăng ký thành công");
                            window.location.reload()
                        } else {
                            alert(response.messages)
                        }

                    });
                }

                return false;
            });
        })

    </script>
    @endsection