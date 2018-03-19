@extends('layout')
@section('title','Tổng quan')
@section('content')
    <div class="container container-margin">
        <div class="text-center">
            <h1 class="tongquan-title">I-INVEST!</h1>
            <h2> CƠ HỘI THÁCH THỨC VÀ TRẢI NGHIỆM</h2>
            <div class="separate-content"></div>
        </div>
        <div>
            <p><span class="invest-font"> I-INVEST </span>- Cuộc thi hàng đầu miền Bắc về lĩnh vực Tài chính - Kinh tế sẽ là cơ hội giúp các bạn sinh viên có thể trải nghiệm để thực sự thấu hiểu khả năng của bản thân cũng như lĩnh vực mà mình đang theo đuổi.
            </p>
            <p> Trải qua 9 năm thay đổi và phát triển, với sự giúp đỡ và đồng tổ chức từ Công ty Chứng khoán Vietcombank(VCBS), sự bảo trợ chuyên môn từ Ủy ban Chứng khoán Nhà nước, Sở giao dịch chứng khoán Hà Nội cùng sự hỗ trợ từ rất nhiều công ty và đơn vị khác hoạt động trong lĩnh vực Tài chính-Kinh tế, CLB Chứng khoán SIC luôn nỗ lực để đem đến cho các bạn một sân chơi được đầu tư kĩ càng về cả quy mô lẫn nội dung chuyên môn, từ đó mang đến cơ hội kết nối, định hướng &amp; xây dựng nền tảng vững chắc cho tương lai.
            </p>
            <p>
                Bên cạnh những trải nghiệm mang lại những kiến thức và kĩ năng thực tế hữu ích,<span style="color: #198440;font-weight: bold;font-size: 110%"> Cuộc thi I-INVEST! </span>  cũng đem đến cho các bạn sinh viên cơ hội sở hữu những phần thưởng trị giá hàng chục triệu đồng cùng các suất thực tập tại các công ty dẫn đầu trong lĩnh vực Tài chính-Kinh tế.
            </p>
            <p>
                Bạn đã sẵn sàng để thách thức bản thân và trải nghiệm để có được những kinh nghiệm và cơ hội quý báu cho quãng đời Đại học? Bạn đã sẵn sàng nắm lấy cơ hội của bản thân?
            </p>
        </div>
        <div class="text-center">
            <h2>THỂ LỆ CUỘC THI<span class="tongquan-title"> I-INVEST! 2018</span> </h2>
            <div class="separate-content" ></div>
        </div>

        <img class="img-timeline" src="{{asset('/html/images/timeline.png')}}">

        <div class="text-center">
            <h2>CƠ CẤU GIẢI THƯỞNG</h2>
            <div class="separate-content"></div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <h3>Giải nhất </h3>
                <div class="price" >
                    <i class="price-money">150.000.000 VND</i>
                </div>
                <h4> 30.000.000 VND tiền mặt </h4>
                <h4> 01 năm sử dụng phần mềm Finbox </h4>
                <h4> Cơ hội trở thành thực tập sinh của công ty chứng khoán Vietcombank-VCBS </h4>
            </div>

            <div class="col-md-4">
                <h3>Giải nhì </h3>
                <div class="price" >
                    <i class="price-money">75.000.000 VND</i>
                </div>
                <h4> 75.000.000 VND tiền mặt </h4>
                <h4> 06 tháng sử dụng phần mềm Finbox </h4>
                <h4> Cơ hội trở thành thực tập sinh của công ty chứng khoán Vietcombank-VCBS </h4>
            </div>

            <div class="col-md-4">
                <h3>Giải ba </h3>
                <div class="price">
                    <i class="price-money">45.000.000 VND</i>
                </div>
                <h4> 45.000.000 VND tiền mặt </h4>
                <h4> 03 tháng sử dụng phần mềm Finbox </h4>
                <h4> Cơ hội trở thành thực tập sinh của công ty chứng khoán Vietcombank-VCBS </h4>
            </div>
        </div>


        <div class="text-center">
            <h3 style="color: #198440">Top 5 thí sinh</h3>
            <h4 style="margin-bottom: 30px"> Học bổng 70% các khóa học CFA và FRM của học viện AmiCoach </h4>
            <h3 style="color: #198440">Top 20 thí sinh</h3>
            <h4> Học bổng 50% các khóa học CFA và FRM của học viện AmiCoach </h4>
            <h4> Đặc biệt 1 phần quà trị giá 5 triệu đồng tiền mặt cho thí sinh sử dụng hiệu quả phần mềm Finpro trong vòng 3 của cuộc thi </h4>
        </div>
    </div>
    @endsection