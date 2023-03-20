<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gmlist extends Model
{
    protected $connection;
    protected $table = 'gmlist';
    public $timestamps = false;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->connection = env('DB_DATABASE_COMMON');
    }

    public $primaryKey = 'mID';

    /*protected $fillable  = [
        'mAccount',
        'mName',
        'mAuthority',
    ];*/

    public function player()
    {
        return $this->belongsTo('App\Models\Player', 'name', 'mName');
    }
}
