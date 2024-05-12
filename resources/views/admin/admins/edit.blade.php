@extends('layouts.app')

@section('title', __('layouts.update'))

@section('content_header')
    <h1>
        <a href="{{ route('admins.index') }}"><i class="fa fa-fw fa-user-secret"></i>
            {{ __('layouts.admins.title') }}</a> / {{ __('layouts.update') }}
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
                <h3 class="card-title">{{ __('layouts.update') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form class="form-horizontal" id="admin-form-edit" action="{{ route('admins.update', $admin->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                {{ csrf_field() }}

                @include('admin.admins._form', [
                    'admin' => $admin
                ])

                <div class="form-group row col-md-10">
                    <div class="col-md-3"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('admins.index') }}" class="btn btn-default">
                                {{ __('layouts.btn_cancel') }}
                            </a>
                            <button type="submit" class="btn btn-primary btn-admin-edit" id="btn-edit">
                                {{ __('layouts.btn_edit') }}
                            </button>
                            <button type="button" class="btn btn-danger btn-admin-delete" data-toggle="modal" data-target="#modal-delete-admin">
                                {{ __('layouts.btn_delete') }}
                            </button>
                            @include('adminlte::components.tool.modal', [
                                'idModal' => 'modal-delete-admin',
                                'content' => __('messages.admins.message_delete'),
                                'idSubmit' => 'btn-submit-delete'
                            ])
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
<form hidden id="form_delete" action="{{ route('admins.destroy', $admin->id) }}" method="POST" >
    @csrf
    @method('DELETE')
</form>
@section('js')
    <script>
        $('#btn-submit-delete').on('click', function() {
            $('#form_delete').submit();
        })
    </script>
@endsection
