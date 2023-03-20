<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiniMe extends Model
{
    use HasFactory;
    protected $connection;
    protected $table = 'minime_system';
    public $timestamps = false;
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->connection = env('DB_DATABASE_PLAYER');
    }
    public function items() {
        return $this->hasOne('App\Models\Item','id','id');
    }
}
