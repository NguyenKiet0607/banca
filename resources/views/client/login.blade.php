<!DOCTYPE html>
<!-- saved from url=(0025)http://hackslot.win/login -->
<html lang="en" style="height: 100%;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('TITLE_SITE', 'HACK NOHU 2024') }}</title>
    <meta name="api-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="api-token"]').attr('content')
            }
        });
    </script>
</head>
<body style="position: relative; min-height: 100%; top: 0px;">
<div id="app" data-v-app="">
    <!---->
    <div class="index-page bg-type1">
        <div class="bg-main">
            <img src="{{ asset('images/banner-desktop.jpeg') }}" alt="" class="bg-main-1">
            <img src="{{ asset('images/banner-mobile.png') }}" alt="" class="bg-main-1 mobile">
        </div>
        <div class="index-page_wrapper">
            <div class="group-img">
                <div class="welcome">
                    <img src="{{ asset('images/welcome-to.png') }}" alt="">
                </div>
                <div class="name-site">
                    <img src="{{ asset('images/logo-big.png') }}" alt="">
                    <img src="{{ asset('images/light-1.png') }}" alt="" class="light-1">
                    <img src="{{ asset('images/light-2.png') }}" alt="" class="light-2">
                </div>
            </div>
            <div class="gruop-btn">
                <div class="btn-item btn-login">
                    <p>Đăng nhập</p>
                </div>
                <div class="btn-item btn-register">
                    <p>Đăng ký</p>
                </div>
            </div>
        </div>
        <!----><!---->
    </div>
</div>

<script src="{{ asset('js/login.js') }}"></script>
{{--            <iframe name="votingFrame" frameborder="0" src="./login_files/saved_resource.html"></iframe>--}}
        </div>
    </div>
</div>