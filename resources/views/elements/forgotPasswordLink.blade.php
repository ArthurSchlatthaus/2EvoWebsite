<div style="width: 70%; margin: auto;color: #b7934c;">
    <h2>{{ __('messages.pswdReset') }}</h2>

    <form action="{{ route('reset.password.post') }}" method="POST">
        @csrf
        @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach

        <div class="form-group row" style="padding-top: 10px;">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.email') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.newPswd') }}</label>
            <div class="col-md-6">
                <input type="password" id="password" class="form-control" name="password" required >
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('messages.newPswdConf') }}</label>
            <div class="col-md-6">
                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required >
                @if ($errors->has('password_confirmation'))
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row mb-0" style="padding-top: 10px;">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn" style="display:inline;border-color: black;background-color:white">
                    {{ __('messages.updatePswd') }}
                </button>
            </div>
        </div>
    </form>
</div>

