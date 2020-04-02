<?php

namespace App\Core\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

use App\Core\Facades\TenantFacade;

class TenantScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where(function ($query) {
            if (TenantFacade::wasIdentified()) {
                $query->where('account_id', TenantFacade::account()->id);
            }
        });
    }
}