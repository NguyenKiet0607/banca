<div class="row">
    <div class="form-group row col-md-10">
        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('layouts.admins.username') }} <span
                class="required">*</span></label>

        <div class="col-md-7">
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                   name="username" value="{{ old('username', isset($admin) && $admin->username ? $admin->username : '') }}"
                   autocomplete="nope">

            @error('username')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row col-md-10">
        <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('layouts.admins.email') }} <span class="required">*</span></label>
        <div class="col-md-7">
            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email', isset($admin) && $admin->email ? $admin->email : '') }}"
                   {{ isset($admin) ? 'readonly' : '' }} autocomplete="nope">
            @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row col-md-10">
        <label for="tenant_code" class="col-md-3 col-form-label text-md-right">{{ __('layouts.admins.tenant_code') }} <span
                class="required">*</span></label>

        <div class="col-md-7">
            <input id="tenant_code" type="text" class="form-control @error('tenant_code') is-invalid @enderror"
                   name="tenant_code" value="{{ old('tenant_code', isset($admin) && $admin->tenant_code ? $admin->tenant_code : env('TENANT_CODE_DEFAULT', '001')) }}"
                   autocomplete="nope">

            @error('tenant_code')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row col-md-10">
        <label class="col-md-3 col-form-label text-md-right">{{ __('layouts.admins.role') }} <span
                class="required">*</span></label>
        <div class="col-md-7">
            <input name="role" type="radio" id="role-1" value="1"
                @if(old('role', isset($admin) ? $admin->role : 1) == 1) checked @endif>
            <label for="role-1"> {{ __('layouts.role.1') }}</label>
            <input name="role" type="radio" id="role-2" value="2"
               @if(old('role', isset($admin) ? $admin->role : 1) == 2) checked @endif>
            <label for="role-2"> {{ __('layouts.role.2') }}</label>
            @error('role')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row col-md-10">
        <label class="col-md-3 col-form-label text-md-right">{{ __('layouts.admins.status') }} <span
                class="required">*</span></label>
        <div class="col-md-7">
            <input name="status" type="radio" id="status-1" value="1"
               @if(old('status', isset($admin) ? $admin->status : 1) == 1) checked @endif>
            <label for="status-1"> {{ __('layouts.admins.active') }}</label>
            <input name="status" type="radio" id="status-2" value="0"
               @if(old('status', isset($admin) ? $admin->status : 1) == 0) checked @endif>
            <label for="status-2"> {{ __('layouts.admins.inactive') }}</label>
            @error('role')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row col-md-10">
        <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('layouts.admins.password') }} <span class="required">*</span></label>

        <div class="col-md-7 form-group input-group">
            <input id="password" type="text" class="form-control @error('password') is-invalid @enderror"
                   name="password" value="" >
            <span class="input-group-text show-hide-password">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </span>
            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
@section('js')
<script>
    $(document).ready(function () {
        $('.show-hide-password').on('click', function () {
            var input = $(this).prev();
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                input.attr('type', 'password');
                $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });

        $('#btn-submit-delete').on('click', function() {
            $('#form_delete').submit();
        })
    });
</script>
@endsection
