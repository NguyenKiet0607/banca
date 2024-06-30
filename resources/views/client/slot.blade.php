@extends('client.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/game.css') }}">
@endsection

@section('body')
      <div class="bacarat-1-page bg-type1">
        @include('client.header')
        <section class="slectgame-slide">
          <div class="slectgame_inner col-8 slectslot_inner">
            <div class="title-Page">
              <div class="btn-back">
              <img src="{{ asset('images/333.png') }}" alt="back">
              </div>
              <h1>{{ $game->name }}</h1>
            </div>
            <div class="slot_wrapper slot_detail_wrapper">
              @foreach($slots as $slot)
              <div class="slot_item">
                <div class="slot_image">
                  <img alt="slot image" src="{{ asset('images/'.$slot->image_url) }}">
                </div>
                <div class="slot_title">{{ $slot->name }}</div>
                <div class="slot_percent_1">{{ $slot->percent }}%</div>
                <div class="slot_percent_2">50%</div>
              </div>
              @endforeach
            </div>
          </div>
        </section>
      </div>
    @endsection

    @section('js')
    <!-- <script>
      var GlobalGameSlug = '{{ $game->slug }}';
    </script> -->
    <!-- <script src="{{ asset('js/game.js') }}"></script> -->
    @endsection
