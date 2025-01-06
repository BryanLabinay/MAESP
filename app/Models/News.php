<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file',
        // 'description',
        'news_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Media belongs to User
    }

    public function newsTitle()
    {
        return $this->belongsTo(NewsTitle::class, 'news_id'); // Media belongs to MediaTitle
    }
}
