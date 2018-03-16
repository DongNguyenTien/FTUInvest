@extends('layout')
@section('title','Homepage')
@section('content')
    <div class="container">
        <div class="container text-center">
            <div class="text-left"><img id="quoteL" src="{{asset('/html/images/quoteL.png')}}"></div>
            <p> Thời sinh viên ai cũng đã từng được trao cho những cơ hội khác nhau để phát triển khả năng. Thế nhưng cho đến những năm <br> cuối Đại học, số đông đều cảm thấy tiếc nuối vì đã bỏ lỡ nhiều cơ hội quý giá. Tại sao vậy? Mọi sự tiếc nuối đều không tồn tại <br> nếu mỗi chúng ta dứt khoát bước khỏi vùng an toàn của mình. I-INVEST! được sinh ra để giải quyết một vấn đề rất rõ ràng: <br><br></p>
            <span id="txtBorder"> <i>đã đến lúc sinh viên cần tự nắm lấy một cơ hội để bứt phá </i></span>
            <br>
            <br>
            <p> Trải qua 9 năm tổ chức I-INVEST luôn khẳng định là cuộc thi Kinh tế - Tài chính lớn nhất miền Bắc với sự đầu <br> tư về chất lượng và quy mô. Hơn cả một cuộc thi dành cho sinh viên, I-INVEST! được CLB chứng khoán(SIC) <br> cho ra đời với sứ mệnh mang đến cho các bạn trẻ một cơ hội để thấu hiểu chính mình và lĩnh vực đang theo <br> đuổi. Từ đó, chúng tôi tin rằng, các bạn sẽ có thể thử thách và khẳng định bản thân trên con đường đã chọn</p>
            <div class="text-right thumb"><img id="quoteR" src="{{asset('/html/images/quoteR.png')}}"></div>
        </div>
    </div>
    <div class="container text-center coutdown">
        <h2>
            Bạn còn <span id="hour">17:00:00:00 </span> để
        </h2>
        <button id="btn-thuthach" type="button" class="btn">THỬ THÁCH</button>
    </div>
    @endsection