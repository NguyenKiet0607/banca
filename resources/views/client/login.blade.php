@extends('client.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

@endsection

@section('body')
    <!---->
    <div class="index-page bg-type1">
        <div class="index-page_wrapper">
            <div class="group-img">
                <div class="name-site">
                    <img height="205px" width="896px" src="{{ asset('images/logo.png') }}" alt="">
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
    @include('client.login-model')
    @include('client.register-model')
@endsection

@section('js')
<script src="{{ asset('js/login.js') }}"></script>
@endsection
