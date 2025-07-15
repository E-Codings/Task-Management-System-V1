<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    const TABLE = 'systems';
    const ID = 'id';
    const NAME = 'name';
    const PROFILE = 'profile';
    const FAVICON = 'favicon';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        self::NAME,
        self::PROFILE,
        self::FAVICON,
    ];
}
