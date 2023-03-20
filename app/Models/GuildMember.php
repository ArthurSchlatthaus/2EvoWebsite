<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuildMember extends Model
{
    protected $connection;
    protected $table = 'guild_member';
    public $timestamps = false;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->connection = env('DB_DATABASE_PLAYER');
    }

    public function player()
    {
        return $this->belongsTo(Player::class, 'pid', 'id');
    }

}
