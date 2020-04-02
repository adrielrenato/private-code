<?php

namespace App\Models;

use App\Core\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;

class GroupPermission extends Model
{
    use BelongsToTenant;

    protected $fillable = [
        'permission_id',
        'group_id',
        'active'
    ];

    public function permission()
    {
        return $this->belongsTo('App\Models\Permission', 'permission_id', 'id');
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group', 'group_id', 'id');
    }
}
