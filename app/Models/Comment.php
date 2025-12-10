<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'message',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public $timestamps = false;
    protected $casts = [
        'created_at' => 'datetime',
    ];
}
