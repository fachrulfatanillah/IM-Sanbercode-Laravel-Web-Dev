<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Profile_Model extends Model
{
    use HasFactory;

    protected $table = 'profile';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'users_id',
        'age',
        'bio',
        'create_at',
        'update_at'
    ];

    protected $casts = [
        'create_at' => 'datetime',
        'update_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->create_at = now();
            $model->update_at = now();
        });

        static::updating(function ($model) {
            $model->update_at = now();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
