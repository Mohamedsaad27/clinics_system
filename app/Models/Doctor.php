<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'specialization',
        'experience_years',
        'qualification',
    ];

    // Define each doctor is a user
    public function user()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }
}
