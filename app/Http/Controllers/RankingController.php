<?php

namespace App\Http\Controllers;

use App\Models\Gmlist;
use App\Models\Guild;
use App\Models\GuildMember;
use App\Models\MiniMe;
use App\Models\Player;
use App\Models\PlayerIndex;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class RankingController extends Controller
{

    public function getDataPlayer()
    {
        $ranking_top3 = Cache::get('ranking_top3');
        $ranking_all_no_team = $this->getRankingAllNoTeam();
        if (isset($ranking_top3) and !empty($ranking_top3)) {
            return view('welcome', [
                'ranking_page_player' => true,
                'ranking_top3' => $ranking_top3,
                'ranking_all_no_team' => $ranking_all_no_team,
            ]);
        } else {
            return view('welcome', [
                'ranking_page_player' => true,
                'ranking_top3' => "",
                'ranking_all_no_team' => "",
            ]);
        }

    }

    public function getDataGuild()
    {
        $ranking_top3 = Cache::get('ranking_top3_guild');

        $ranking_all_guild = Cache::get('ranking_all_guild');
        return view('welcome', [
            'ranking_page_guild' => true,
            'ranking_top3' => $ranking_top3,
            'ranking_all_guild' => $ranking_all_guild,
        ]);
    }

    public function getDataMinime()
    {
        $ranking_top3 = Cache::get('ranking_top3_minime');
        $ranking_all_minime = Cache::get('ranking_all_minime');

        return view('welcome', [
            'ranking_page_minime' => true,
            'ranking_top3' => $ranking_top3,
            'ranking_all_minime' => $ranking_all_minime,
        ]);
    }

    public static function getRankingAllNoTeam()
    {
        $ranking_all_no_team = Cache::get('ranking_all_no_team');
        if (!empty($ranking_all_no_team and isset($ranking_all_no_team))) {
            foreach ($ranking_all_no_team as &$row) {
                if (App::isLocale('de')) {
                    $job = array(
                        0 => array('Krieger', array('', 'Körper', 'Mental')),
                        1 => array('Ninja', array('', 'Klinge', 'Bogen')),
                        2 => array('Sura', array('', 'Waffen', 'Magie')),
                        3 => array('Schamane', array('', 'Drachenmacht', 'Heilung')),
                        4 => array('Krieger', array('', 'Körper', 'Mental')),
                        5 => array('Ninja', array('', 'Klinge', 'Bogen')),
                        6 => array('Sura', array('', 'Waffen', 'Magie')),
                        7 => array('Schamane', array('', 'Drachenmacht', 'Heilung'))
                    );
                } else {
                    $job = array(
                        0 => array('Warrior', array('', 'Body', 'Mental')),
                        1 => array('Ninja', array('', 'Blade', 'Bow')),
                        2 => array('Sura', array('', 'Weapon', 'Magic')),
                        3 => array('Schaman', array('', 'Dragon', 'Heal')),
                        4 => array('Warrior', array('', 'Body', 'Mental')),
                        5 => array('Ninja', array('', 'Blade', 'Bow')),
                        6 => array('Sura', array('', 'Weapon', 'Magic')),
                        7 => array('Schaman', array('', 'Dragon', 'Heal'))
                    );
                }
                $row->skill_group_name = $job[$row->job][1][$row->skill_group];
                $row->job_name = $job[$row->job][0];
            }
        }
        return $ranking_all_no_team;
    }
}
