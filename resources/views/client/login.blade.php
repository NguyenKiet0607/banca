@extends('client.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

@endsection

@section('body')
    <!---->
    <div class="index-page bg-type1">
        <div class="bg-main">
            <img src="{{ asset('images/banner-desktop.png') }}" alt="" class="bg-main-1">
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
@endsection

@section('js')
<script src="{{ asset('js/login.js') }}"></script>
@endsection
