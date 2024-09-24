<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $table = 'shifts';

    protected $fillable = [
        'doctor_id',
        'clinic_id',
        'shift_month',
        'shift_day_during_month',
        'start_time',
        'end_time',
        'max_patients',
        'price_appoinment',
    ];

    //  relationship with the Doctor model
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    //  relationship with the Clinic model
    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id', 'id');
    }

    //  if shifts are tied to appointments
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'shift_id', 'id');
    }
}
