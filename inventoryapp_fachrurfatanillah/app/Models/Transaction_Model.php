<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_Model extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'products_id',
        'users_id',
        'type',
        'amount',
        'notes',
    ];

    public function product()
    {
        return $this->belongsTo(Products_Model::class, 'products_id');
    }

    public function user()
    {
        return $this->belongsTo(Users_Model::class, 'users_id');
    }
}
