<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // Define each department has many doctors
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    // Define each department has many employees
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function clinics()
    {
        return $this->hasMany(Clinic::class);
    }
}
