<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'doctor_id',
        'shift_id',
        'clinic_id',
        'arrival_time',
        'departure_time',
    ];

    //  relationship with the Doctor model
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    //  relationship with the Shift model
    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id', 'id');
    }

    //  relationship with the Clinic model
    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id', 'id');
    }
}
