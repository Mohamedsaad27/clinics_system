<?php

namespace App\Models;

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
        'image',
        'gender',
        'type',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed', // Cast password as hashed
    ];

    public function userAddresses()
    {
        return $this->hasMany(UserAddress::class);
    }
    /**
     * Get the appointments for the user (if they are a patient).
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id', 'id');
    }

    /**
     * Get the employee record associated with the user.
     */
    public function employee()
    {
        return $this->hasOne(Employee::class, 'user_id', 'id');
    }

    /**
     * Get the doctor record associated with the user.
     */
    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'user_id', 'id');
    }

    public function getImageUrlAttribute()
    {
        if ($this->image == null) {
            return 'https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png';
        }
        return $this->image;
    }

    public function getGenderAttribute($value)
    {
        if ($value == null) {
            return 'Not selected';
        }
        return $value;
    }
}
