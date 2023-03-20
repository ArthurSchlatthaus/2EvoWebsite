<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $connection;
    protected $table = 'donation';

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->connection = env('DB_DATABASE_COMMON');
    }
}
