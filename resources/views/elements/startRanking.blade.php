<div id="rankContainer" >
    <div id="ranking-header"></div>
    <div style="display: flex;flex-direction: row;justify-content: center;align-items: center">
        <div style="align-self: flex-start;display: flex;flex-direction: column;justify-content: center;align-items: center">
            <h4 style="color: #a5722c">{{ __('messages.player') }}</h4>
            <div class="table-responsive">
                <div id="ranking" class="table">
                    @if(!empty($ranking_top10) and isset($ranking_top10))
                        <div class="table-row headline">
                            <div class="table-cell rank">#</div>
                            <div class="table-cell name">{{ __('messages.name') }}</div>
                            <div class="table-cell">{{ __('messages.level') }}</div>
                            <div class="table-cell empire">{{ __('messages.empire') }}</div>
                        </div>

                        @foreach ($ranking_top10 as $id => $row)
                            <div class="table-row">
                                <div class="table-cell rank">{{ $id+1 }}</div>
                                <div class="table-cell">{{ $row->name }}</div>
                                <div class="table-cell">{{ $row->level }}</div>
                                <div class="cell empire">
                                    <div class="flag flag_{{ $row->empire }}"></div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div style="align-self: flex-start;display: flex;flex-direction: column;justify-content: center;align-items: center">
            <h4 style="color: #a5722c">{{ __('messages.guild') }}</h4>
            <div class="table-responsive" style="padding-left: 100px">
                <div id="ranking" class="table">
                    @if(!empty($ranking_guild) and isset($ranking_guild))
                        <div class="table-row headline">
                            <div class="table-cell rank">#</div>
                            <div class="table-cell name">{{ __('messages.guild') }}</div>
                            <div class="table-cell name">{{ __('messages.leader') }}</div>
                            <div class="table-cell">{{ __('messages.level') }}</div>
                            <div class="table-cell empire">{{ __('messages.empire') }}</div>
                        </div>

                        @foreach ($ranking_guild as $id => $row)
                            <div class="table-row">
                                <div class="table-cell rank">{{ $id+1 }}</div>
                                <div class="table-cell">{{ $row->name }}</div>
                                <div class="table-cell">{{ App\Models\Player::find($row->master)->name }}</div>
                                <div class="table-cell">{{ $row->level }}</div>
                                <div class="cell empire">
                                    <div class="flag flag_{{ $row->empire }}"></div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

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
    .table-row { display: table-row; font-size: 16px; }
    @media (max-width: 700px) {
        #rankContainer {
            display: none;
        }
    }
</style>
