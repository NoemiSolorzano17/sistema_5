@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page" style="background: rgba(100,205,219,1);
background: -moz-radial-gradient(center, ellipse cover, rgba(100,205,219,1) 0%, rgba(7,99,133,1) 100%);
background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(100,205,219,1)), color-stop(100%, rgba(7,99,133,1)));
background: -webkit-radial-gradient(center, ellipse cover, rgba(100,205,219,1) 0%, rgba(7,99,133,1) 100%);
background: -o-radial-gradient(center, ellipse cover, rgba(100,205,219,1) 0%, rgba(7,99,133,1) 100%);
background: -ms-radial-gradient(center, ellipse cover, rgba(100,205,219,1) 0%, rgba(7,99,133,1) 100%);
background: radial-gradient(ellipse at center, rgba(100,205,219,1) 0%, rgba(7,99,133,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#64cddb', endColorstr='#076385', GradientType=1 );">
{{-- <body class="hold-transition login-page" style="background: rgba(161,230,255,1);
background: -moz-radial-gradient(center, ellipse cover, rgba(161,230,255,1) 0%, rgba(8,81,99,1) 100%);
background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(161,230,255,1)), color-stop(100%, rgba(8,81,99,1)));
background: -webkit-radial-gradient(center, ellipse cover, rgba(161,230,255,1) 0%, rgba(8,81,99,1) 100%);
background: -o-radial-gradient(center, ellipse cover, rgba(161,230,255,1) 0%, rgba(8,81,99,1) 100%);
background: -ms-radial-gradient(center, ellipse cover, rgba(161,230,255,1) 0%, rgba(8,81,99,1) 100%);
background: radial-gradient(ellipse at center, rgba(161,230,255,1) 0%, rgba(8,81,99,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a1e6ff', endColorstr='#085163', GradientType=1 );"> --}}
    <div id="app">
        <div class="login-box">
            <div class="login-logo" style="color:whitesmoke">
                <h2><span>SISTEMA</span><br><b>RECOMENDACIONES</b> </h2>
            </div><!-- /.login-logo -->

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- <div  style="background: rgba(255,255,255,1);
background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 5%, rgba(220,233,242,1) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(5%, rgba(246,246,246,1)), color-stop(100%, rgba(220,233,242,1)));
background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 5%, rgba(220,233,242,1) 100%);
background: -o-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 5%, rgba(220,233,242,1) 100%);
background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 5%, rgba(220,233,242,1) 100%);
background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 5%, rgba(220,233,242,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#dce9f2', GradientType=0 );; border-radius:25px; opacity: 0.95; padding:15px"> --}}
<div  style="background: rgba(242,246,248,1);
background: -moz-linear-gradient(-45deg, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 50%, rgba(181,198,208,1) 51%, rgba(224,239,249,1) 100%);
background: -webkit-gradient(left top, right bottom, color-stop(0%, rgba(242,246,248,1)), color-stop(50%, rgba(216,225,231,1)), color-stop(51%, rgba(181,198,208,1)), color-stop(100%, rgba(224,239,249,1)));
background: -webkit-linear-gradient(-45deg, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 50%, rgba(181,198,208,1) 51%, rgba(224,239,249,1) 100%);
background: -o-linear-gradient(-45deg, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 50%, rgba(181,198,208,1) 51%, rgba(224,239,249,1) 100%);
background: -ms-linear-gradient(-45deg, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 50%, rgba(181,198,208,1) 51%, rgba(224,239,249,1) 100%);
background: linear-gradient(135deg, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 50%, rgba(181,198,208,1) 51%, rgba(224,239,249,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f6f8', endColorstr='#e0eff9', GradientType=1 ); border-radius:25px; opacity: 0.95; padding:15px">
            
        <p class="login-box-msg">¡Inicie sesión para ingresar al sistema!</p>
        
        <form action="{{ url('/login') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">
                
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar sesión</button>
                </div><!-- /.col -->
            </div>
            <div class="row">    
                <div class="col-12" style="text-align:left">
                    <div class="checkbox icheck" >
                        <label>
                            <input type="checkbox" name="remember"><span>  </span> Recordar contraseña
                        </label>
                    </div>
                </div><!-- /.col -->
            </div>
        </form>

        @include('adminlte::auth.partials.social_login')
        {{-- <hr/> --}}
        <div style="text-align:center">
            <a href="{{ url('/password/reset') }}">Olvidé mi contraseña</a><br>
        </div>
        <!--------------------------------------------------------------------------------------------->
        <!--
        <a href="{{ url('/register') }}" class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a>
        -->
        <!--------------------------------------------------------------------------------------------->
    </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->
    </div>
    @include('adminlte::layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
