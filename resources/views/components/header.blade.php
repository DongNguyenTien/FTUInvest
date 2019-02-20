    <div class="row header-row">

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="logo">
                    <a href="{{route('home')}}"><img src="{{asset('/FTU2/images/logostu.png')}}"/> </a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <nav class="navbar navbar-right">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand visible-xs" href="#">MENU</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a class="cool-link menu-border-right" href="{{route('home')}}">TRANG CHỦ<span class="sr-only">(current)</span></a></li>
                                <li><a class="cool-link menu-border-right" href="https://sic-ftu.org/">VỀ CHÚNG TÔI</a></li>
                                <li><a class="cool-link menu-border-right" href="{{route('tongquan')}}">TỔNG QUAN</a></li>
                                <li><a class="cool-link " href="{{route('doitac')}}">ĐỐI TÁC</a></li>
                                {{--<li><a id="timkiem" class="cool-link" href="#">TÌM KIẾM</a></li>--}}
                            </ul>
                        </div><!-- /.navbar-collapse -->
                </nav>
            </div>

    </div>
    <!-- <div class="row">
      <div class="navbar">
    </div> -->
