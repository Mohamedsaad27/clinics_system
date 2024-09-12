<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsLog extends Model
{
    use HasFactory;


    protected $table = 'sms_logs';


    protected $fillable = [
        'appointment_id',
        'message_type',
        'sent_at',
        'status',
    ];

    // relation with appointment
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }
}
