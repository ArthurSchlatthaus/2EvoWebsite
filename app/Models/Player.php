<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $connection;
    protected $table = 'player';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->connection = env('DB_DATABASE_PLAYER');
    }

    public function gmlist()
    {
        return $this->belongsTo('App\Models\Gmlist', 'mName', 'name');
    }

    public function guildid()
    {
        return $this->hasOne(GuildMember::class, 'pid', 'id');
    }

    public static function getEmpire($row)
    {
        if (Player::find($row->id) == null) {
            $row->id = $row->master;
        }
        if (Player::find($row->id)->playerIndex1) {
            $row->empire = Player::find($row->id)->playerIndex1->empire;
        } elseif (Player::find($row->id)->playerIndex2) {
            $row->empire = Player::find($row->id)->playerIndex2->empire;
        } elseif (Player::find($row->id)->playerIndex3) {
            $row->empire = Player::find($row->id)->playerIndex3->empire;
        } elseif (Player::find($row->id)->playerIndex4) {
            $row->empire = Player::find($row->id)->playerIndex4->empire;
        } /*elseif (Player::find($row->id)->playerIndex5) {
            $row->empire = Player::find($row->id)->playerIndex5->empire;
        }*/
        return $row;
    }

    public function playerIndex1()
    {
        return $this->hasOne(PlayerIndex::class, 'pid1', 'id');
    }

    public function playerIndex2()
    {
        return $this->hasOne(PlayerIndex::class, 'pid2', 'id');
    }

    public function playerIndex3()
    {
        return $this->hasOne(PlayerIndex::class, 'pid3', 'id');
    }

    public function playerIndex4()
    {
        return $this->hasOne(PlayerIndex::class, 'pid4', 'id');
    }

    public function playerIndex5()
    {
        return $this->hasOne(PlayerIndex::class, 'pid5', 'id');
    }
}
