<div id="addQuestion" style="width: 70%; margin: auto;color: #b7934c;">
        <h2>{{ __('messages.addQuestion') }}</h2>

        <form method="POST" action="{{ route('add.question') }}" >
            @csrf

            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
            @if(auth()->user()->question1 == null and auth()->user()->answer1==null)
                <div class="form-group row" style="padding-top: 10px;">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.question') }} ~ 1</label>
                    <div class="col-md-6">
                        <input id="question1" type="text" class="form-control" name="question1" value="{{(auth()->user()->question1)}}" required>
                    </div>
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.answer') }} ~ 1</label>
                    <div class="col-md-6">
                        <input id="answer1" type="text" class="form-control" name="answer1" value="{{auth()->user()->answer1}}" required>
                    </div>
                    <input type="hidden" name="qa1" value="true">
                </div>
            @endif
            @if(auth()->user()->question2 == null and auth()->user()->answer2==null)
                <div class="form-group row" style="padding-top: 10px;">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.question') }} ~ 2</label>
                    <div class="col-md-6">
                        <input id="question2" type="text" class="form-control" name="question2" value="{{auth()->user()->question2}}" required>
                    </div>
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.answer') }} ~ 2</label>
                    <div class="col-md-6">
                        <input id="answer2" type="text" class="form-control" name="answer2" value="{{auth()->user()->answer2}}" required>
                    </div>
                    <input type="hidden" name="qa2" value="true">
                </div>
            @endif
            @if(auth()->user()->question3 == null and auth()->user()->answer3==null)
                <div class="form-group row" style="padding-top: 10px;">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.question') }} ~ 3</label>
                    <div class="col-md-6">
                        <input id="question3" type="text" class="form-control" name="question3" value="{{auth()->user()->question3}}" required>
                    </div>
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.answer') }} ~ 3</label>
                    <div class="col-md-6">
                        <input id="answer3" type="text" class="form-control" name="answer3" value="{{auth()->user()->answer3}}" required>
                    </div>
                </div>
                <input type="hidden" name="qa3" value="true">
            @endif
            @if(auth()->user()->question1 == null or auth()->user()->question2 == null or auth()->user()->question3 == null)
                <div class="form-group row mb-0" style="padding-top: 10px;">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn" style="display:inline;border-color: black;background-color:white">
                            {{ __('messages.addQuestion') }}
                        </button>
                    </div>
                </div>
            @else
                <h4>{{ __('messages.noQuestion') }}</h4>
            @endif
        </form>
</div>
