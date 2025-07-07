<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    // Table name
    const TABLENAME = 'status';
    // Column names
    const ID = 'id';
    const NAME = 'name';
    const CREATED_BY = 'created_by';
    const MODIFY_BY = 'modify_by';
    const REMARK = 'remark';
    const CREATED_AT = 'created_at';
    const UPDATED_AT  = 'updated_at';

    // this table name
    protected $table = self::TABLENAME;
    // this is PK
    protected $primaryKey = self::ID;
    // Allow mass-assignment
    protected $fillable = ([
        self::NAME,
        self::CREATED_BY,
        self::MODIFY_BY,
        self::REMARK,
        self::CREATED_AT,
        self::UPDATED_AT,
    ]);
}