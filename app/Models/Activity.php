<?php

namespace App\Models;

use Spatie\Activitylog\Models\Activity as BaseActivity;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Activity extends BaseActivity
{
    protected $table = 'activity_log';

    // Polymorphic relation for subject (could be a User, Farmer, etc.)
    public function subject(): MorphTo
    {
        return $this->morphTo();
    }

    // Polymorphic relation for causer (who triggered the activity)
    public function causer(): MorphTo
    {
        return $this->morphTo();
    }
}


