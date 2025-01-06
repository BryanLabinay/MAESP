<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsTitle extends Model
{
    use HasFactory;

    protected $table = 'news_titles';

    protected $fillable = [
        'news_name',
        'description',
        'image',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function news()
    {
        return $this->hasMany(News::class, 'news_id');
    }
}
