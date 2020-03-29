<?php

namespace App\Models;

use App\Core\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;

class PhoneByClient extends Model
{
    use BelongsToTenant;
}
