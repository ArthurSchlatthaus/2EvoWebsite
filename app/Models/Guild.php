<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    protected $connection;
    protected $table = 'guild';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->connection = env('DB_DATABASE_PLAYER');
    }
}
