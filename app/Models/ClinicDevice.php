<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicDevice extends Model
{
    use HasFactory;
    protected $table = 'clinic_device';
    protected $fillable = ['clinic_id', 'device_id'];
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
    public function device()
    {
        return $this->belongsTo(MedicalDevice::class);
    }
}
