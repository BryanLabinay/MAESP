<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceContent extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'header','image', 'content'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
