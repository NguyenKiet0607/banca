@extends('layouts.app')

@section('title', __('layouts.create'))

@section('content_header')
    <h1>
        <a href="{{ route('games.index') }}"><i class="fa fa-fw fa-user-secret"></i>
            {{ __('layouts.games.title') }}</a> / {{ __('layouts.create') }}
    </h1>
@stop

@section('content')
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ __($message)}}
        </div>
    @endif

    <div class="card card-outline card-success">
        <div class="card-default">
            <div class="card-header">
                <h3 class="card-title">{{ __('layouts.create') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ route('games.store') }}" method="post" id="game-form-create" enctype="multipart/form-data" autocomplete="off" data-env="{{ env('APP_URL') }}">
                {{ csrf_field() }}

                @include('admin.games._form', [
                    'gameParent' => $gameParent
                ])

                <div class="form-group row col-md-10">
                    <div class="col-md-3">
                        &nbsp;
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('admins.index') }}" class="btn btn-default">
                                {{ __('layouts.btn_cancel') }}
                            </a>
                            <button type="submit" class="btn btn-primary btn-admin-create">
                                {{ __('layouts.btn_create') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
