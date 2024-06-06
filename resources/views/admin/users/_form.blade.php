<div class="row">
    <div class="form-group row col-md-10">
        <label for="username" class="col-md-3 col-form-label text-md-right">{{ __('layouts.users.username') }} <span
                class="required">*</span></label>

        <div class="col-md-7">
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                   name="username" value="{{ old('username', isset($user) && $user->username ? $user->username : '') }}"
                   autocomplete="nope">

            @error('username')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row col-md-10">
        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('layouts.users.name') }} <span
                class="required">*</span></label>

        <div class="col-md-7">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                   name="name" value="{{ old('name', isset($user) && $user->name ? $user->name : '') }}"
                   autocomplete="nope">

            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row col-md-10">
        <label for="phone" class="col-md-3 col-form-label text-md-right">
            {{ __('layouts.users.phone') }}
        </label>

        <div class="col-md-7">
            <input id="phone" type= @if(Auth::guard('admin')->user()->role == 2) "password" @else "text" @endif class="form-control @error('phone') is-invalid @enderror"
                   name="phone_number" value="{{ old('phone', isset($user) && $user->phone ? $user->phone : '') }}"
                   autocomplete="nope"  @if(Auth::guard('admin')->user()->role == 2) disabled @endif>

            @error('phone')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row col-md-10">
        <label for="phone_zalo" class="col-md-3 col-form-label text-md-right">
            {{ __('layouts.users.phone_zalo') }}
        </label>

        <div class="col-md-7">
            <input id="phone_zalo" type= @if(Auth::guard('admin')->user()->role == 2) "password" @else "text" @endif class="form-control @error('phone_zalo') is-invalid @enderror"
                   name="phone_number_zalo" value="{{ old('phone_zalo', isset($user) && $user->phone_zalo ? $user->phone_zalo : '') }}"
                   autocomplete="nope"  @if(Auth::guard('admin')->user()->role == 2) disabled @endif>

            @error('phone_zalo')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row col-md-10">
        <label class="col-md-3 col-form-label text-md-right">{{ __('layouts.users.status') }} <span
                class="required">*</span></label>
        <div class="col-md-7">
            <input name="status" type="radio" id="status-1" value="1"
               @if(old('status', isset($user) ? $user->status : 1) == 1) checked @endif>
            <label for="status-1"> {{ __('layouts.users.active') }}</label>
            <input name="status" type="radio" id="status-2" value="0"
               @if(old('status', isset($user) ? $user->status : 1) == 0) checked @endif>
            <label for="status-2"> {{ __('layouts.users.inactive') }}</label>
            @error('role')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row col-md-10">
        <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('layouts.users.password') }} <span class="required">*</span></label>

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
