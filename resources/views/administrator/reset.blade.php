@extends('2019.layout')
@section('title','Quên mật khẩu')
@section('content')

    <div class="container">
        <div class="card card-container">

            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text"  class="form-control" placeholder="Email administrator" required autofocus>

                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Reset mật khẩu</button>
            </form><!-- /form -->

        </div><!-- /card-container -->
    </div><!-- /container -->

@endsection