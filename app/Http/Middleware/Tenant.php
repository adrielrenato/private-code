<?php

namespace App\Http\Middleware;

use App\Core\Facades\TenantFacade;
use Closure;

use App\Models\Account;

class Tenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $account = Account::findOrFail($request->user()->account_id);

        TenantFacade::switch($account);

        return $next($request);
    }
}
