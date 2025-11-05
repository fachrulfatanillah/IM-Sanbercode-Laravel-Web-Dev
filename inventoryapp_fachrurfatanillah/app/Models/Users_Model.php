<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Users_Model extends Model
{
    protected $table = 'Users';
    protected $primaryKey = 'Id';

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

    protected $casts = [
        'create_At' => 'datetime',
        'update_At' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
            $model->Create_At = now();
            $model->Update_At = now();
        });

        static::updating(function ($model) {
            $model->Update_At = now();
        });
    }
}
