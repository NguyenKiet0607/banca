<div class="row">
    <div class="form-group row col-md-10">
        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('layouts.games.name') }} <span
                class="required">*</span></label>

        <div class="col-md-7">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                   name="name" value="{{ old('name', isset($game) && $game->name ? $game->name : '') }}"
                   autocomplete="nope">

            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row col-md-10">
        <label for="priority" class="col-md-3 col-form-label text-md-right">{{ __('layouts.games.priority') }} <span class="required">*</span></label>
        <div class="col-md-7">
            <input id="priority" type="text" class="form-control @error('priority') is-invalid @enderror"
                   name="priority" value="{{ old('priority', isset($game) && $game->priority ? $game->priority : '') }}"
                   autocomplete="nope">
            @error('priority')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row col-md-10">
        <label for="slug" class="col-md-3 col-form-label text-md-right">{{ __('layouts.games.slug') }} <span class="required">*</span></label>
        <div class="col-md-7">
            <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror"
                   name="slug" value="{{ old('slug', isset($game) && $game->slug ? $game->slug : '') }}"
                   autocomplete="nope">
            @error('slug')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row col-md-10">
        <label for="image" class="col-md-3 col-form-label text-md-right">{{ __('layouts.games.image') }} <span class="required">*</span></label>
        <div class="col-md-7">
            <input id="image" type="file" class="form-control @error('image_url') is-invalid @enderror"
                   name="image_url" acceptaccept="image/*">
            @error('image_url')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
            @if(isset($game))
            <div>
                <img src="{{ asset('images/'.$game->image_url) }}" />
            </div>
            @endif
        </div>
    </div>

    <div class="form-group row col-md-10">
        <label for="parent" class="col-md-3 col-form-label text-md-right">{{ __('layouts.games.parent') }} <span class="required">*</span></label>
        <div class="col-md-7">
            <select name="parent_id" id="parent" class="form-control @error('parent_id') is-invalid @enderror">
            <option value="0" @if(old('parent_id', isset($game) ? $game->parent_id : '' ) == 0) selected @endif>NULL</option>
            @foreach($gameParent as $item)
                    <option value="{{ $item->id }}" @if(old('parent_id', isset($game) ? $game->parent_id : '' ) == $item->id) selected @endif>{{ $item->name }}</option>
                @endforeach
            </select>
            @error('parent_id')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row col-md-10">
        <label for="workplace" class="col-md-3 col-form-label text-md-right">{{ __('layouts.games.workplace') }} <span class="required">*</span></label>
        <div class="col-md-7">
            <input name="workplace" type="radio" id="workplace-0" value="0"
               @if(old('workplace', isset($game) ? $game->workplace : 0) == 0) checked @endif>
            <label for="workplace-1"> {{ __('layouts.games.workplace_all') }}</label>
            <input name="workplace" type="radio" id="workplace-1" value="1"
               @if(old('workplace', isset($game) ? $game->workplace : 0) == 1) checked @endif>
            <label for="workplace-1"> {{ __('layouts.games.workplace_web') }}</label>
            <input name="workplace" type="radio" id="workplace-2" value="2"
               @if(old('workplace', isset($game) ? $game->workplace : 0) == 2) checked @endif>
            <label for="workplace-1"> {{ __('layouts.games.workplace_app') }}</label>
            @error('workplace')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
