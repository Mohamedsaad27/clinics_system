<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $table = 'clinics';

    protected $fillable = [
        'clinic_name',
        'location',
        'contact_info',
        'category_id',
    ];

    //  relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // a clinic might have many appointments or doctors
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'clinic_id', 'id');
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'clinic_id', 'id');
    }
}
