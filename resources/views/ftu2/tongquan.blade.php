@extends('layout')

@section('title','Tổng quan')
@section('content')

    <style>


        body {
            background-image: none !important;
        }
    </style>
    <div class="row">
        <div class="col-xs-8 col-md-8 col-lg-8 col-xs-offset-2">
            <div class="text-background-underline">
                <span class="align-center span-underline">TỔNG QUAN</span>
            </div>
            <div class="quote">
                <i class="quote-i">
                START-UP là Khóa học kiến thức cơ bản về Chứng khoán được CLB Chứng khoán (SIC) trường ĐH Ngoại thương tổ chức hàng năm với hi vọng mang tới cơ hội học tập và trải nghiệm thực tế cho cộng đồng sinh viên yêu thích lĩnh vực Tài chính-Chứng khoán trên địa bàn Hà Nội.
                </i>
            </div>

            <div class="float-left">
                <div class="step-small-text">
                    <span class="span-underline">GIAI ĐOẠN 1: </span>
                </div>
                <img src="{{asset('FTU2/images/step1-01.png')}}" class="img-step">
            </div>

            <div class="float-right">
                <div class="step-small-text">
                    <span class="span-underline">GIAI ĐOẠN 2:</span>


                </div>

                    <p class="supply-title">ĐẦU TƯ THỰC TẾ</p>

                <div class="div-step-quote">
                    <i class="step-quote">
                        Học viên chia thành các nhóm hoạt động đầu tư thực tế trên tài khoản do Khóa học cung cấp, được sự hướng dẫn và review danh mục từ giảng viên và trợ giảng để có những trải nghiệm, bài học thực tế, “va vấp” trên thị trường trong vai trò là

                    </i>
                    <i class="step-quote" style="display: block">
                        những nhà đầu tư đích thực.
                    </i>
                </div>


                <div class="row after-step-2">
                    <div class="col-md-4 col-xs-12 col-lg-4 text-center">
                        <p>TUẦN 01:</p>
                        <h5><i class="text-color-general">Review danh mục</i></h5>
                    </div>
                    <div class="col-md-4 col-xs-12 col-lg-4 text-center">
                        <p>TUẦN 02:</p>
                        <h5><i class="text-color-general">Coffee talk cùng chuyên gia</i></h5>
                    </div>
                    <div class="col-md-4 col-xs-12 col-lg-4 text-center">
                        <p>TUẦN 03:</p>
                        <h5><i class="text-color-general">Review danh mục</i></h5>
                    </div>
                </div>


            </div>


            <div class="float-left">
                <div class="model">
                    <div class="row">
                        <div class="col-lg-4 col-md-4" style="padding-left: 30px">
                            <p class="model-title">MÔ HÌNH</p>
                            <p class="model-title">ĐẦU TƯ THỰC TẾ</p>

                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="model-element">
                                <h4 class="text-color-general">01. Trải nghiệm học tập thực</h4>
                                <div class="span-padding">
                                    <span>Song hành với việc học tập các kiến thức chuyên môn từ giảng viên, học viên khi tham gia Khóa học sẽ chia thành các nhóm hoạt động đầu tư thực tế trên tài khoản do Khóa học cung cấp, nhận được sự hướng dẫn và review danh mục từ giảng viên và trợ giảng để có những trải nghiệm, bài học thực tế trên thị trường trong vai trò là những nhà đầu tư đích thực.</span>
                                </div>
                            </div>
                            <div class="model-element">
                                <h4 class="text-color-general">02. Cuộc thi đầu tư</h4>
                                <div class="span-padding">
                                    <span>Ngoài việc thành viên các nhóm hoạt động cùng nhau dưới sự hướng dẫn của trợ giảng để có cho mình một danh mục đầu tư hiệu quả và trải nghiệm học thực tế, thành tích đầu tư của các nhóm sẽ được ghi nhận, tổng hợp và công bố định kỳ. Nhóm có thành tích đầu tư và cơ cấu danh mục tốt nhất sẽ nhận được giải thưởng từ Ban tổ chức Khóa học.
</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="margin-top lecture">
                <div class="text-background-underline">
                    <span class="align-center span-underline">
                        CHÂN DUNG GIẢNG VIÊN
                    </span>
                </div>
                <div class="info-image-left">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xs-12 align-center">
                            <div class="border-image">
                                <img src="{{asset('FTU2/images/nguyenvietphuong.png?v=1.1')}}" class="img-step">
                            </div>
                        </div>
                        <div class="col-md-9 col-lg-9 col-xs-12">
                            <h4 class="text-color-general">Giảng viên: Nguyễn Việt Phương</h4>
                            <span>Từng làm chuyên viên phân tích tại Vietcombank Fund Management (VCBF), hiện giờ ông đang công tác tại Công ty Quản lý quỹ IPA (IPAAM), CFA level 3, thành viên điều hành CFA Community Vietnam.
                            </span>
                        </div>
                    </div>
                </div>


                <div class="info-image-right">
                    <div class="col-md-9 col-lg-9 col-xs-12 text-right">
                        <h4 class="text-color-general">Giảng viên: Đặng Trần Phục</h4>
                        <span>Tư vấn đầu tư khách hàng tổ chức CTCPCK Vndirect, kinh nghiệm nhiều năm giảng dạy chuyên sâu về phân tích doanh nghiệp.
                            </span>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xs-12 align-center">
                        <div class="border-image">
                            <img src="{{asset('FTU2/images/dangtranphuc.png')}}" class="img-step">
                        </div>
                    </div>

                </div>


                <div class="info-image-left">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xs-12 align-center">
                            <div class="border-image">
                                <img src="{{asset('FTU2/images/nguyenhoanghiep.png?v=1.1')}}" class="img-step">
                            </div>
                        </div>
                        <div class="col-md-9 col-lg-9 col-xs-12">
                            <h4 class="text-color-general">Giảng viên: Nguyễn Hoàng Hiệp</h4>
                            <span>Giảng viên khoa TCNH Đại học Ngoại thương.
                            </span>
                        </div>
                    </div>
                </div>


                <div class="info-image-right">
                    <div class="col-md-9 col-lg-9 col-xs-12 text-right">
                        <h4 class="text-color-general">Giảng viên: Lý Lâm Duy</h4>
                        <ul>
                            <li>- Phó Giám đốc kiêm Giám đốc Tài chính CFO tại Công ty TNHH Dịch vụ Mặt đất Hàng không tại Sân bay quốc tế Cam Ranh.</li>
                            <li>- CFA Charter Holder, MBA, Fullbrighter 2011.</li>
                            <li>- Thành viên chiến lược và điều hành CFA Community Vietnam.</li>
                            <li>- Trên 10 năm kinh nghiệm làm việc trong lĩnh vực Đầu tư, Tư vấn Tài chính Doanh nghiệp và Định giá.
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xs-12 align-center">
                        <div class="border-image">
                            <img src="{{asset('FTU2/images/lylamduy.png')}}" class="img-step">
                        </div>
                    </div>

                </div>
            </div>

            <div class="margin-top lecture">
         <div class="text-background-underline" style="margin-bottom: 20px">
                    <span class="align-center span-underline">
                        KHÓA HỌC DÀNH CHO AI?
                    </span>
                </div>
                <div class="row" >
                    <div class="col-md-4 col-lg-4 col-xs-4 student-col">
                        <div class="content-inside">
                            <div class="image-div">
                                <img class="student-image" src="{{asset('/FTU2/images/object1.png?v=1.1')}}">
                            </div>
                            <div class="object-content">
                                <span class="align-center">Sinh viên đang theo học <strong>Tài chính - Kinh tế</strong> , có hứng thú với lĩnh vực <strong>Chứng khoán</strong>, muốn có kiến thức tổng quan chuẩn mực ngay từ đầu để có định hướng phát triển rõ ràng.</span>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 col-lg-4 col-xs-4 student-col">
                        <div class="content-inside">
                            <div class="image-div">
                                <img class="student-image" src="{{asset('/FTU2/images/object2.png')}}">
                            </div>
                            <div class="object-content">
                                <span class="align-center">Sinh viên đã tiếp xúc với <strong>Chứng khoán</strong>, nhưng chưa từng được hệ thống kiến thức một cách bài bản.</span>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 col-lg-4 col-xs-4 student-col">
                        <div class="content-inside">
                            <div class="image-div">
                                <img class="student-image" src="{{asset('/FTU2/images/object3.png')}}">
                            </div>
                            <div class="object-content">
                                <span class="align-center">Người đi làm, có hứng thú và quan tâm tới lĩnh vực <strong>Chứng khoán</strong> hoặc đang đầu tư Chứng khoán nhưng chưa hiệu quả, muốn được nâng cao kiến thức và học hỏi kinh nghiệm để đầu tư hiệu quả hơn.</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="content-full-width margin-top">
        <div class="row">
            <div class="col-xs-8 col-md-8 col-lg-8 col-md-offset-2">
                <div class="row">
                    <div class="col-xs-8 col-md-8 col-lg-8 end-text-right" >
                        <div class="model-element">
                            <h4 class="text-end"><strong>01.</strong> ĐỘI NGŨ GIẢNG VIÊN VÀ KIẾN THỨC</h4>
                            <div class="span-padding">
                                <span>Đội ngũ giảng dạy chất lượng cao: thành tích xuất sắc, kiến thức chắc chắn, giàu kinh nghiệm giảng dạy chuyên sâu, sẵn sàng chia sẻ những kinh nghiệm “chinh chiến” thực tế của bản thân qua nhiều năm trên thị trường, giúp bạn đi đúng hướng ngay từ đầu với chi phí hợp lý nhất, có khả năng phân tích để tự xây dựng cho mình nguyên tắc giao dịch riêng, kiếm lợi nhuận trên thị trường Chứng khoán.
</span>
                            </div>
                        </div>

                        <div class="model-element">
                            <h4 class="text-end"><strong>02.</strong> TRẢI NGHIỆM</h4>
                            <div class="span-padding">
                                <span>Trải nghiệm vai trò của những nhà đầu tư thực thụ qua Mô hình đầu tư thực tế nhóm dưới sự hướng dẫn, theo sát của giảng viên và team trợ giảng hứa hẹn sẽ giúp bạn có thể bắt nhịp ngay với Thị trường Chứng khoán mà không mất nhiều thời gian.</span>
                            </div>
                        </div>

                        <div class="model-element">
                            <h4 class="text-end"><strong>03.</strong> GIÁ TRỊ CỘNG ĐỒNG</h4>
                            <div class="span-padding">
                                <span>Ưu đãi học phí đặc biệt chỉ bằng 1/10 so với các khóa học thông thường dành cho sinh viên nhằm mang đến môi trường nuôi dưỡng nhân tài, giúp đỡ các nhà đầu tư tương lai không ngừng học tập, không ngừng phấn đấu để phát triển bản thân và tạo nên sự thay đổi tích cực cho xã hội.</span>
                            </div>
                        </div>


                        <div class="model-element">
                            <h4 class="text-end"><strong>04.</strong> KINH NGHIỆM TỔ CHỨC</h4>
                            <div class="span-padding">
                                <span>Trải qua 10 năm tổ chức, START-UP luôn là khóa học cơ bản về Chứng khoán được đánh giá cao với sự đầu tư về chất lượng dành cho sinh viên. Với kinh nghiệm, kỹ năng, tác phong chuyên nghiệp và sự nhiệt huyết của mình, CLB Chứng khoán (SIC) trường ĐH Ngoại thương sẽ giúp bạn có được những trải nghiệm hiệu quả nhất với Khóa học Chứng khoán cơ bản START-UP 2018.</span>
                            </div>
                        </div>



                    </div>
                    <div class="col-xs-4 col-md-4 col-lg-4 end-text-left">
                        <p>TẠI SAO NÊN CHỌN</p>
                        <p class="color-blue">START-UP?</p>
                        <img class="img-step" src="{{asset('FTU2/images/whyChoose.png')}}">
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection

@section('scripts')

@endsection