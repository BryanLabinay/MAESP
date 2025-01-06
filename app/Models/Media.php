<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file',
        // 'description',
        'media_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Media belongs to User
    }

    public function mediaTitle()
    {
        return $this->belongsTo(MediaTitle::class, 'media_id'); // Media belongs to MediaTitle
    }
}
