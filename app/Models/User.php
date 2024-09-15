<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'national_id',
        'user_type_id',
        'image',
        'gender',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
    public function userType()
    {
        return $this->belongsTo(UserType::class, 'user_type_id', 'id');
    }

    // Example: If a user can has Many Appointments

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id', 'id');
    }

    // Example: If a user can be an employee
    public function employee()
    {
        return $this->hasOne(Employee::class, 'user_id', 'id');
    }

    // Example: If a user can be a doctor
    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'user_id', 'id');
    }


}
