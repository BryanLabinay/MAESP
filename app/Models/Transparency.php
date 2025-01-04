<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transparency extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file',
        'description',
        'transparency_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transparencyTitle()
    {
        return $this->belongsTo(transparencyTitle::class, 'transparency_id');
    }
}
