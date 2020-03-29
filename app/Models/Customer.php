<?php

namespace App\Models;

use App\Core\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use BelongsToTenant;

    protected $fillable = [
        'name',
        'email'
    ];

    public function phonesByCustomer()
    {
        return $this->hasMany('App\Models\PhoneByCustomer', 'customer_id', 'id');
    }
}
