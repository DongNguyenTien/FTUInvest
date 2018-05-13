@extends('layout')
@section('title','Administrator')
@section('content')

    <div class="container">
        <div class="card card-container">


            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {!! $error !!}<br/>
                    @endforeach
                </div>
            @endif
            <form class="form-signin" action="{{route('loginPost')}}" method="post">
                {{csrf_field()}}
                <span id="reauth-email" class="reauth-email"></span>

                <input type="email" name="email"  class="form-control" placeholder="Email" required autofocus value="{{old('email')}}">
                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" required value="{{old('phone')}}">
                <input type="password" class="form-control" name="password" placeholder="Password" required value="{{old('password')}}">

                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Đăng nhập</button>
            </form><!-- /form -->


        </div><!-- /card-container -->
    </div><!-- /container -->

@endsection