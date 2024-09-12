<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
    ];

    // category can have many clinics
    public function clinics()
    {
        return $this->hasMany(Clinic::class, 'category_id', 'id');
    }
}
