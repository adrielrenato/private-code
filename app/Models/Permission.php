<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    const SHOW_PHONES = 1;
    const UPDATE_OR_DELETE_PHONES = 2;
    const SHOW_LOGS = 3;
}
