<?php

namespace App\Models;

use App\Core\Multitenancy\Tenant;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;

use App\Core\Traits\BelongsToTenant;

class Group extends Model
{
    use BelongsToTenant, LogsActivity;

    protected static $logName = 'system';
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['*'];
    
    protected $fillable = [
        'name'
    ];
}
