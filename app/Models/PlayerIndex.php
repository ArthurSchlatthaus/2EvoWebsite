<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerIndex extends Model
{
    protected $connection;
    protected $table = 'player_index';
    public $timestamps = false;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->connection = env('DB_DATABASE_PLAYER');
    }

}
