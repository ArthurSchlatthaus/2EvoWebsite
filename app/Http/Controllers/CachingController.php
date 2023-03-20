<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Guild;
use App\Models\GuildMember;
use App\Models\ItemRefine;
use App\Models\MiniMe;
use App\Models\News;
use App\Models\Player;
use Carbon\Carbon;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CachingController extends Controller
{
    public static function getPlayerOnline($time)
    {
        $all = Cache::get('ranking_all');
        $counter = 0;
        foreach ($all as $player) {
            $last_play = $player->last_play;
            $date = Carbon::parse($last_play);
            $diffDays = $date->diffInDays(Carbon::now());
            $diffMin = $date->diffInMinutes(Carbon::now());
            if ($diffDays < 1) {
                if ($diffMin < $time)
                    $counter = $counter + 1;
            }
        }
        return $counter;
    }

    public static function getPlayerOnlineReal()
    {
        $all = Cache::get('ranking_all');
        $counter = 0;
        foreach ($all as $player) {
            if ($player->is_online)
                $counter = $counter + 1;
        }
        return $counter;
    }

    public static function refreshStatistics()
    {
        Cache::put('ranking_all', Player::get()->all(), 3600);
        $Statistic = [
            'accounts' => Account::get()->count(),
            'add_24h' => CachingController::getPlayerOnline(1440),
            'add_15m' => CachingController::getPlayerOnlineReal(),
            'chars' => Player::get()->count(),
            'guild' => Guild::get()->count(),
        ];
        Cache::put('statistic', $Statistic, 3600);
        Cache::put('player_online_30', CachingController::getPlayerOnline(30), 3600);
        $ranking_guild = Guild::get()->all();
        foreach ($ranking_guild as &$row) {
            $row = Player::getEmpire($row);
        }
        Cache::put('ranking_guild', $ranking_guild, 3600);
        $ranking_top_10_player = Player::where('name', 'not like', '[%')->orderBy('level', 'DESC')->limit(10)->get()->all();
        foreach ($ranking_top_10_player as &$row) {
            $row = Player::getEmpire($row);
        }
        Cache::put('ranking_top10', $ranking_top_10_player, 3600);
       /* $news_all = News::limit(4)->get()->all();
        foreach ($news_all as &$row) {
            $row->date = Carbon::parse($row->date)->format('d M');
        }
        Cache::put('news_all', $news_all, 3600);

        $news_event = News::where('type', 'Events')->limit(4)->get()->all();
        foreach ($news_event as &$row) {
            $row->date = Carbon::parse($row->date)->format('d M');
        }
        Cache::put('news_event', $news_event, 3600);

        $news_server = News::where('type', 'Server')->limit(4)->get()->all();
        foreach ($news_server as &$row) {
            $row->date = Carbon::parse($row->date)->format('d M');
        }
        Cache::put('news_server', $news_server, 3600);*/

    }

    public static function refreshRanking()
    {
        $ranking_top3 = Player::where('name', 'not like', '[%')->orderBy('level', 'DESC')->orderBy('exp', 'DESC')->limit(3)->get()->all();
        $ranking_top3_guild = Guild::where('master', 'not like', '[%')->orderBy('level', 'DESC')->orderBy('exp', 'DESC')->limit(3)->get()->all();
        $ranking_top3_minime = MiniMe::orderBy('level', 'DESC')->whereHas('items')->limit(3)->get()->all();
        $ranking_all_no_team = Player::where('name', 'not like', '[%')->orderBy('level', 'DESC')->orderBy('exp', 'DESC')->get()->all();
        $ranking_all_guild = Guild::where('master', 'not like', '[%')->orderBy('level', 'DESC')->orderBy('exp', 'DESC')->get()->all();
        $ranking_all_minime = MiniMe::orderBy('level', 'DESC')->whereHas('items')->get()->all();


        foreach ($ranking_all_minime as &$row) {
            $row->owner = \App\Models\Player::find(\App\Models\Item::find($row->id)->owner_id)->name;
        }

        foreach ($ranking_all_no_team as &$row) {
            $row->playtime = intdiv($row->playtime, 60) . 'h ' . ($row->playtime % 60) . 'm';
            if (Player::find($row->id)->guildid) {
                $guild = Player::find($row->id)->guildid;
                $row->guild_name = Guild::find($guild->guild_id)->name;
            }
            $row = Player::getEmpire($row);
        }
        foreach ($ranking_all_guild as &$row) {
            $members = GuildMember::where('guild_id', $row->id)->get()->count();
            $row->member = $members;
            $row = Player::getEmpire($row);
        }
        Cache::put('ranking_top3', $ranking_top3, 3600);
        Cache::put('ranking_top3_guild', $ranking_top3_guild, 3600);
        Cache::put('ranking_top3_minime', $ranking_top3_minime, 3600);
        Cache::put('ranking_all_no_team', $ranking_all_no_team, 3600);
        Cache::put('ranking_all_guild', $ranking_all_guild, 3600);
        Cache::put('ranking_all_minime', $ranking_all_minime, 3600);
    }
}
