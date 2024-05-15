<!DOCTYPE html>
<!-- saved from url=(0042)https://hackslot.win/game/kho-bau-aztec/11 -->
<html lang="en" style="height: 100%;">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('TITLE_SITE', 'HACK NOHU 2024') }}</title>
    <meta name="api-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body style="position: relative; min-height: 100%; top: 0px;">
    <div id="app" data-v-app=""><!----><!---->
        <div class="bacarat-1-page bg-type1">
            <div class="bg-main"><img src="{{ asset('images/bg1.jpg') }}" alt="" class="bg-main-1"></div>
            <header>
                <div class="header_wrapper">
                    <div class="header-col-L">
                        <a href="/" class="header-logo">
                            <img src="{{ asset('images/logo.png') }}" alt="">
                        </a>
                    
                    </div>
                    <div class="header-col-R">
                        <div class="header-group-btn">
                            <div class="heeader-btn_item btn-user notranslate">
                            </div>
                            <div class="heeader-btn_item btn-credit">
                            </div>
                            <div class="heeader-btn_item btn-help">
                            </div>
                            <div class="heeader-btn_item btn-help">
                            </div>
                            <div class="heeader-btn_item btn-logout">
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
            <div class="slotPage">
                <section class="slectgame-slide">
                    <div class="slectgame_inner">
                        <div class="title-Page">
                            <div class="btn-back">
                                <p>Quay lại</p>
                            </div>
                            <h1>{{ $game->name }}</h1>
                        </div>
                        <div class="innerPage_wrapper">
                            <div class="sec-picNname">
                                <div class="pic square" style="width: 30% !important;">
                                    <img alt="" src="{{ asset('images/'.$game->image_url) }}">
                                </div>
                                <div class="sec-circle square" style="width: 50% !important;">
                                    <div class="circle square">
                                        <div class="bg-1"></div>
                                        <div class="frame-1"></div>
                                        <div class="frame-2 winRate-highlight-green">
                                            <p>Tỉ lệ</p>
                                            <h1 class="notranslate">97</h1>
                                        </div>
                                        <div class="frame-3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="sec-picNname">
                                <div class="sec-circle square" style="width: 30% !important;">
                                    <div class="circle square">
                                        <div class="frame-1 no-animation"></div>
                                        <div class="frame-2 no-bg">
                                            <h1 class="txt-time">29:50</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        var GlobalGameSlug = '{{ $game->slug }}';
        var GlobalGameId = '{{ $game->id }}';
    </script>
    <script src="{{ asset('js/game-detail.js') }}"></script>
</body>

</html>