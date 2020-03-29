<?php

namespace App\Models;

use App\Core\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;

class PhoneByCustomer extends Model
{
    use BelongsToTenant;
}
