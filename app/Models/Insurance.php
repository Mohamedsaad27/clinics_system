<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $table = 'insurances';

    protected $fillable = [
        'patient_id',
        'insurance_card_number',
        'beneficiary',
        'insurance_company',
    ];

    //  relationship with the User (Patient) model
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id', 'id');
    }
}
