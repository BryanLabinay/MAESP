<?php

namespace App\Models;

use Spatie\Activitylog\Models\Activity as BaseActivity;
use Illuminate\Database\Eloquent\Model;

class Activity extends BaseActivity
{
    protected $table = 'activity_log';
}
