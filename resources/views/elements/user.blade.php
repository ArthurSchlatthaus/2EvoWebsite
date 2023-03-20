<div id="char-slider">
    @foreach ($chars as $id=>$char)
        @if(empty($char))
            <div class="slider-card">
                <div class="inside">
                    <div class="header">
                        <div class="name">Empty</div>
                        <div class="level">Lvl. 0</div>
                        <img src="images/chars/{{ $job_icon[0] }}">
                    </div>

                    <div class="content">
                        {{ __('messages.playtime') }}: 0 <br />
                        {{ __('messages.lastplay') }}: 0 <br />
                    </div>
                </div>
            </div>
        @else
            <div class="slider-card">
                <div class="inside">
                    <div class="header">
                        <div class="name">{{ $char->name }}</div>
                        <div class="level">Lvl. {{ $char->level }}</div>
                        <img src="images/chars/{{ $job_icon[$char->job] }}">
                    </div>
                    <div class="content">
                        {{ __('messages.playtime') }}: {{ $char->playtime }} <br />
                        {{ __('messages.lastplay') }}: {{ $char->last_play }} <br />
                    </div>

                    <div class="footer">
                        <form action="user" method="POST" >
                            @csrf
                            <div style="visibility: hidden">
                                <select name="charachterid" id="charID">
                                    <option value="{{ $char->id }}">{{ $char->name }} </option>
                                </select>
                            </div>
                            <input type="submit" name="submit" value={{ __('messages.unstuck') }} class="btn" style="display:inline;border: solid 2px #a18d73;;color:#a18d73;">
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
<style>

</style>
<script type="text/javascript">
    $(document).ready(function() {
        $("#char-slider").slick({
            slidesToScroll: 1,
            infinite: true,
            slidesToShow: 3,
            centerPadding: '40px',
            variableWidth: true,
            centerMode: true,
            draggable: false,
        });
    });
</script>
<script type="text/javascript" src="slick-slider/slick.min.js" defer></script>
<link rel="stylesheet" href="slick-slider/slick-theme.css">
<link rel="stylesheet" href="slick-slider/slick.css">
<link href="{{ asset('css/user.css') }}" rel="stylesheet">
