<?php

namespace App\Models;

use App\Core\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use BelongsToTenant;
    
    protected $fillable = [
        'name'
    ];
}
