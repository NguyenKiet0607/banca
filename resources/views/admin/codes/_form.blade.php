<div class="row">
    <div class="form-group row col-md-10">
        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('layouts.codes.credit') }} <span
                class="required">*</span></label>

        <div class="col-md-7">
            <input id="credit" type="text" class="form-control @error('credit') is-invalid @enderror"
                   name="credit" value="{{ old('credit', isset($code) && $code->credit ? $code->credit : 0) }}"
                   autocomplete="nope">

            @error('credit')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
