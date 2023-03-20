<div style="padding-bottom: 50px;display: flex;flex-direction: column;justify-content: center;align-items: center" id="news">
    <div id="news-header"></div>
    <div>
        <button id="all">Alle</button>
        <button id="server">Server</button>
        <button id="event">Events</button>
    </div>
    @if(!empty($news_all))
    <div class="grid2x2" id="all_news">
        @foreach($news_all as $message)
            <div class="row">
                <div class="col-md-6" style="display: flex;">
                    <div
                        style="color: wheat;margin-left: 8px;margin-top: 25px;font-size: 15pt;width:20px">{{$message->date}}</div>
                    <div>
                        <div
                            style="background-color: darkred; width: 60px;color: white;margin-left: 80px;padding-left: 2px;margin-top: 20px">{{$message->type}}</div>
                        <div
                            style="overflow:hidden;color: #b7934c;margin-left: 80px;margin-top: 10px;font-size: 20pt">{{$message->text}}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
    @if(!empty($news_server))
    <div class="grid2x2" id="server_news">
        @foreach($news_server as $message)
            <div class="row">
                <div class="col-md-6" style="display: flex;">
                    <div
                        style="color: wheat;margin-left: 8px;margin-top: 25px;font-size: 15pt;width:20px">{{$message->date}}</div>
                    <div>
                        <div
                            style="background-color: darkred; width: 60px;color: white;margin-left: 80px;padding-left: 2px;margin-top: 20px">{{$message->type}}</div>
                        <div
                            style="overflow:hidden;color: #b7934c;margin-left: 80px;margin-top: 10px;font-size: 20pt">{{$message->text}}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
    @if(!empty($news_event))
    <div class="grid2x2" id="event_news">
        @foreach($news_event as $message)
            <div class="row">
                <div class="col-md-6" style="display: flex;">
                    <div
                        style="color: wheat;margin-left: 8px;margin-top: 25px;font-size: 15pt;width:20px">{{$message->date}}</div>
                    <div>
                        <div
                            style="background-color: darkred; width: 60px;color: white;margin-left: 80px;padding-left: 2px;margin-top: 20px">{{$message->type}}</div>
                        <div
                            style="overflow:hidden;color: #b7934c;margin-left: 80px;margin-top: 10px;font-size: 20pt">{{$message->text}}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
</div>
<style>
    #news-header {
        background-image: url("images/news/news.png");
        width: 270px;
        height: 89px;
        margin: 0 auto 30px auto;
    }

    .col-md-6 {
        height: 170px;
        width: 585px;
        background-image: url("images/news/background.png");
        margin: 10px 10px 10px 10px;
        padding: 10px 10px 10px 10px;
    }

    button {
        padding-left: 20px;
        padding-right: 20px;
        border: none;
        background: none;
        color: wheat;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin: 4px 2px;
        cursor: pointer;
        font-size: 20px;
    }

    .grid2x2 {
        min-height: 100%;
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
    }

    .grid2x2 > div {
        display: flex;
        flex-basis: calc(50%);
        flex-direction: column;
        padding-left: 40px;
    }
    @media (max-width: 650px) {
        #news {
            display: none !important;
        }
    }
</style>
<script>
    $(document).ready(function () {
        $('#all_news').show()
        $('#server_news').hide()
        $('#event_news').hide()
    });
    $('#all').click(function () {
        $('#all_news').show()
        $('#server_news').hide()
        $('#event_news').hide()
    });
    $('#server').click(function () {
        $('#all_news').hide()
        $('#server_news').show()
        $('#event_news').hide()
    });
    $('#event').click(function () {
        $('#all_news').hide()
        $('#server_news').hide()
        $('#event_news').show()
    });
</script>
