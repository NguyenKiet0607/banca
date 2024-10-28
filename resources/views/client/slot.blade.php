@extends('client.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/game.css') }}">
@endsection

@section('body')
      <div class="bacarat-1-page bg-type1">
        @include('client.header')
        <section class="slectgame-slide">
          <div class="slectgame_inner col-md-8 col-11 slectslot_inner">
            <div class="title-Page">
              <div class="btn-back">
                <a href="/"><img src="{{ asset('images/333.png') }}" alt="back"></a>
              </div>
              <h1>{{ $game->name }}</h1>
            </div>
            <div class="slot_wrapper slot_detail_wrapper">
              @foreach($slots as $slot)
              <a href="{{ route('detail-slot', [$slot->slug, $slot->id]) }}">
                <div class="slot_item">
                  <div class="slot_image">
                    <img alt="slot image" src="{{ asset('images/'.$slot->image_url) }}">
                  </div>
                  <div class="slot_title">{{ $slot->name }}</div>
                  <div class="slot_percent_1 percent_{{ $slot->id }}">
                      {{ $slot->percent }}%
                  </div>
                  <div class="slot_percent_2 percent_{{ $slot->id }}">{{ $slot->percent }}%</div>
                    <div class="progress-bar-container">
                        <div class="progress-bar"></div>
                    </div>
                </div>
              </a>
              @endforeach
            </div>
          </div>
        </section>
      </div>
    @endsection

    @section('js')
    <script>
      var parent_id = '{{ $game->id }}';
      var decreaseCoinTime = {{ env('DECREASE_COIN_TIME', 30) }}
      var coin = {{ auth()->user()->coin }};
      var expired_time = {{ auth()->user()->expired_time }};
    </script>
    <script src="{{ asset('js/game.js').'?v=1.0.1' }}"></script>
    @endsection
