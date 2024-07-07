@extends('client.layout')

@section('body')
    <div class="bacarat-1-page bg-type1">
        @include('client.header')
        <section class="slectgame-slide">
            <div class="slectgame_inner detail_game_inner1">
                <div class="row">
                    <div class="col-4 ava1">
                        <img height="440px" alt="ava1" src="{{ asset('images/ava1.png') }}">
                    </div>
                    <div class="col-8 ava2">
                        <div class="d-flex">
                            <div class="img-parent">
                                <img alt="" src="{{ asset('images/'.$gameParent->image_url) }}" height="35px">
                            </div>
                            <div class="img-child">
                                <img alt="" src="{{ asset('images/'.$game->image_url) }}" height="45px">
                            </div>
                            <div class="title">
                                APP HACK SLOT PRO
                            </div>
                        </div>
                        <div class="count-down">
                            <div class="count-down-title">ĐẾM NGƯỢC</div>
                            <div class="count-down-title count-down-time"></div>
                            <div class="count-down-image">
                            <img alt="" src="{{ asset('images/1.png') }}" >
                            </div>
                        </div>
                        <div class="mt-3 position-relative">
                            <div class="percentage">{{ $game->percent.'%' }}</div>
                            <img alt="" src="{{ asset('images/3_6.png') }}">
                        </div>
                        <div class="mt-3">
                            <img alt="" src="{{ asset('images/4_1.png') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class=".slectslot_inner detail_game_inner2 col-11">
                <div class="title-Page">
                    <div class="btn-back">
                        <a href="/slot/{{ $gameParent->slug }}"><img src="{{ asset('images/333.png') }}" alt="back"></a>
                    </div>
                    <h1>{{ $game->name }}</h1>
                </div>
                <div class="slot_wrapper">
                    <div class="avatar-game">
                        <img src="{{ asset('images/'.$game->image_url) }}" alt="avatar">
                    </div>
                    <div class="percent-game">
                        <div class="percentage">{{ $game->percent }}%</div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <div class="count-down-wrapper">
                        <div class="count-down-time">19:00</div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        var decreaseCoinTime = {{ env('DECREASE_COIN_TIME', 30) }}
        var coin = {{ auth()->user()->coin }};
        var distance = decreaseCoinTime*coin*1000;
        var slug = '{{ $slug }}';
    </script>
    <script src="{{ asset('js/game-detail.js') }}"></script>
@endsection
