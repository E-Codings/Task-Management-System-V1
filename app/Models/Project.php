<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    const TABLE_NAME = 'projects';
    const ID = 'id';
    const NAME = 'name';
    const REMARK = 'remark';
    const CREATED_BY = 'created_by';
    const MODIFY_BY = 'modify_by';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $fillable = [

        self::NAME,
        self::REMARK,
        self::CREATED_BY,
        self::MODIFY_BY,

    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function modifier()
    {
        return $this->belongsTo(User::class, 'modify_by');
    }
    // public function task()
    // {
    //     return $this->hasMany(Task::class);
    // }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_projects');
    }
}