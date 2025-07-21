<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const TABLE_NAME = 'tasks';
    const ID = 'id';
    const TITLE = 'title';
    const DURATION = 'duration';
    const REMARK = 'remark';
    const PROJECT = 'project_id'; //project_id
    const CREATED_BY = 'created_by';
    const MODIFY_BY = 'modify_by';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const STATUS = 'status_id';

    protected $fillable = [
        self::TITLE,
        self::DURATION,
        self::REMARK,
        self::PROJECT,
        self::STATUS,
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
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class,'status_id');
    }
}
