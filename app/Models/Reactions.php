<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reactions extends Model
{
    use HasFactory;


    protected $fillable = ['forum_id', 'reaction_type', 'comment_text'];

    // Define the relationship with the Forum model
    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }
}
