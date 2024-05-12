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
        <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('layouts.users.email') }}</label>
        <div class="col-md-7">
            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email', isset($user) && $user->email ? $user->email : '') }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row col-md-10">
        <label for="country_code" class="col-md-3 col-form-label text-md-right">
            {{ __('layouts.users.country_code') }}
        </label>

        <div class="col-md-7">
            <input id="country_code" type="text" class="form-control @error('country_code') is-invalid @enderror"
                   name="country_code" value="{{ old('country_code', isset($user) && $user->country_code ? $user->country_code : '') }}"
                   autocomplete="nope">

            @error('country_code')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row col-md-10">
        <label for="phone_number" class="col-md-3 col-form-label text-md-right">
            {{ __('layouts.users.phone_number') }}
        </label>

        <div class="col-md-7">
            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror"
                   name="phone_number" value="{{ old('phone_number', isset($user) && $user->phone_number ? $user->phone_number : '') }}"
                   autocomplete="nope">

            @error('phone_number')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row col-md-10">
        <label for="phone_number_zalo" class="col-md-3 col-form-label text-md-right">
            {{ __('layouts.users.phone_number_zalo') }}
        </label>

        <div class="col-md-7">
            <input id="phone_number_zalo" type="text" class="form-control @error('phone_number_zalo') is-invalid @enderror"
                   name="phone_number_zalo" value="{{ old('phone_number_zalo', isset($user) && $user->phone_number_zalo ? $user->phone_number_zalo : '') }}"
                   autocomplete="nope">

            @error('phone_number_zalo')
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
