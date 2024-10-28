@extends('adminlte::page')

@section('title', 'Config')

@section('content_header')
<h1>Config</h1>
@stop

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form action="{{ route('config.update') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="phone">Số điện thoại:</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $phone }}">
    </div>
    <div class="form-group">
        <label for="telegram">Link Telegram:</label>
        <input type="text" class="form-control" id="telegram" name="telegram" value="{{ $telegram }}">
    </div>
    <div class="form-group">
        <label for="telegram">Link Hỗ trợ:</label>
        <input type="text" class="form-control" id="support" name="support" value="{{ $support }}">
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@stop
