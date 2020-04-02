<?php

namespace App\Models;

use App\Core\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class PhoneByCustomer extends Model
{
    use BelongsToTenant, LogsActivity;

    protected static $logName = 'system';
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['*'];

    protected $fillable = [
        'phone',
        'customer_id'
    ];
}
