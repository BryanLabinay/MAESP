<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'subject', 'description'];

    public function reactions()
    {
        return $this->hasMany(Reactions::class);
    }

}
