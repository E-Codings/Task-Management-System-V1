<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    const TABLE_NAME = 'roles';
    const NAME = 'name';
    const GUARD_NAME = 'guard_name';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        self::NAME,
        self::GUARD_NAME,
    ];
}
