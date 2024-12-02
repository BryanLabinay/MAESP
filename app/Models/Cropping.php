<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cropping extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'sex',
        'phone_number',
        'address',
        'parcels', // This field will store parcel data as JSON
    ];

    protected $casts = [
        'parcels' => 'array', // Automatically handle JSON encoding/decoding
    ];

    /**
     * Relationship with User model (if applicable).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
