<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Categories_Model extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'uuid',
        'name',
        'description',
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
            $model->uuid = (string) Str::uuid();
            $model->create_at = now();
            $model->update_at = now();
        });

        static::updating(function ($model) {
            $model->update_at = now();
        });
    }

    public function category()
    {
        return $this->belongsTo(Categories_Model::class, 'categories_id', 'id');
    }
}
