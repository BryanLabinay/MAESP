<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaTitle extends Model
{
    use HasFactory;

    protected $table = 'media_titles';

    protected $fillable = [
        'media_name',
        'description',
        'image',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // MediaTitle belongs to User
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'media_id'); // Media has a foreign key 'media_id' to MediaTitle
    }
}
