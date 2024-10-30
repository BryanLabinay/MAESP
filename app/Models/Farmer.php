<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'sex',
        'marital_status',
        'birth_date',
        'address',
        'phone_number',
        'email',
        'farm_name',
        'farm_location',
        'farm_size',
        'crop_type',
        'user_id', // Add this to the fillable array
        'ownership_type',
        'name_of_owner',
        'farm_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
