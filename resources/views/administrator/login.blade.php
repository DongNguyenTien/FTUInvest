@extends('2019.layout')
@section('title','Administrator')
@section('content')

            <div class="container">
                <div class="card card-container">

                    <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                    <p id="profile-name" class="profile-name-card"></p>

                    <form class="form-signin" action="{{route('administrator.action')}}" method="post">
                        {{csrf_field()}}
                        <span id="reauth-email" class="reauth-email"></span>

                        <input type="text" name="name"  class="form-control" placeholder="Username" required autofocus>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>

                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Đăng nhập</button>
                    </form><!-- /form -->
                    <div style="text-align: center">
                        <a href="{{route('administrator.reset')}}" class="forgot-password" >
                            Reset mật khẩu
                        </a>
                    </div>

                </div><!-- /card-container -->
            </div><!-- /container -->

    @endsection