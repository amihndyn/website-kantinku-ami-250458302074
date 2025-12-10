<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nim',
        'name',
        'email', 
        'password',
        'phone_number',
        'role',
        'is_verify'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_verify' => 'boolean',
        ];
    }

    // Method untuk login dengan NIM atau Email
    public function findForPassport($username)
    {
        return $this->where('email', $username)
                    ->orWhere('nim', $username)
                    ->first();
    }

   public function ratingForComment($commentId)
    {
        return $this->ratings()->where('comment_id', $commentId)->first()?->rating;
    }



    // Relasi ke tabel lain
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}