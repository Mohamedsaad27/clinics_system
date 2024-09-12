<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'shift_id',
        'clinic_id',
        'appointment_date',
        'status',
        'sms_sent',
    ];

    // relation with patient
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    // relation with doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    // relation with shift
    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id');
    }
    // relation with clinic
    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }
}
