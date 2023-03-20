<div style="width: 70%; margin: auto;color: #b7934c;">
    <div class="form-group row" style="padding-top: 10px;">
        <h2 class="col-md-6 offset-md-4">{{ __('messages.forgotPin') }}</h2>
    </div>
    <form method="POST" action="{{ route('forgot.pin.post') }}">
        @csrf
        @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach



        <div class="form-group row" style="padding-top: 10px;">
            <h4 class="col-md-6 offset-md-4">{{__('messages.password')}}</h4>
            <div class="col-md-6 offset-md-4">
                <input id="currPassword" type="password" class="form-control" name="currPassword" value="" required>
            </div>
        </div>

        <div class="form-group row" style="padding-top: 10px;">
            <h4 class="col-md-6 offset-md-4">{{__('messages.newPin')}}</h4>
            <div class="col-md-6 offset-md-4">
                <input id="newPin" type="number" class="form-control" name="newPin" value="" required>
            </div>
        </div>

        <div class="form-group row" style="padding-top: 10px;">
            <h4 class="col-md-6 offset-md-4">{{__('messages.newPinConf')}}</h4>
            <div class="col-md-6 offset-md-4">
                <input id="newPin_confirm" type="number" class="form-control" name="newPin_confirm" value="" required>
            </div>
        </div>

        <div class="form-group row mb-0" style="padding-top: 10px;">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn" style="display:inline;border-color: black;background-color:white">
                    {{ __('messages.forgotPin') }}
                </button>
            </div>
        </div>
    </form>
</div>


