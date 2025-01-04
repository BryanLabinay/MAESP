<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $fillable = [
        'title',
        'file',
        'user_id',
        'description',
        'media_id', // Foreign key to MediaTitle
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
