<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['user_id', 'product_id', 'comment_id', 'rating', 'created_at'];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public $timestamps = false;
    protected $casts = [
        'created_at' => 'datetime',
    ];
}
