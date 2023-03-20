<div id="securityQuestion" style="width: 70%; margin: auto;color: #b7934c;">
        <h2>{{ __('messages.answerQuestion') }}</h2>

        <form method="POST" action="{{ route('check.question') }}" >
            @csrf

            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
            @if($question1 != null)
                <div class="form-group row" style="padding-top: 10px;">
                    <label for="question1" class="col-md-4 col-form-label text-md-right">{{ __('messages.question') }} ~ 1</label>
                    <div class="col-md-6">
                        <input id="question1" type="text" class="form-control" name="question1" value="{{($question1)}}" readonly>
                    </div>
                    <label for="answer1" class="col-md-4 col-form-label text-md-right">{{ __('messages.answer') }} ~ 1</label>
                    <div class="col-md-6">
                        <input id="answer1" type="text" class="form-control" name="answer1" value="" required>
                    </div>
                </div>
            @endif
            @if($question2 != null)
                <div class="form-group row" style="padding-top: 10px;">
                    <label for="question2" class="col-md-4 col-form-label text-md-right">{{ __('messages.question') }} ~ 2</label>
                    <div class="col-md-6">
                        <input id="question2" type="text" class="form-control" name="question2" value="{{$question2}}" readonly>
                    </div>
                    <label for="answer2" class="col-md-4 col-form-label text-md-right">{{ __('messages.answer') }} ~ 2</label>
                    <div class="col-md-6">
                        <input id="answer2" type="text" class="form-control" name="answer2" value="" required>
                    </div>
                </div>
            @endif
            @if($question3 != null)
                <div class="form-group row" style="padding-top: 10px;">
                    <label for="question3" class="col-md-4 col-form-label text-md-right">{{ __('messages.question') }} ~ 3</label>
                    <div class="col-md-6">
                        <input id="question3" type="text" class="form-control" name="question3" value="{{$question3}}" readonly>
                    </div>
                    <label for="answer3" class="col-md-4 col-form-label text-md-right">{{ __('messages.answer') }} ~ 3</label>
                    <div class="col-md-6">
                        <input id="answer3" type="text" class="form-control" name="answer3" value="" required>
                    </div>
                </div>
            @endif
            @if($question1 != null or $question2 != null or $question3 != null)
                <div class="form-group row mb-0" style="padding-top: 10px;">
                    <label for="new_password" class="col-md-4 col-form-label text-md-right">{{ __('messages.newPswd') }}</label>
                    <div class="col-md-6">
                        <input id="new_password" type="password" class="form-control" name="new_password" value="" required>
                    </div>
                    <label for="new_password" class="col-md-4 col-form-label text-md-right">{{ __('messages.newPswdConf') }}</label>
                    <div class="col-md-6">
                        <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" value="" required>
                    </div>
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn" style="display:inline;border-color: black;background-color:white">
                            {{ __('messages.send') }}
                        </button>
                    </div>
                </div>
                <input type="hidden" name="userid" value="{{$userid}}">
            @else
                <h4>{{ __('messages.noQuestionThere') }}</h4>
            @endif
        </form>
</div>
