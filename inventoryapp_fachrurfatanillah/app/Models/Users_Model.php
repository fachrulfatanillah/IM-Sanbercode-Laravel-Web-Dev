<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Users_Model extends Authenticatable
{

    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'uuid',
        'username',
        'email',
        'password',
        'status',
        'create_At',
        'update_At',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'create_at' => 'datetime',
        'update_at' => 'datetime',
    ];

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
            $model->create_at = now();
            $model->update_at = now();
        });

        static::updating(function ($model) {
            $model->update_at = now();
        });
    }

    public function profile()
    {
        return $this->hasOne(Profile_Model::class, 'users_id');
    }
}
