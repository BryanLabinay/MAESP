<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransparencyTitle extends Model
{
    use HasFactory;

    protected $table = 'transparency_titles';

    protected $fillable = [
        'transparency_name',
        'description',
        'image',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transparency()
    {
        return $this->hasMany(Transparency::class, 'transparency_id');
    }
}
