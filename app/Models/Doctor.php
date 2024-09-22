<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'department_id',
        'specialty_id',
        'experience_years',
        'qualification',
    ];

    // Define each doctor is a user
    public function user()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }
    // Define each doctor is a department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    // Define each doctor is a specialty
    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
    public function shifts()
    {
        return $this->hasMany(Shift::class, 'doctor_id', 'id');
    }
}
