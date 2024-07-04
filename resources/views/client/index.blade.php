@extends('client.layout')

@section('css')
@endsection

@section('body')
    <!----><!---->
    <div class="bacarat-1-page bg-type1">
        @include('client.header')
        <section class="slectgame-slide">
            <div class="slectgame_inner col-md-8 col-11">
                <div class="text-center mt-3">
                    <img src="{{ asset('images/slot.png') }}" alt="slot">
                </div>
                <div class="slot_wrapper">
                    @foreach($games as $game)
                        <a href="{{ route('slot', $game->slug) }}">
                            <div data-id="{{ $game->id }}" class="detail-game">
                                <img src="{{ asset('images/'.$game->image_url) }}" alt="jili">
                            </div>
                        </a>
                    @endforeach
                
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
<!-- <script src="{{ asset('js/home.js') }}"></script> -->
@endsection
