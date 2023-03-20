<link href="{{ asset('css/faq.css') }}" rel="stylesheet">
<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingOne">
        <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            {{ __('messages.FAQ_QUEST_1') }}
        </button>
      </h2>
      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">{{ __('messages.FAQ_ANSWER_1') }}</div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingTwo">
        <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            {{ __('messages.FAQ_QUEST_2') }}
        </button>
      </h2>
      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">{{ __('messages.FAQ_ANSWER_2') }}</div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingThree">
        <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            {{ __('messages.FAQ_QUEST_3') }}
        </button>
      </h2>
      <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
            <p><a style="text-decoration: underline">{{ __('messages.FAQ_ANSWER_3_1') }}</a> {{ __('messages.FAQ_ANSWER_3_1_1') }}</p>
            <p><a style="text-decoration: underline">{{ __('messages.FAQ_ANSWER_3_2') }}</a> {{ __('messages.FAQ_ANSWER_3_2_1') }}</p>
            <p><a style="text-decoration: underline">{{ __('messages.FAQ_ANSWER_3_3') }}</a> {{ __('messages.FAQ_ANSWER_3_3_1') }}</p>
            <p><a style="text-decoration: underline">{{ __('messages.FAQ_ANSWER_3_5') }}</a> {{ __('messages.FAQ_ANSWER_3_5_1') }}</p>
            <p><a style="text-decoration: underline">{{ __('messages.FAQ_ANSWER_3_6') }}</a> {{ __('messages.FAQ_ANSWER_3_6_1') }}</p>
            <p><a style="text-decoration: underline">{{ __('messages.FAQ_ANSWER_3_7') }}</a> {{ __('messages.FAQ_ANSWER_3_7_1') }}</p>
            <p><a style="text-decoration: underline">{{ __('messages.FAQ_ANSWER_3_8') }}</a> {{ __('messages.FAQ_ANSWER_3_8_1') }}</p>
            <p><a style="text-decoration: underline">{{ __('messages.FAQ_ANSWER_3_9') }}</a> {{ __('messages.FAQ_ANSWER_3_9_1') }}</p>
        </div>
      </div>
    </div>
  </div>
