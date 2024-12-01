<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',

        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'sex',
        'marital_status',
        'birth_date',
        'address',
        'phone_number',

        'name_of_spouse',
        'spouse_number',

        'parent_name',
        'parent_number',
        'parcels',
    ];

    protected $casts = [
        'parcels' => 'array', // Automatically handle JSON encoding/decoding
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
