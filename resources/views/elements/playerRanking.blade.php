
    <div id="ranking-header" style="margin-top: 40px"></div>
    <div id="top_3">
        @if(!empty($ranking_top3) and isset($ranking_top3))
            @if(!empty($ranking_top3[0]))
                <div id="rank_1" class="rank"><div class="text">1 <span>{{ $ranking_top3[0]->name }}</span></div></div>
            @endif
            @if(!empty($ranking_top3[1]))
                <div id="rank_2" class="rank"><div class="text">2 <span>{{ $ranking_top3[1]->name }}</span></div></div>
            @endif
            @if(!empty($ranking_top3[2]))
                <div id="rank_3" class="rank"><div class="text">3 <span>{{ $ranking_top3[2]->name }}</span></div></div>
            @endif
        @endif
    </div>
    <div class="table-responsive">
        <div id="ranking" class="table">
            @if(!empty($ranking_all_no_team) and isset($ranking_all_no_team))
                <div class="table-row headline">
                    <div class="table-cell rank">#</div>
                    <div class="table-cell name">{{ __('messages.name') }}</div>
                    <div class="table-cell">{{ __('messages.level') }}</div>
                    <div class="table-cell">{{ __('messages.race') }}</div>
                    <div class="table-cell">{{ __('messages.job') }}</div>
                    <div class="table-cell guild">{{ __('messages.guild') }}</div>
                    <div class="table-cell">{{ __('messages.exp') }}</div>
                    <div class="table-cell">{{ __('messages.playtime') }}</div>
                    <div class="table-cell empire">{{ __('messages.empire') }}</div>
                </div>
                @foreach ($ranking_all_no_team as $id => $row)
                    <div class="table-row">
                        <div class="table-cell rank">{{ $id+1 }}</div>
                        <div class="table-cell">{{ $row->name }}</div>
                        <div class="table-cell">{{ $row->level }}</div>
                        <div class="table-cell">{{ $row->job_name }}</div>
                        <div class="table-cell">{{ $row->skill_group_name }}</div>
                        <div class="table-cell">{{ $row->guild_name }}</div>
                        <div class="table-cell">{{ $row->exp}}</div>
                        <div class="table-cell">{{ $row->playtime}}</div>
                        <div class="cell empire">
                            <div class="flag flag_{{ $row->empire }}"></div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>


<style>
    #ranking-header { background-image: url("images/ranking/ranking.png"); width: 340px; height: 69px; margin: 0 auto 30px auto; }
    .empire .flag   { width: 28px; height: 17px; margin: 2.5px auto -2.5px auto }
    .empire .flag_1	{ background-image: url("images/ranking/rotes-reich.png"); }
    .empire .flag_2	{ background-image: url("images/ranking/gelbes-reich.png"); }
    .empire .flag_3	{ background-image: url("images/ranking/blaues-reich.png"); }
    .empire .flag_none	{ background-image: url("images/ranking/none-reich.png"); }
    .table { margin-bottom: 6rem; width: 100%; }
    .headline .empire	{ text-align:center; }
    .table-cell.rank { padding-left: 15px; width: 55px; }
    .table-cell.name, .table-cell.guild { width: 200px; }
    .table { display: table; color: lightgoldenrodyellow; max-width: 1100px; margin-left: auto; margin-right: auto; }
    .table-cell { display: table-cell; text-align: left; padding: 2px 10px 2px 10px; }
    .table-row.headline { color:#6f6f6f; font-size: 14px; font-weight: bold; }
    .table-row:nth-child(even) { background-color: #ffffff1c; }
    .table-row { display: table-row; font-size: 16px; }
    #top_3 .rank { height: 163px; width: 172px; margin: 0 60px 0 60px; display: flex; align-items: center; justify-content: center;}
    #top_3 .text { color: #b7934c; text-align: center; font-size: 40px; font-weight: bold; line-height: 40px; }
    #top_3 { display: flex; justify-content: center; margin: 45px auto 45px auto; }
    #top_3 .text span { display: block; color: lightgoldenrodyellow; font-size: 16px; font-weight: normal; }
    #top_3 #rank_1 { background-image: url("images/ranking/rank_1.png"); }
    #top_3 #rank_2 { background-image: url("images/ranking/rank_2.png"); }
    #top_3 #rank_3 { background-image: url("images/ranking/rank_3.png"); }
    @media (max-width: 1047px) {
        #top_3 {
            flex-direction: column;
            padding-left: 35px;
        }
    }
    @media (max-width: 700px) {
        .table {
            display: none;
        }
    }
</style>

