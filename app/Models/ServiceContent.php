<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast;

class ServiceContent extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'header', 'image', 'content'];

    protected $casts = [
        'image' => 'array',
    ];
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
