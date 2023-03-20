<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemRefine extends Model
{
    protected $connection;
    protected $table = 'ItemRefine';

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->connection = env('DB_DATABASE_PLAYER');
    }
}
