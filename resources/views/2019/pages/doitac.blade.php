@extends('2019.layout')
@section('title','Đối tác')
@section('content')

    <div class="container-price doitac">

        <div class="contest-rule" style="position: absolute;">
            <div class="row">
                <div class="col-md-6">
                    <div class="rule-left">
                        <div class="restric-title">
                            <h2 class="home-title tongquan-title">đồng hành </h2>
                            <h2 class="home-title round-1 tongquan-title">cùng i-invest! 2019 </h2>
                        </div>



                        <img class="light" src="{{asset('/2019/logo-01.png')}}">
                        <img style="width: 12%;position: absolute;left: 58%; top: 49%; opacity: 0.2;" src="{{asset('/2019/yellow.png')}}">
                        <img style="width: 8%;position: absolute;left: 30%;top: 35%; opacity: 0.1;" src="{{asset('/2019/yellow.png')}}">
                        <img style="width: 11%;position: absolute;left: 80%;top: 30%; opacity: 0.3;" src="{{asset('/2019/yellow.png')}}">
                        <img style="width: 7%;position: absolute;left: 64%;top: 28%; opacity: 1;" src="{{asset('/2019/yellow.png')}}">
                        <img style="width: 4%;position: absolute;left: 83%;top: 44%; opacity: 0.45;" src="{{asset('/2019/yellow.png')}}">

                        <img style="width: 5%;position: absolute;left: 60%;top: 70%; opacity: 0.6;" src="{{asset('/2019/yellow.png')}}">

                        <img style="width: 4%;position: absolute;left: 50%; top: 40%; opacity: 0.3;" src="{{asset('/2019/yellow.png')}}">
                        <img style="width: 9%;position: absolute;left: 40%;top: 45%; opacity: 0.2;" src="{{asset('/2019/yellow.png')}}">
                        <img style="width: 11%;position: absolute;left: 73%;top: 58%; opacity: 0.2;" src="{{asset('/2019/yellow.png')}}">
                        <img style="width: 3%;position: absolute;left: 20%;top: 80%; opacity: 0.1;" src="{{asset('/2019/yellow.png')}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="donors">
            <div class="row">
                <div class="col-md-6 col-md-offset-6" style="margin-bottom: 40px;">
                    <h3>Đơn vị tổ chức</h3>
                    <div class="list-logo">
                        <div class="logo-container"
                             style="background-image:url('{{asset('/2019/doitac/donvitochuc/LogoKTCNH-01 (1).png')}}');">
                        </div>
                        <div class="logo-container"
                             style="background-image:url('{{asset('/2019/doitac/donvitochuc/logo vcbs1.png')}}'); width: 200px">
                        </div>
                        <div class="logo-container"
                             style="background-image:url('{{asset('/2019/doitac/donvitochuc/logo đoàn.png')}}');">
                        </div>
                        <div class="logo-container"
                             style="background-image:url('{{asset('/2019/doitac/donvitochuc/logo fp black-01-2.png')}}');">
                        </div>
                    </div>


                </div>
            </div>
            <div class="row margin-bottom">
                <div class="col-md-4 col-md-offset-4">
                    <h3>Nhà tài trợ kim cương</h3>
                    <div class="list-logo">
                        <div class="logo-donor-container"
                             style="background-image:url('{{asset('/2019/doitac/donvitochuc/logo vcbs1.png')}}'); width: 200px">
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <h3>Nhà tài trợ vàng</h3>
                    <div class="list-logo">
                        <div class="logo-donor-container"
                             style="background-image:url('{{asset('/2019/doitac/vang/logo stoxplus.png')}}');">
                        </div>
                    </div>

                </div>
            </div>
            <div class="row margin-bottom">
                <div class="col-md-4 col-md-offset-4">
                    <h3>Nhà tài trợ bạc</h3>
                    <div class="list-logo">
                        <div class="logo-donor-container"
                             style="background-image:url('{{asset('/2019/doitac/bac/logo smarttrain.png')}}');">
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <h3>Nhà tài trợ đồng</h3>
                    <div class="list-logo">
                        <div class="logo-donor-container"
                             style="background-image:url('{{asset('/2019/doitac/donghanh/logo future financiers.png')}}');">
                        </div>
                    </div>

                </div>
            </div>
            <div class="row margin-bottom">
                <div class="col-md-12">
                    <h3>đơn bị bảo trợ chuyên môn</h3>
                    <div class="list-logo">
                        <div class="logo-container"
                             style="background-image:url('{{asset('/2019/doitac/chuyenmon/logo uỷ ban ck.png')}}'); width: 150px;">
                        </div>
                        <div class="logo-container"
                             style="background-image:url('{{asset('/2019/doitac/chuyenmon/logo hnx.png')}}');">
                        </div>
                        <div class="logo-container"
                             style="background-image:url('{{asset('/2019/doitac/chuyenmon/LogoKTCNH-01 (1).png')}}');">
                        </div>
                        <div class="logo-container"
                             style="background-image:url('{{asset('/2019/doitac/chuyenmon/logo cfa.png')}}');">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-bottom">
                <div class="col-md-12">
                    <h3>đơn vị bảo trợ truyền thông</h3>
                    <div class="list-logo">
                        <div class="logo-communication-container"
                             style="background-image:url('{{asset('/2019/doitac/truyenthong/logo ybox.png')}}');">
                        </div>
                        <div class="logo-communication-container"
                             style="background-image:url('{{asset('/2019/doitac/truyenthong/logo cafe f.png')}}');">
                        </div>
                        <div class="logo-communication-container"
                             style="background-image:url('{{asset('/2019/doitac/truyenthong/logo đầu tư ck.png')}}');">
                        </div>
                        <div class="logo-communication-container"
                             style="background-image:url('{{asset('/2019/doitac/truyenthong/logo thời báo ngân hàng.jpg')}}');">
                        </div>
                    </div>
                    <p></p>
                    <div class="list-logo">
                        <div class="logo-communication-container"
                             style="background-image:url('{{asset('/2019/doitac/truyenthong/logo kdpl.png.jpg')}}');">
                        </div>
                        <div class="logo-communication-container"
                             style="background-image:url('{{asset('/2019/doitac/truyenthong/logo vn finance.png')}}'); width: 100px">
                        </div>
                        <div class="logo-communication-container"
                             style="background-image:url('{{asset('/2019/doitac/truyenthong/logo vietnambiz.png')}}');">
                        </div>

                    </div>
                </div>
            </div>
            <div class="row margin-bottom">
                <div class="col-md-6">
                    <h3>đơn vị đồng hành</h3>
                    <div class="list-logo">
                        <div class="logo-container"
                             style="background-image:url('{{asset('/2019/doitac/donghanh/logo ssi.png')}}'); width: 80px; margin-right: 10px">
                        </div>
                        <div class="logo-container"
                             style="background-image:url('{{asset('/2019/doitac/donghanh/logo izone.png')}}'); width: 150px">
                        </div>



                    </div>
                </div>
                <div class="col-md-6">
                    <h3>đơn vị hỗ trợ hình ảnh</h3>
                    <div class="list-logo">
                        <div class="logo-container"
                             style="background-image:url('{{asset('/2019/doitac/hinhanh/logo ptit.png')}}');">
                        </div>


                    </div>
                </div>
            </div>


            </div>

        </div>


    </div>

    @endsection