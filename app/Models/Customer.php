<?php

namespace App\Models;

use App\Core\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Customer extends Model
{
    use BelongsToTenant, LogsActivity;

    protected static $logName = 'system';
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['*'];

    protected $fillable = [
        'name',
        'email'
    ];

    public function phonesByCustomer()
    {
        return $this->hasMany('App\Models\PhoneByCustomer', 'customer_id', 'id');
    }
}
