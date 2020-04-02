<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Account extends Model
{
    use LogsActivity;
    
    protected static $logName = 'system';
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['*'];

    protected $fillable = [
        'created_at',
        'updated_at'
    ];
}
