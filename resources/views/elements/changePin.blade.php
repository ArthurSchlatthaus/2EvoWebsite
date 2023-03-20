<div id="changePassword" style="width: 70%; margin: auto;color: #b7934c;">
    <h2>{{ __('messages.changePin') }}</h2>

    <form method="POST" action="{{ route('change.pin') }}" >
        @csrf

        @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach

        <div class="form-group row" style="padding-top: 10px;">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.currPin') }}</label>

            <div class="col-md-6">
                <input id="currPin" type="number" class="form-control" name="currPin" required>
            </div>
        </div>

        <div class="form-group row" style="padding-top: 10px;">
            <label for="pin" class="col-md-4 col-form-label text-md-right">{{ __('messages.newPin') }}</label>

            <div class="col-md-6">
                <input id="newPin" type="password" class="form-control" name="newPin" required>
            </div>
        </div>

        <div class="form-group row" style="padding-top: 10px;">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.newPinConf') }}</label>

            <div class="col-md-6">
                <input id="newPin_confirm" type="password" class="form-control" name="newPin_confirm" required>
            </div>
        </div>

        <div class="form-group row mb-0" style="padding-top: 10px;">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn" style="display:inline;border-color: black;background-color:white">
                    {{ __('messages.updatePin') }}
                </button>
            </div>
        </div>
    </form>
</div>
