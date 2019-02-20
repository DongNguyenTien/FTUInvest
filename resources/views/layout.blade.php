<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="icon" type="image/x-icon" href="{{asset('/FTU2/images/icon.png')}}" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin-lte/bootstrap/css/bootstrap.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-lte/font-awesome/css/font-awesome.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/AdminLTE.min.css') }}">

    <!-- Custom CSS -->
    <link href="{{asset('/css/style.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('/css/styleFTU2.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/loading.css')}}" rel="stylesheet" type="text/css">



    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables/dataTables.bootstrap.css') }}">


    <link rel="stylesheet" href="{{ URL::asset('admin-lte/dist/css/bootstrap-datetimepicker.min.css') }}" />


    <!-- Waitme -->
    <link href="{{ asset('admin-lte/plugins/waitMe/waitMe.css') }}" rel="stylesheet" />

    <!-- Icheck -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/iCheck/all.css') }}">

    <!-- Loading -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.css">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>




    <![endif]-->


</head>

<body class="hold-transition skin-blue sidebar-mini">
<style>
    body{
        {{--background-image: url('{{asset('/image/Background.jpg')}}');--}}
        {{--background-size: cover;--}}
        {{--background-repeat: repeat;--}}
        {{--min-height: 800px;--}}
        {{--font-family: 'Roboto', sans-serif;--}}
    }
    .header {
        font-family: 'iCiel';
        margin: 0 -15px 0;
        background-size: cover;
        background-position-y: center;
        background-image: url(/FTU2/images/banner-header2.png);
        min-height: 200px;
    }
    .logo img {
        width: 60%;
        margin: 0;
    }
</style>


<div class="container-fluid">
    <header class="header">
        @component('components.header')@endcomponent
    </header>

    <div class="content">
        @yield('content')
    </div>
    <footer class="footer">
        @component('components.footer')@endcomponent
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->



</div>




<!-- jQuery 3 -->
<script src="{{ asset('admin-lte/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin-lte/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/jqueryValidation/jquery.validate.min.js') }}"></script>

<!-- Bootstrap core JavaScript -->

<script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<!-- Jquery countdown-->
<script src="{{asset('/js/jquery.countdown.js')}}"></script>

<!-- Select 2 -->
<script src="{{ asset('admin-lte/plugins/select2/select2.js') }}"></script>
<script src="{{ URL::asset('admin-lte/dist/js/moment-with-locales.min.js') }}"></script>


<!-- AdminLTE App -->
<script src="{{ URL::asset('admin-lte/dist/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }}"></script>



<!--Icheck-->
<script src="{{ asset('admin-lte/plugins/iCheck/icheck.min.js') }}"></script>

<!-- Custom -->
<script src="{{ asset('js/init.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/waitMe/waitMe.js') }}"></script>
<script src="{{ asset('js/notify.min.js') }}"></script>
<script src="{{asset('admin-lte/dist/js/custom.js')}}"></script>


@yield('scripts')


<!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. -->
</body>
</html>
