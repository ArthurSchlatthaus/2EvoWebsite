<div style="width: 70%; margin: auto;color: #b7934c;">
    <div class="form-group row" style="padding-top: 10px;">
        <h2 class="col-md-6 offset-md-4">{{ __('messages.forgot') }}</h2>
    </div>
    <form method="POST" action="{{ route('forget.password.post') }}">
        @csrf
        @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach

        <div class="form-group row" style="padding-top: 10px;">
            <h4 class="col-md-6 offset-md-4">{{__('messages.email')}}</h4>
            <div class="col-md-6 offset-md-4">
                <input id="email_forgot" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email_forgot" value="" required>
            </div>
        </div>

        <div class="form-group row mb-0" style="padding-top: 10px;">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn" style="display:inline;border-color: black;background-color:white">
                    {{ __('messages.sendreset') }}
                </button>
            </div>
        </div>
    </form>
    <br>
    <div class="form-group row" style="padding-top: 10px;">
        <h2 class="col-md-6 offset-md-4">{{ __('messages.or') }}</h2>
    </div>
    <br>
    <form method="POST" action="{{ route('security.question') }}">
        @csrf
        <div class="form-group row" style="padding-top: 10px;">
            <h4 class="col-md-6 offset-md-4">{{__('messages.username')}}</h4>
            <div class="col-md-6 offset-md-4">
                <input id="username" type="text" class="form-control" name="username" value="" required>
            </div>
            <h4 class="col-md-6 offset-md-4">{{__('messages.pin')}}</h4>
            <div class="col-md-6 offset-md-4">
                <input id="pin" type="text" class="form-control" name="pin" value="" required>
            </div>
        </div>

        <div class="form-group row mb-0" style="padding-top: 10px;">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn" style="display:inline;border-color: black;background-color:white">
                    {{ __('messages.securityQuestion') }}
                </button>
            </div>
        </div>
    </form>
</div>


