<!DOCTYPE html>
<!-- saved from url=(0020)http://hackslot.win/ -->
<html lang="en" style="height: 100%;">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('TITLE_SITE', 'HACK NOHU 2024') }}</title>
    <meta name="api-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css').'?v=1.0.1' }}">
    <link rel="stylesheet" href="{{ asset('css/main.css').'?v=1.0.0' }}">.
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    @yield('css')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="{{ asset('js/coin.js').'?v=1.0.0' }}"></script>
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
<div class="model-logout model-logout_active" style="display: none" id="logout1-model">
    <div class="model-logout_overlay"></div>
    <div class="model-logout_wrapper">
        <div class="model-title">
            <h1>Đăng xuất</h1>
        </div>
        <form id="logoutform"  action="/logout" method="POST" >
            {{ csrf_field() }}
            <div class="form-group form-group_btn">
                <div class="btn btn-model-cc">Huỷ</div>
                <button type="submit" class="btn btn-model-cf"> Đồng ý</button>
            </div>
        </form>
    </div>
</div>
@include('client.alert', [
    'title' => '',
    'content' => 'Vui lòng liên hệ admin để được hỗ trợ',
    'id' => 'help-model'
])

@include('client.alert', [
    'title' => 'Bạn đã hết xu',
    'content' => 'Vui lòng liên hệ admin để nạp thêm',
    'id' => 'coin-alert-model'
])
@yield('js')
</body>

</html>
