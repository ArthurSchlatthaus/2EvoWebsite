<?php

namespace App\Http\Controllers;

use App\Models\Gmlist;
use App\Models\ItemProto;
use App\Models\ItemRefine;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProtoController extends Controller
{


    public static function readmobDrop($mode)
    {
        $bossList = [
            591, 691, 692, 693, 791, 792, 793, 794, 795, 796, 993, 1091, 1092, 1093, 1094, 1095, 1096, 1191, 1192, 1304, 1306, 1307, 1308, 1309, 1310,
            1334, 1901, 1902, 1903, 1904, 1905, 1906, 2091, 2092, 2093, 2094, 2095, 2191, 2192, 2206, 2207, 2291, 2306, 2307, 2492,
            2493, 2495, 2597, 2598, 3090, 3091, 3190, 3191, 3290, 3291, 3390, 3391, 3490, 3491, 3590, 3591, 3595, 3596, 3690, 3691, 3790, 3791, 3890, 3891, 3901, 3902, 3903, 3905, 3906, 3910, 3911, 3912, 3913, 5001,
            5002, 5161, 5162, 5163, 6091, 6116, 6118, 6151, 6191, 6192, 6193, 6391, 6392, 6393, 6394, 6405, 6407, 6408, 6415, 6416, 6417, 6418, 6419, 6420,
        ];
        $a = [];
        $full = [];
        $handle = fopen("mob_drop_item.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                array_push($a, $line);
                if (str_contains($line, '}')) {
                    array_push($full, $a);
                    $a = [];
                }
            }
            fclose($handle);
        } else {
            return [];
        }

        foreach ($full as &$item) {
            for ($i = 0; $i < sizeof($item); $i++) {
                if ($item[$i] == "\n")
                    array_shift($item);
            }
        }
        $mobs = [];
        foreach ($full as &$item) {
            $tmp = [];
            $arr = explode("\t", $item[2]);
            try {
                $vnum = trim($arr[2]);
            } catch (Exception $e) {
                continue;
            }
            if ($mode == 0 and (intval($vnum) >= 8000 and intval($vnum) <= 8200)) {
                array_push($tmp, $vnum);
                for ($i = 4; $i < sizeof($item) - 1; $i++) {
                    $arr = explode("\t", trim($item[$i]));
                    try {
                        $vnum = trim($arr[1]);
                    } catch (Exception $e) {
                        $vnum = 0;
                    }
                    array_push($tmp, $vnum);
                }
                array_push($mobs, $tmp);
            } elseif ($mode == 1 and !in_array(intval($vnum), $bossList) and intval($vnum) <= 8000) {
                array_push($tmp, $vnum);
                for ($i = 4; $i < sizeof($item) - 1; $i++) {
                    $arr = explode("\t", trim($item[$i]));
                    try {
                        $vnum = trim($arr[1]);
                    } catch (Exception $e) {
                        $vnum = 0;
                    }
                    array_push($tmp, $vnum);
                }
                array_push($mobs, $tmp);
            } elseif ($mode == 2 and in_array(intval($vnum), $bossList) and intval($vnum) <= 8000) {
                array_push($tmp, $vnum);
                for ($i = 4; $i < sizeof($item) - 1; $i++) {
                    $arr = explode("\t", trim($item[$i]));
                    try {
                        $vnum = trim($arr[1]);
                    } catch (Exception $e) {
                        $vnum = 0;
                    }
                    array_push($tmp, $vnum);
                }
                array_push($mobs, $tmp);
            }
        }
        return $mobs;
    }

    static public function readJSON($langCode, $vnum)
    {
        if ($langCode == 1) {
            if (empty(config('app.itemNamesDe'))) {
                config(['app.itemNamesDe' => json_decode(file_get_contents('itemNamesDe.json'), true)]);
            }

            if (isset(config('app.itemNamesDe')[$vnum]))
                return config('app.itemNamesDe')[$vnum];
            return "unbekannt";
        } else {
            if (empty(config('app.itemNamesEn'))) {
                config(['app.itemNamesEn' => json_decode(file_get_contents('itemNamesEn.json'), true)]);
            }
            if (isset(config('app.itemNamesEn')[$vnum]))
                return config('app.itemNamesEn')[$vnum];
            else
                return "unknown";
        }
    }

    static public function readMOBJSON($langCode, $vnum)
    {
        if ($langCode == 1) {
            if (empty(config('app.mobNamesDe'))) {
                config(['app.mobNamesDe' => json_decode(file_get_contents('mobNamesDe.json'), true)]);
            }

            if (isset(config('app.mobNamesDe')[$vnum]))
                return config('app.mobNamesDe')[$vnum];
            return "unbekannt";
        } else {
            if (empty(config('app.mobNamesEn'))) {
                config(['app.mobNamesEn' => json_decode(file_get_contents('mobNamesEn.json'), true)]);
            }
            if (isset(config('app.mobNamesEn')[$vnum]))
                return config('app.mobNamesEn')[$vnum];
            else
                return "unknown";
        }
    }

    static public function readItemDesc($langCode, $vnum)
    {
        if ($langCode == 1) {
            if (empty(config('app.itemdescDe'))) {
                if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
                    config(['app.itemdescDe' => json_decode(file_get_contents('itemdescDe.json'), true)]);
                else
                    config(['app.itemdescDe' => json_decode(file_get_contents('itemdescDe.json'), true)]);
            }
            if (isset(config('app.itemdescDe')[$vnum]))
                return config('app.itemdescDe')[$vnum];
            return "unbekannt";
        } else {
            if (empty(config('app.itemdescEn'))) {
                if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
                    config(['app.itemdescEn' => json_decode(file_get_contents('itemdescEn.json'), true)]);
                else
                    config(['app.itemdescEn' => json_decode(file_get_contents('itemdescEn.json'), true)]);
            }
            if (isset(config('app.itemdescEn')[$vnum]))
                return config('app.itemdescEn')[$vnum];
            else
                return "unknown";
        }
    }

    public function getProto($type, $subtype, $race = 0)
    {
        if ($race == 1) {
            $data = ItemRefine::where('type', $type)->where('subtype', $subtype)->where('antiflag', 294968)->get();
        } elseif ($race == 2) {
            $data = ItemRefine::where('type', $type)->where('subtype', $subtype)->where('antiflag', 294964)->get();
        } elseif ($race == 3) {
            $data = ItemRefine::where('type', $type)->where('subtype', $subtype)->where('antiflag', 294956)->get();
        } elseif ($race == 4) {
            $data = ItemRefine::where('type', $type)->where('subtype', $subtype)->where('antiflag', 294940)->get();
        } else {
            $data = ItemRefine::where('type', $type)->where('subtype', $subtype)->get();
        }

        return view('welcome', [
            'proto' => true,
            'ProtoData' => (object)$data,
        ]);
    }

    public function getProtoAll($type, $subtype, $race = 0)
    {
        if ($race == 1) {
            $data = ItemProto::where('type', $type)->where('subtype', $subtype)->where('antiflag', 294968)->get();
        } elseif ($race == 2) {
            $data = ItemProto::where('type', $type)->where('subtype', $subtype)->where('antiflag', 294964)->get();
        } elseif ($race == 3) {
            $data = ItemProto::where('type', $type)->where('subtype', $subtype)->where('antiflag', 294956)->get();
        } elseif ($race == 4) {
            $data = ItemProto::where('type', $type)->where('subtype', $subtype)->where('antiflag', 294940)->get();
        } else {
            $data = ItemProto::where('type', $type)->where('subtype', $subtype)->get();
        }
        $isGm = false;
        if (auth()->user() and Gmlist::find(auth()->user()->id))
            $isGm = true;
        return view('welcome', [
            'protoAll' => true,
            'ProtoData' => $data,
            'isGm' => $isGm,
        ]);
    }

    public function getDetailView($vnum)
    {
        $data = ItemProto::where('vnum', $vnum)->first();
        $renderData = null;
        if ($data->type == 1)
            $renderData = ['type' => 'WEAPON', 'model' => str_pad($string = substr($data->vnum, 0, -1), 4, '0', STR_PAD_LEFT) . '0'];
        if ($data->type == 2 and $data->subtype == 0)
            $renderData = ['type' => 'ARMOR', 'subtype' => 'ARMOR_BODY', 'value3' => $data->value3, 'sex' => 'false'];
        if ($data->type == 28 and $data->subtype == 0) {
            if ($data->antiflag == 106881)
                $renderData = ['type' => 'ARMOR', 'subtype' => 'COSTUME_BODY', 'value3' => $data->value3, 'sex' => 'true'];
            else
                $renderData = ['type' => 'ARMOR', 'subtype' => 'COSTUME_BODY', 'value3' => $data->value3, 'sex' => 'false'];
        }

        $assassin = 'false';
        $shaman = 'false';
        $sura = 'false';
        $warrior = 'false';
        if ($data->antiflag == 294940)
            $shaman = 'true';
        if ($data->antiflag == 294968)
            $warrior = 'true';
        if ($data->antiflag == 294964)
            $assassin = 'true';
        if ($data->antiflag == 294956)
            $sura = 'true';
        return view('welcome', [
            'detailView' => true,
            'ProtoData' => $data,
            'renderData' => $renderData,
            'assassin' => $assassin,
            'shaman' => $shaman,
            'sura' => $sura,
            'warrior' => $warrior,
        ]);
    }

    public function getProtoAllName()
    {
        $data = "";
        if (isset(request()->search)) {
            $name = request()->search;
            if (is_string($name)) {
                if (app()->getLocale() == "de")
                    $data = ItemProto::where('locale_name_de', 'like', '%' . $name . '%')->get();
                else
                    $data = ItemProto::where('locale_name_en', 'like', '%' . $name . '%')->get();
            }
        }
        return view('welcome', [
            'protoAll' => true,
            'ProtoData' => $data,
        ]);
    }

    public function getProtoAllVnum()
    {
        $data = "";
        if (isset(request()->search)) {
            $vnum = request()->search;
            if (is_numeric($vnum)) {
                $data = ItemProto::where('vnum', $vnum)->get();
            }
        }
        return view('welcome', [
            'protoAll' => true,
            'ProtoData' => $data,
        ]);
    }

}
