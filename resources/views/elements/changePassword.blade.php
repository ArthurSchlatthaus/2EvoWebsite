<div id="changePassword" style="width: 70%; margin: auto;color: #b7934c;">
    <h2>{{ __('messages.pswdReset') }}</h2>

    <form method="POST" action="{{ route('change.password') }}" >
        @csrf

        @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach

        <div class="form-group row" style="padding-top: 10px;">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.currPswd') }}</label>

            <div class="col-md-6">
                <input type="password" class="form-control" name="current_password" required>
            </div>
        </div>

        <div class="form-group row" style="padding-top: 10px;">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.newPswd') }}</label>

            <div class="col-md-6">
                <input type="password" class="form-control" name="new_password" required>
            </div>
        </div>

        <div class="form-group row" style="padding-top: 10px;">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.newPswdConf') }}</label>

            <div class="col-md-6">
                <input type="password" class="form-control" name="new_confirm_password" required>
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
