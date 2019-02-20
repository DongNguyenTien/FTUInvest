@extends('layout')
@section('title','Trang chủ')
@section('content')
    <div class="container">
        <div class="img-header">
            <img src="{{asset('/top1.png')}}" class="img-header">
        </div>


        <div class="container text-center countdown">
            <button type="button" id="btn-thuthach" class="waves-effect waves-light btn modal-trigger"  data-target="modal" >THỬ THÁCH</button>
        </div>

        <div class="row">
            <div class="col-md-5 col-lg-5 col-sm-12">
                <div class="text-left row">
                    <div class="col-md-3">
                        <img id="quoteL" src="{{asset('/html/images/quoteL.png')}}">

                    </div>
                    <div class="col-md-9">
                        <span class="text-quote">CÂU CHUYỆN CỦA BẠN.</span>

                    </div>

                </div>
                <div class="content-left">
                    <div class="text-long">
                        <p>Thời sinh viên, ai cũng đã từng được trao cho những cơ hội khác nhau để phát triển khả năng. Nhưng, trong khi nhiều người đang đặt những bước vững chãi cho sự nghiệp của mình, có những người vẫn đang tiếc từng thời cơ vuột mất. </p>
                    </div>

                    <div class="text-long">
                        <span>Một sự thật rằng: </span><span class="text-green">thành công của những người xung quanh sẽ là thử thách bạn cần vượt qua nếu muốn ghi dấu ấn cho bản thân.</span>

                    </div>

                    <div class="text-long">
                        <p>Bạn có biết bạn bè chúng ta đang đạt được những gì? Liệu chúng ta có đủ tự tin trên con đường của mình?</p>

                    </div>

                    <p>Cơ hội là thứ một nhà đầu tư sẽ không bỏ lỡ. Định vị bản thân - Định hướng chiến lược tương lai, là cơ hội dành cho bạn tại I-SHINE! - đêm chung kết cuộc thi I-INVEST! 2018.</p>



                </div>
            </div>
            <div class="col-md-7 col-lg-7 col-sm-12">
                <div style="text-align: center" class="video-container">
                    <iframe width="100%" height="420" src="https://www.youtube.com/embed/YI3tsmFsrOg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <p class="text-under">Thách thức giới hạn của bản thân, phá vỡ ranh giới an toàn, TOP 5 của Cuộc thi I-INVEST! 2018 đã bứt phá ngoạn mục qua từng vòng thi để giành lấy tấm vé bước vào Đêm Chung kết I-SHINE!.</p>

            </div>

        </div>

        <div class="text-right thumb"><img id="quoteR" src="{{asset('/html/images/quoteR.png')}}"></div>


        <div class="information-member row">
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                <div class="img-content">
                    <img src="{{asset("/top1.png")}}" style="max-height: 280px">
                </div>
            </div>

            <div class="col-md-8 col-lg-8 col-sm-6 col-xs-12 text-info">
                <h4 class="name-candidate">Thí sinh A</h4>
                <h6 class="h6-margin">Truong</h6>
                <p> The following example will create an aspect ratio of 1:1 (the height and width is always equal)
                    The following example will create an aspect ratio of 1:1 (the height and width is always equal)
                    The following example will create an aspect ratio of 1:1 (the height and width is always equal)
                    The following example will create an aspect ratio of 1:1 (the height and width is always equal)
                </p>
            </div>
        </div>

        <div class="information-member row">
            <div class="col-md-8 col-lg-8 col-sm-6 col-xs-12 text-info-right">
                <h4 class="name-candidate">Thí sinh A</h4>
                <h6 class="h6-margin">Truong</h6>
                <p> The following example will create an aspect ratio of 1:1 (the height and width is always equal)
                    The following example will create an aspect ratio of 1:1 (the height and width is always equal)
                    The following example will create an aspect ratio of 1:1 (the height and width is always equal)
                    The following example will create an aspect ratio of 1:1 (the height and width is always equal)
                </p>
            </div>

            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12" style="float: right">
                <div class="img-content">
                    <img src="{{asset("/top1.png")}}" style="max-height: 340px">
                </div>
            </div>


        </div>


        <div style="padding-bottom: 30px"></div>
    </div>





    <div class="modal" id="modal">
        <div class="modal-content">
            <form enctype="multipart/form-data" id="form-register" method="post" >

                <div class="modal-header">
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
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
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <strong id="alert">Error!</strong>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">

                            <div class="row">
                                <div class="input-field">
                                    <input type="text" id="name" name="name" class="validate" required>
                                    <label for="name">Họ và tên (*)</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field">
                                    <input type="text"  id="datetimepicker" name="dateOfBirth" class="validate" required>
                                    <label for="datetimepicker">Ngày tháng năm sinh (*)</label>
                                </div>
                            </div>


                            <div class="row">
                                <div class="input-field">
                                    <select name="university" onchange='return other("university",this)' required>
                                        <option value="" disabled selected>Chọn trường đại học của bạn</option>
                                        <option value="1">Đại học Ngoại Thương</option>
                                        <option value="2">Đại học Kinh tế Quốc dân</option>
                                        <option value="3">Đại Học Bách Khoa Hà Nội</option>
                                        <option value="4">Học viện Tài chính</option>
                                        <option value="5">Đại học Quốc Gia Hà Nội</option>
                                        <option value="6">Đại học Thương mại</option>
                                        <option value="7">Đại học Luật Hà Nội</option>

                                        <option id="other_university" value="-1">Khác</option>
                                    </select>
                                    <label for="university">Trường đại học hiện tại (*)</label>
                                </div>

                                <input type="hidden"  name="other_university" class="validate" required >

                            </div>





                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="row">
                                <div class="input-field">
                                    <input type="email" id="email" name="email"  class="validate" required>
                                    <label for="email">Địa chỉ email (*)</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field">
                                    <input type="text" id="phone" name="phone" class="validate" required>
                                    <label for="phone">Số điện thoại (*)</label>
                                </div>
                            </div>


                            <div class="row">
                                <div class="input-field">
                                    <select name="year" onchange='return other("year",this)' required>
                                        <option value="" disabled selected>Bạn đang làm sinh viên năm ..</option>
                                        <option value="Năm nhất">Năm nhất</option>
                                        <option value="Năm hai">Năm hai</option>
                                        <option value="Năm ba">Năm ba</option>
                                        <option value="Năm cuối">Năm cuối</option>

                                        <option id="other_year" value="-1">Khác</option>

                                    </select>

                                    <label for="year">Năm (*)</label>

                                </div>
                                <input type="hidden"  name="other_year" class="validate" required >

                            </div>


                        </div>


                    </div>


                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="row">
                                <div class="input-field">
                                    <textarea id="textarea1" name="desire" class="materialize-textarea"></textarea>
                                    <label for="textarea1" class="long-label">Bạn mong muốn điều gì khi tham gia đêm chung kết Cuộc thi I-INVEST! 2018?</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field">
                                    <textarea id="textarea2" name="message" class="materialize-textarea"></textarea>
                                    <label for="textarea2" class="long-label">Bạn có điều gì muốn nhắn gửi đến BTC cuộc thi?</label>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn waves-effect waves-light" >Đăng ký</button>
                </div>
            </form>
        </div>
    </div>


@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/js/home.js?v=2')}}"></script>
    <script type="text/javascript">


        function other (type,_this) {
            // $("select."+type).on("change", function(){
            if($("option:selected", _this).attr("id") === "other_"+type) {
                $("input[name=other_"+type+"]").attr("type","text");
            } else {
                $("input[name=other_"+type+"]").attr("type","hidden");
            }
            // })
        }


    </script>
@endsection