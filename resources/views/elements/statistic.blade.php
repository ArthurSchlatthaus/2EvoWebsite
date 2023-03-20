<div id="stats-header"></div>
<div id="stats-box" style="position: relative;color: wheat">
    <img src="{{url("images/stats/stats_bg.png")}}" class="img-fluid" alt="Responsive image" style="width: 100%">
    @if(isset($Statistic) and !empty($Statistic))
        <div id="accounts" style="text-align: center">
            <div class="count">{{ $Statistic['accounts'] }}</div>
            <div class="title">{{ __('messages.accounts') }}</div>
        </div>

        <div id="lastday" style="text-align: center">
            <div class="count">{{ $Statistic['add_24h'] }}</div>
            <div class="title">{{ __('messages.player_online_21') }}</div>
        </div>

        <div id="online" style="text-align: center">
            <div class="count">{{ $Statistic['add_15m'] }}</div>
            <div class="title">{{ __('messages.player_online') }}</div>
        </div>

        <div id="chars" style="text-align: center">
            <div class="count">{{ $Statistic['chars'] }}</div>
            <div class="title">{{ __('messages.chars') }}</div>
        </div>

        <div id="guild" style="text-align: center">
            <div class="count">{{ $Statistic['guild'] }}</div>
            <div class="title">{{ __('messages.guilds') }}</div>
        </div>
    @endif
</div>
<div id="onlineMobile" style="display: none;backdrop-filter: blur(2px);font-size: large;padding-bottom: 10px;text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">
    <div style="color: #b7934c; ">Player Online: {{$playerOnlineCounter}}</div>
</div>
<style>
    #stats-header {
        background-image: url("images/stats/stats.png");
        width: 303px;
        height: 68px;
        margin: 0 auto 30px auto;
    }
    #accounts{
        position: absolute;
        left: 15%;
        top: 40%;
        transform: translate(-50%, -50%);
    }
    #lastday{
        position: absolute;
        left: 33%;
        top: 40%;
        transform: translate(-50%, -50%);
    }
    #online{
        color:#b7934c;
        font-size: 50px;
        font-weight: bold;
        position: absolute;
        left: 51%;
        top: 40%;
        transform: translate(-50%, -50%);
    }
    #chars{
        position: absolute;
        left: 66%;
        top: 40%;
        transform: translate(-50%, -50%);
    }
    #guild{
        position: absolute;
        left: 85%;
        top: 40%;
        transform: translate(-50%, -50%);
    }
    #stats-box .count {
        font-size: 30px;
    }
    #stats-box .title {
        font-size: 16px;
    }
    @media (max-width: 1135px) {
        #stats-box .count {
            font-size: 25px;
        }
        #stats-box .title {
            font-size: 10px;
        }
    }
    @media (max-width: 750px) {
        #stats-box .count {
            font-size: 20px;
        }
        #stats-box .title {
            font-size: 8px;
        }
    }
    @media (max-width: 450px) {
        #stats-box{
            display: none;
        }
        #onlineMobile{
            display: block !important;
        }
    }
</style>
