<?php

namespace App\Core\Traits;

use Illuminate\Database\Eloquent\Builder;

use App\Core\Facades\TenantFacade;
use App\Core\Scopes\TenantScope;

trait BelongsToTenant
{
    protected static function bootBelongsToTenant()
    {
        static::addGlobalScope(new TenantScope());

        static::creating(function ($model) {
            $model->account_id = TenantFacade::account()->id;
        });
    }

    private static function belongingToTenant(Builder $builder)
    {
        if (TenantFacade::wasIdentified()) {
            $builder->where('account_id', (int) TenantFacade::account()->id);
        }
    }
}