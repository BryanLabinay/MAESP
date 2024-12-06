<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cropping extends Model
{
    use HasFactory, LogsActivity;


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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['first_name',  'last_name', 'sex', 'address', 'phone_number', 'address', 'parcels']);
        // Chain fluent methods for configuration options
    }

    /**
     * Relationship with User model (if applicable).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
