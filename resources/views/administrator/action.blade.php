@extends('layout')
@section('title','Administrator')
@section('content')


    <div class="container-fluid">
        <div class="row" style="margin: 20px">
            <!-- Indicates a successful or positive action -->
            <a href="{{route('download_data')}}" type="button" class="btn btn-success list-button" >Tải xuống thông tin thí sinh</a>

            <a href="/responsive_filemanager/filemanager/dialog.php?type=1&lang=en_EN'" data-fancybox data-caption="Upload file manager" class="btn btn-warning iframe-btn list-button" type="button">Upload ảnh</a>
            <!-- Contextual button for informational alert messages -->
            <button data-toggle="modal" data-target="#modal" type="button" class="btn btn-info">Đổi mật khẩu</button>
        </div>
        <div class="table-layout">
            <table id="listCandicate" class="table-responsive table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Ngày sinh</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Số CMND</th>
                    <th>Điểm</th>
                    <th>Trường</th>
                    <th>Chuyên ngành</th>
                    <th>Khoá</th>
                    <th>CV</th>
                    <th>Facebook</th>


                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>



    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
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
    <script type="text/javascript" src="{{asset('js/actionAdmin.js')}}"></script>
    <script src="{{asset('admin-lte/plugins/fancybox/dist/jquery.fancybox.min.js')}}"></script>
    <script type="text/javascript">
        (function () {
            var converter1 = Markdown.getSanitizingConverter();

            converter1.hooks.chain("preBlockGamut", function (text, rbg) {
                return text.replace(/^ {0,3}""" *\n((?:.*?\n)+?) {0,3}""" *$/gm, function (whole, inner) {
                    return "<blockquote>" + rbg(inner) + "</blockquote>\n";
                });
            });

            var editor1 = new Markdown.Editor(converter1);

            editor1.run();


        })();


    </script>
    <script type="text/javascript">

        $("[data-fancybox]").fancybox({
            'width'		: 900,
            'height'	: 600,
            'type'		: 'iframe',
            'autoScale'    	: true
        });
    </script>
    @endsection