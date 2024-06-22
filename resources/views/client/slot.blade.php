@extends('client.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/game.css') }}">
@endsection

@section('body')
      <div class="bacarat-1-page bg-type1">
        <div class="bg-main">
          <img src="{{ asset('images/bg1.png') }}" alt="" class="bg-main-1">
        </div>
        <header>
          <div class="header_wrapper">
            <div class="header-col-L">
              <a href="/" class="header-logo">
<!--                <img src="{{ asset('images/logo.png') }}" alt="">-->
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
        <section class="slectgame-slide">
          <div class="slectgame_inner">
            <div class="title-Page">
              <div class="btn-back">
                <p>Quay lại</p>
              </div>
              <h1>{{ $game->name }}</h1>
            </div>
            <div class="inner-room">
              <div class="inner-room_wrapper slot_wrapper">

              </div>
            </div>
          </div>
        </section>
      </div>
    @endsection

    @section('js')
    <script>
      var GlobalGameSlug = '{{ $game->slug }}';
    </script>
    <script src="{{ asset('js/game.js') }}"></script>
    @endsection
