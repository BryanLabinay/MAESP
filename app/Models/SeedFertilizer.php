<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeedFertilizer extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'date', 'image'];
}
