<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Farmer extends Model
{
    use HasFactory, LogsActivity;

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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['first_name', 'last_name', 'sex', 'address', 'phone_number', 'parcels']);
        // Chain fluent methods for configuration options
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
