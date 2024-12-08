<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'service_name',
        'image',
        'user_id',
        'description',
    ];

    protected $casts = [
        'image' => 'array', // Cast the 'image' field to an array
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
