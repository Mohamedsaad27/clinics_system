<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalDevice extends Model
{
    use HasFactory;
    protected $table = 'medical_devices';
    protected $fillable = ['device_name', 'device_number', 'description', 'status'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    public function clinic()
    {
        return $this->belongsToMany(Clinic::class,'device_clinic', 'device_id', 'clinic_id');
    }
}
