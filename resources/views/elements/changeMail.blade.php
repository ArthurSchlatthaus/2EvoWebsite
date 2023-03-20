<div id="changeMail" style="width: 70%; margin: auto;color: #b7934c;">

    @if(auth()->user()->email == null)
        <h2>{{ __('messages.addMail') }}</h2>

        <form method="POST" action="{{ route('add.mail') }}" >
            @csrf

            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach

            <div class="form-group row" style="padding-top: 10px;">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.newMail') }}</label>

                <div class="col-md-6">
                    <input id="new_email" type="email" class="form-control" name="new_email" required>
                </div>
            </div>

            <div class="form-group row" style="padding-top: 10px;">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.newMailConf') }}</label>

                <div class="col-md-6">
                    <input id="new_confirm_email" type="email" class="form-control" name="new_confirm_email" required>
                </div>
            </div>

            <div class="form-group row mb-0" style="padding-top: 10px;">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn" style="display:inline;border-color: black;background-color:white">
                        {{ __('messages.addMail') }}
                    </button>
                </div>
            </div>
        </form>
    @else
        <h2>{{ __('messages.changeMail') }}</h2>

        <form method="POST" action="{{ route('change.mail') }}" >
            @csrf

            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
            <div class="form-group row" style="padding-top: 10px;">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.currMail') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="current_email">
                </div>
            </div>

            <div class="form-group row" style="padding-top: 10px;">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.newMail') }}</label>

                <div class="col-md-6">
                    <input id="new_email" type="email" class="form-control" name="new_email">
                </div>
            </div>

            <div class="form-group row" style="padding-top: 10px;">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.newMailConf') }}</label>

                <div class="col-md-6">
                    <input id="new_confirm_email" type="email" class="form-control" name="new_confirm_email">
                </div>
            </div>

            <div class="form-group row mb-0" style="padding-top: 10px;">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn" style="display:inline;border-color: black;background-color:white">
                        {{ __('messages.changeMail') }}
                    </button>
                </div>
            </div>
        </form>
    @endif
</div>
