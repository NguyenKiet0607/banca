<!DOCTYPE html>
<!-- saved from url=(0020)http://hackslot.win/ -->
<html lang="en" style="height: 100%;">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('TITLE_SITE', 'HACK NOHU 2024') }}</title>
    <meta name="api-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">.
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    @yield('css')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="{{ asset('js/coin.js') }}"></script>
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
    @yield('body')
</div>
<div class="model-logout model-logout_active" style="display: none" id="coin-model">
    <div class="model-logout_overlay"></div>
    <div class="model-logout_wrapper">
        <div class="model-title">
            <h1>Nạp Coin</h1>
        </div>
        <form id="coinform">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Mã nạp coin" name="code" autocomplete="off" required="">
            </div>
            <div class="form-group form-group_btn">
                <div class="btn btn-model-cc">Huỷ</div>
                <button type="submit" class="btn btn-model-cf"> Nạp </button>
            </div>
        </form>
    </div>
</div>
@yield('js')
</body>

</html>
