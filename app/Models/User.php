<?php

namespace App\Models;

use App\Core\Traits\BelongsToTenant;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, BelongsToTenant;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_role_id', 'group_id', 'account_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function fillGroup(int $groupId)
    {
        $this->group_id = $groupId;

        $this->save();
    }

    /**
     * Retorna a instancia da relação do nível do usuário.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userRole()
    {
        return $this->belongsTo('App\Models\UserRole', 'user_role_id', 'id');
    }

    /**
     * Retorna a instancia da relação do grupo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('App\Models\Group', 'group_id', 'id');
    }

    /**
     * Verifica se o nível do usuário é owner.
     *
     * @return bool
     */
    public function isOwner()
    {
        return $this->user_role_id === UserRole::OWNER;
    }

    /**
     * Verifica se o nível do usuário é user.
     *
     * @return bool
     */
    public function isUser()
    {
        return $this->user_role_id === UserRole::USER;
    }
}
