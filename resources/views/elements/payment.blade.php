<div style="width: 50%; margin: auto;color: #b7934c;">
    <h2 style="text-align: center;">Amazon ~ PaySafe Card</h2>
    <form method="POST" action="{{ route('donation.all') }}">
        @csrf
        @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach
        @if(auth()->user())
            <div class="form-group row p-4" style="padding-top: 10px;">
                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('messages.cardtype') }}</label>
                <div class="col-md-6 p-2">
                    <select name="cardType" class="form-select">
                        <option value="..." selected>...</option>
                        <option value="psc">PaySafe Card</option>
                        <option value="amazon" disabled="disabled">Amazon</option>
                    </select>
                </div>
                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('messages.amount') }}</label>
                <div class="col-md-6 p-2">
                    <select name="amount" class="form-select">
                        <option value="..." selected>...</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('messages.currency') }}</label>
                <div class="col-md-6 p-2">
                    <select name="currency" class="form-select">
                        <option value="EUR">EUR</option>
                    </select>
                </div>
                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('messages.voucher') }}</label>
                <div class="col-md-6 p-2">
                    <input type="text" class="form-control" name="voucher" required>
                </div>
            </div>


            <div class="form-group row mb-0" style="padding-top: 10px;">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn" style="display:inline;border-color: black;background-color:white;">
                        {{ __('messages.donate') }}
                    </button>
                </div>
            </div>

        @endif
    </form>

</div>
