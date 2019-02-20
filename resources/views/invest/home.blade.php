@extends('layout')
@section('title','Trang chủ')
@section('content')
    <div class="container">
        <div class="img-header">
            <img src="{{asset('/image/1.png')}}" class="img-header">
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
                <div style="text-align: center" >
                    <img src="{{asset('/image/2-01.jpg')}}" class="img-header">
                    {{--<iframe width="100%" height="420" src="https://www.youtube.com/embed/YI3tsmFsrOg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>--}}
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
                    <img src="{{asset("/image/3-01.png")}}" style="max-height: 280px">
                </div>
            </div>

            <div class="col-md-8 col-lg-8 col-sm-6 col-xs-12 text-info">
                <h4 class="name-candidate">Phạm Hồng Quân</h4>
                <h6 class="h6-margin">Trường đại học ngoại thương - Chuyên ngành Kinh tế đối ngoại</h6>

                <ul class="list-can">
                    <li>- Thực tập sinh môi giới Chứng khoán SSI</li>
                    <li>- Top 5 team Vietnam CFA Institute Research Challenge 2017</li>
                    <li>- Top 5 Go Finance 2017</li>
                    <li>- Quán quân Economics Olympic 2017</li>
                </ul>
            </div>
        </div>

        <div class="information-member row">
            <div class="col-md-8 col-lg-8 col-sm-6 col-xs-12 text-info-right">
                <h4 class="name-candidate">Đặng Khánh Linh</h4>
                <h6 class="h6-margin">Học viện ngân hàng - Chuyên ngành Tài chính</h6>
                <ul class="list-can">
                    <li>- Top 4 team Vietnam CFA Institute Research Challenge 2017</li>
                    <li>- Phòng quan hệ khách hàng MBS</li>
                    <li>- Top 05 Go Finance 2018</li>
                </ul>
            </div>

            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12" style="float: right">
                <div class="img-content">
                    <img src="{{asset("/image/4-01.png")}}" style="max-height: 340px">
                </div>
            </div>


        </div>

        <div class="information-member row">
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                <div class="img-content">
                    <img src="{{asset("/image/5-01.png")}}" style="max-height: 280px">
                </div>
            </div>

            <div class="col-md-8 col-lg-8 col-sm-6 col-xs-12 text-info">
                <h4 class="name-candidate">Nguyễn Văn Huấn</h4>
                <h6 class="h6-margin">Trường đại học ngoại thương - Chuyên ngành Tài chính ngân hàng</h6>
                <ul class="list-can">
                    <li>- Thực tập sinh Deloitte Vietnam</li>
                    <li>- Phòng môi giới Chứng khoán SSI</li>
                    <li>- Top 20 I-INVEST! 2017</li>
                </ul>
            </div>
        </div>

        <div class="information-member row">
            <div class="col-md-8 col-lg-8 col-sm-6 col-xs-12 text-info-right">
                <h4 class="name-candidate">Nguyễn Hoài Thu</h4>
                <h6 class="h6-margin">Trường đại học kinh tế quốc dân - Chuyên ngành Thị trường chứng khoán</h6>
                <ul class="list-can">
                    <li>- Quí quân Bản lĩnh Nhà đầu tư 2017</li>
                    <li>- Quán quân "Trải nghiệm đầu tư Chứng khoán - NEU"</li>
                    <li>- Nghiên cứu khoa học?????</li>
                </ul>
            </div>

            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12" style="float: right">
                <div class="img-content">
                    <img src="{{asset("/image/6-01.png")}}" style="max-height: 340px">
                </div>
            </div>


        </div>

        <div class="information-member row">
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                <div class="img-content">
                    <img src="{{asset("/image/7-01.png")}}" style="max-height: 280px">
                </div>
            </div>

            <div class="col-md-8 col-lg-8 col-sm-6 col-xs-12 text-info">
                <h4 class="name-candidate">Vũ An Hoà</h4>
                <h6 class="h6-margin">Trường đại học kinh tế quốc dân - Chuyên ngành Tài Chính</h6>
                <ul class="list-can">
                    <li>- Quán quân "The Catalyst"</li>
                    <li>- Quán quân CFA Research Challenge 2017 - NEU</li>
                    <li>- Chuyên viên đầu tư VNDirect</li>
                    <li>- Equity Analyst Intern - Baoviet Fund</li>
                    <li>- Senior Technial Analyst - Davinci Adcademy</li>
                </ul>
            </div>
        </div>
        <div style="padding-bottom: 30px"></div>
    </div>







    @endsection

@section('scripts')

    @endsection