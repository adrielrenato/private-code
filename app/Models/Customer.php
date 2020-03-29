<?php

namespace App\Models;

use App\Core\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use BelongsToTenant;
}
