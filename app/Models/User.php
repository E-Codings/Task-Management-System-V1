<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    const TABLE_NAME = 'users';           // For DB usage like Schema or Eloquent
    const ID = 'id';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const GENDER = 'gender';
    const PROFILE = 'profile';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const USERS = 'users';                // For request form field: <select name="users[]">
    const USERS_DOT_WILDCARD = 'users.*'; // For validation

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        self::FIRST_NAME,
        self::LAST_NAME,
        self::EMAIL,
        self::GENDER,
        self::PROFILE,
        self::PASSWORD,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function fullName(): string
    {
        return ($this->gender == 'Male' ? 'Mr.' : 'Ms.') . $this->first_name . ' ' . $this->lastName;
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'user_projects');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
