@extends('2019.layout')
@section('title','Thử thách')
@section('content')
    <div class="text-center">
        <h2 class="home-title">Cuộc thi i-invest! 2019</h2>
        <h1 class="home-title round-1">vòng 1</h1>
    </div>
    <div class="container-info">

        <div class="test-content score-screen" >
            <h3> Chúc mừng bạn {{$member->name}} đã hoàn thành bài thi.
                <p>cuộc thi <span class="text-bold">I-INVEST! 2019 </span></p>
                <p> BTC xin cảm ơn!</p>
            </h3>


        </div>
    </div>
@endsection

@section('scripts')

@endsection