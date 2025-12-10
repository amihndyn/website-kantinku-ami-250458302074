<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentData extends Model
{
    use HasFactory;

    protected $table = 'students_data'; // Pastikan ini sesuai

    protected $fillable = [
        'nim',
        'name', 
        'email',
        'phone_number',
        'faculty',
        'study_program', 
        'academic_year',
        'is_active',
        'role' // Tambahkan role ke fillable
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    // Relasi ke User model jika ada
    public function user()
    {
        return $this->belongsTo(User::class, 'nim', 'nim');
    }
}