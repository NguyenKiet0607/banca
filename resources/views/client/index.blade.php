<!DOCTYPE html>
<!-- saved from url=(0020)http://hackslot.win/ -->
<html lang="en" style="height: 100%;">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('TITLE_SITE', 'HACK NOHU 2024') }}</title>
    <meta name="api-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" url="{{ asset('js/home.js') }}">
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
    <!----><!---->
    <div class="bacarat-1-page bg-type1">
        <div class="bg-main">
            <img src="{{ asset('images/bg1.jpg') }}" alt="" class="bg-main-1">
        </div>
        <header>
            <div class="header_wrapper">
                <div class="header-col-L">
                    <a href="#" class="header-logo">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </a>
                
                </div>
                <div class="header-col-R">
                    <div class="header-group-btn">
                        <div class="heeader-btn_item btn-user notranslate">
                            <p></p>
                        </div>
                        <div class="heeader-btn_item btn-credit">
                            <p>Xu </p>
                        </div>
                        <div class="heeader-btn_item btn-help">
                            <p>Nạp xu</p>
                        </div>
                        <div class="heeader-btn_item btn-help">
                            <p>Hỗ trợ</p>
                        </div>
                        <div class="heeader-btn_item btn-logout">
                            <p>Đăng xuất</p>
                        </div>
                    </div>
                    <div class="hamburger">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                        <div class="bar4"></div>
                    </div>
                </div>
            </div>
        </header>
        <section class="slectgame-slide">
            <div class="slectgame_inner">
                <div class="title-Page">
                    <h1>SLOT</h1>
                </div>
                <div class="slot_wrapper">
                </div>
            </div>
        </section>
    </div>
</div>
<script src="{{ asset('js/home.js') }}"></script>
</body>

</html>
