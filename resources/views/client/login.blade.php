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
                    <img width="6000px" src="{{ asset('images/logo.png') }}" alt="">
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

            <div class="contact-section">
                @if(!empty(env('PHONE_NUMBER')) || !empty(env('TELEGRAM_GROUP_LINK')))
                <div class="contact-title">
                    <h2>Liên hệ</h2>
                </div>
                @endif
                @if(!empty(env('TELEGRAM_GROUP_LINK')))
                <div class="contact-telegram">
                    <img src="{{ asset('images/telegram-logo.svg') }}" alt="Telegram Icon">
                    <p class="telegram-text">Telegram</p>
                    <a href="https://t.me/{{ env('TELEGRAM_GROUP_LINK') }}"> {{ env('TELEGRAM_GROUP_LINK') }}</a>
                </div>
                @endif
                @if(!empty(env('PHONE_NUMBER')))
                <div class="contact-telegram">
                    <img src="{{ asset('images/phone-call-icon.svg') }}" alt="Telegram Icon">
                    <p class="telegram-text">Liên hệ: {{ env('PHONE_NUMBER') }} </p>
                </div>
                @endif
            </div>

            <style>
                .contact-image {
                    margin-bottom: 10px;
                }

                .contact-section {
                    text-align: center;
                    margin-bottom: 10px;
                    margin-top: 10px;
                }

                .contact-title {
                    font-size: 16px;
                    font-weight: bold;
                    color: white;
                    margin-bottom: 5px;
                }

                .contact-telegram {
                    display: flex;
                    color: white;
                    justify-content: center;
                    align-items: center;
                }

                .contact-telegram img {
                    width: 24px;
                    height: 24px;
                    margin-right: 10px;
                }

                .telegram-text {
                    margin-right: 10px;
                    color: white; /* Set your desired color here */
                }
            </style>

        </div>
        <!----><!---->
    </div>
    @include('client.login-model')
    @include('client.register-model')
@endsection

@section('js')
<script src="{{ asset('js/login.js').'?v=1.0.0' }}"></script>
@endsection
