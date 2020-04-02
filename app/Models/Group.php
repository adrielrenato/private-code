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
    
    public function hasPermission(int $permissionId)
    {
        $hasPermission = $this->permissions->where('permission_id', $permissionId)
            ->where('active', true)
            ->count() > 0;

        return $hasPermission;
    }

    public function permissions()
    {
        return $this->hasMany('App\Models\GroupPermission', 'group_id', 'id');
    }
}
