<?php

namespace App\Core\Multitenancy;

use App\Models\Account;

class Tenant
{
    private $_account;

    public function account()
    {
        return $this->_account;
    }

    public function switch(Account $account): void
    {
        $this->_account = $account;
    }

    public function wasIdentified()
    {
        return !is_null($this->_account);
    }
}