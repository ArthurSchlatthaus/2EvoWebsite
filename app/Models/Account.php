<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;


class Account extends Authenticatable
{
    use HasFactory;

    protected $connection = "2evo_account";
    protected $table = 'account';
    public $timestamps = false;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->connection = env('DB_DATABASE_ACCOUNT');
    }

    protected $fillable = [
        'login', 'email', 'password', 'social_id',
    ];

    protected $hidden = [
        'password', /* 'google2fa_secret',*/
    ];

    public function setGoogle2faSecretAttribute($value)
    {
        $this->attributes['google2fa_secret'] = encrypt($value);
    }

    public function getGoogle2faSecretAttribute($value)
    {
        return decrypt($value);
    }

    public function setPasswordAttribute($password)
    {
        $sha1_stage1 = sha1($password, true);
        $output = sha1($sha1_stage1);
        $this->attributes['password'] = "*" . strtoupper($output);
    }

    public static function mysql_password_hash($input, $hex = true)
    {
        $sha1_stage1 = sha1($input, true);
        $output = sha1($sha1_stage1, !$hex);
        return "*" . strtoupper($output);
    }

    public static function IsAdmin($id)
    {
        $GM_LIST = Cache::get('gmlist');
        while ($GM_LIST === null)
            self::CacheGmlist();

        if ($GM_LIST->contains('mID', $id) && $GM_LIST->firstWhere('mID', $id)->mAuthority == "IMPLEMENTOR")
            return True;

        return False;
    }
}
