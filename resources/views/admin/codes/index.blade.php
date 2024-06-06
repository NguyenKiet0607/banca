@extends('layouts.app')

@section('title', __('layouts.codes.title'))

@section('content_header')
    <h1><i class="fa fa-fw fa-users"></i> {{ __('layouts.codes.title') }}</h1>
@stop

@section('content')
    <!-- Main content -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ __($message)}}
        </div>
    @elseif($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ __($message)}}
        </div>
    @endif
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">{{ __('layouts.codes.title_search') }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="GET" id="form-admin-search" action="{{ route('codes.index') }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{ $request->code }}" id="code" name="code" placeholder="{{ __('layouts.codes.placeholder_search') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-8">
                                <button class="btn btn-default btn-search"><i class="fa fa-search"></i> {{ __('layouts.btn_search') }}</button>
                                <a class="btn btn-primary" href="{{ route('codes.create') }}"><i class="fa fa-plus"></i> {{ __('layouts.btn_create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered table-hover display nowrap" data-url="{{ route('codes.index', $request->all()) }}">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ __("layouts.codes.code") }}</th>
                                <th>{{ __("layouts.codes.credit") }}</th>
                                <th>{{ __("layouts.codes.createdBy") }}</th>
                                <th>{{ __("layouts.codes.use_by") }}</th>
                                <th>{{ __("layouts.codes.updated_at") }}</th>
                                <th>{{ __("layouts.codes.status") }}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            @include('admin.components.add_credit')
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/codes.js').'?v='.env('VERSION', '1.0.0') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
@endsection

