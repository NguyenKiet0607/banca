@extends('client.layout')

@section('body')
    <div class="bacarat-1-page bg-type1">
        @include('client.header')
        <section class="slectgame-slide">
            <div class="slectgame_inner col-9 detail_game_inner">
                <div class="row">
                    <div class="col-4 ava1">
                        <img height="440px" alt="ava1" src="{{ asset('images/ava1.png') }}">
                    </div>
                    <div class="col-8 ava2">
                        <div class="d-flex">
                            <div class="img-parent">
                                <img alt="" src="{{ asset('images/ka.png') }}" height="35px">
                            </div>
                            <div class="img-child">
                                <img alt="" src="{{ asset('images/cq9.png') }}" height="45px">
                            </div>
                            <div class="title">
                                APP HACK SLOT PRO
                            </div>
                        </div>
                        <div class="count-down">
                            <div class="count-down-title">ĐẾM NGƯỢC</div>
                            <div class="count-down-title count-down-time" id="count-down-time"></div>
                            <div class="count-down-image">
                            <img alt="" src="{{ asset('images/1.png') }}" >
                            </div>
                        </div>
                        <div class="mt-3">
                            <img alt="" src="{{ asset('images/3_6.png') }}">
                        </div>
                        <div class="mt-3">
                            <img alt="" src="{{ asset('images/4_1.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <!-- <script>
        var GlobalGameSlug = '{{ $game->slug }}';
        var GlobalGameId = '{{ $game->id }}';
    </script> -->
    <script src="{{ asset('js/game-detail.js') }}"></script>
@endsection
