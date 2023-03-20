<div id="FullRanking">
    <div id="ranking-header"></div>
    <div id="top_3">
        @if(!empty($ranking_top3))
            @if(!empty($ranking_top3[0]))
                <div id="rank_1" class="rank">
                    <div class="text">1 <span>{{ $ranking_top3[0]->name }}</span></div>
                </div>
            @endif
            @if(!empty($ranking_top3[1]))
                <div id="rank_2" class="rank">
                    <div class="text">2 <span>{{ $ranking_top3[1]->name }}</span></div>
                </div>
            @endif
            @if(!empty($ranking_top3[2]))
                <div id="rank_3" class="rank">
                    <div class="text">3 <span>{{ $ranking_top3[2]->name }}</span></div>
                </div>
            @endif
        @endif
    </div>
    <div class="table-responsive">
        <div id="ranking" class="table">
            @if(!empty($ranking_all_minime))
                <div class="table-row headline">
                    <div class="table-cell rank">#</div>
                    <div class="table-cell name">{{ __('messages.name') }}</div>
                    <div class="table-cell">{{ __('messages.level') }}</div>
                    <div class="table-cell">{{ __('messages.evo') }}</div>
                    <div class="table-cell">{{ __('messages.owner') }}</div>
                    <div class="table-cell">{{ __('messages.body') }}</div>
                    <div class="table-cell">{{ __('messages.weapon') }}</div>
                </div>

                @foreach ($ranking_all_minime as $id => $row)
                    <div class="table-row">
                        <div class="table-cell rank">{{ $id+1 }}</div>
                        <div class="table-cell">{{ $row->name }}</div>
                        <div class="table-cell">{{ $row->level }}</div>
                        <div class="table-cell">{{ $row->evo }}</div>
                        <div class="table-cell">{{ $row->owner}}</div>
                        <?php
                        $weapon=\App\Models\ItemProto::where('vnum',$row->weapon)->get()->first();
                        if($weapon!=null and $weapon->type==39 and $weapon->subtype >= 2)
                            $weapon=$weapon->value3;
                        elseif($weapon!=null and $weapon->type != 1)
                            $weapon=0;
                        else
                            $weapon=$row->weapon;
                        $weapon = substr_replace($weapon, '0', -1, 1);
                        ?>
                        @if (file_exists(public_path('images/proto/'.substr_replace($row->body, '0', -1, 1).'.png')) and $row->body!=0)
                            <div class="table-cell"><img
                                    src="{{ asset('images/proto/'.substr_replace($row->body, '0', -1, 1).'.png') }}"
                                    style="width: 40px" class="image"></div>
                        @elseif (file_exists(public_path('images/proto/'.substr_replace($row->body, '0', -1, 1).'.tga')) and $row->body!=0)
                            <div class="table-cell"><img
                                    src="{{ asset('images/proto/'.substr_replace($row->body, '0', -1, 1).'.tga') }}"
                                    style="width: 40px" class="image"></div>
                        @else
                            <div class="table-cell"><img src="{{ asset('images/proto/red_cross.png')}}"
                                                         style="width: 40px" class="image"></div>
                        @endif
                        @if (file_exists(public_path('images/proto/'.$weapon.'.png')) and $weapon!=0)
                            <div class="table-cell"><img
                                    src="{{ asset('images/proto/'.$weapon.'.png') }}"
                                    style="width: 40px" class="image"></div>
                        @elseif (file_exists(public_path('images/proto/'.$weapon.'.tga')) and $weapon!=0)
                            <div class="table-cell"><img
                                    src="{{ asset('images/proto/'.$weapon.'.tga') }}"
                                    style="width: 40px" class="image"></div>
                        @else
                            <div class="table-cell"><img src="{{ asset('images/proto/red_cross.png')}}"
                                                         style="width: 40px" class="image"></div>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<style>
    #ranking-header {
        background-image: url("images/ranking/ranking.png");
        width: 340px;
        height: 69px;
        margin: 0 auto 30px auto;
    }

    .table {
        margin-bottom: 6rem;
        width: 100%;
    }

    .headline .empire {
        text-align: center;
    }

    .table-cell.rank {
        padding-left: 15px;
        width: 55px;
    }

    .table-cell.name, .table-cell.guild {
        width: 200px;
    }

    .table {
        display: table;
        color: lightgoldenrodyellow;
        max-width: 1100px;
        margin-left: auto;
        margin-right: auto;
    }

    .table-cell {
        display: table-cell;
        text-align: left;
        padding: 2px 10px 2px 10px;
    }

    .table-row.headline {
        color: #6f6f6f;
        font-size: 14px;
        font-weight: bold;
    }

    .table-row:nth-child(even) {
        background-color: #ffffff1c;
    }

    .table-row {
        display: table-row;
        font-size: 16px;
    }

    #top_3 .rank {
        height: 163px;
        width: 172px;
        margin: 0 60px 0 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #top_3 .text {
        color: #b7934c;
        text-align: center;
        font-size: 40px;
        font-weight: bold;
        line-height: 40px;
    }

    #top_3 {
        display: flex;
        justify-content: center;
        margin: 45px auto 45px auto;
    }

    #top_3 .text span {
        display: block;
        color: lightgoldenrodyellow;
        font-size: 16px;
        font-weight: normal;
    }

    #top_3 #rank_1 {
        background-image: url("images/ranking/rank_1.png");
    }

    #top_3 #rank_2 {
        background-image: url("images/ranking/rank_2.png");
    }

    #top_3 #rank_3 {
        background-image: url("images/ranking/rank_3.png");
    }

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
