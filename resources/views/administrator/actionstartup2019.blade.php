@extends('2019.layout')
@section('title','Administrator')
@section('content')


    <div class="container-fluid">
        <div class="row" style="margin: 20px">
            <!-- Indicates a successful or positive action -->
            <a href="{{route('download_data')}}" type="button" class="btn btn-info" >Tải xuống thông tin thí sinh</a>

            <!-- Contextual button for informational alert messages -->
            <button data-toggle="modal" data-target=".change-password" type="button" class="btn btn-primary">Đổi mật khẩu</button>
        </div>


        <div class="table-layout">
            <table id="listCandicate" class="table-responsive table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Bạn là</th>
                    <th>Số CMND</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Nơi làm việc/học tập</th>
                    <th>Facebook</th>
                    <th>Trình độ</th>
                    <th>Thanh toán</th>
                    <th>Đầu tư chưa</th>
                    <th>Mong muốn</th>
                    <th>Tên bạn</th>
                    <th>SĐT bạn</th>
                    <th>Email bạn</th>
                    <th>Chứng minh nhân dân bạn</th>
                    <th>Facebook bạn</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>



    </div>

    <div class="modal fade change-password" >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                    <h4 class="modal-title" id="myModalLabel">Đổi mật khẩu</h4>
                </div>

                <div class="modal-body">
                    <div id="overlay" style="display: none;">
                        <div class="sk-fading-circle" style="top:-22%">
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
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="password" >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" id="confirm_password" >
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" onclick="return changePassword()">Đổi mật khẩu</button>
                </div>
            </div>
        </div>

    </div>




@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('js/actionAdmin2019.js')}}"></script>
    <script src="{{asset('admin-lte/plugins/fancybox/dist/jquery.fancybox.min.js')}}"></script>
    <script type="text/javascript">


    </script>

@endsection