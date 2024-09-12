<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'employee_id',
        'role',
        'salary',
        'hire_date',
    ];

    // each employee is a user
    public function user()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
}
