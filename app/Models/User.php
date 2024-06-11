<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Lab404\Impersonate\Models\Impersonate;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use Impersonate;

    private static $currentUser = null;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'type',
        'created_by',
        'is_active',
        'is_enable_login',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function creatorId()
    {
        if($this->type == 1)
        {
            return $this->id;
        }
        else
        {
            return $this->created_by;
        }
    }

    public function currentLanguages()
    {
        return $this->lang;
    }


//    /**
//     * Interact with the user's first name.
//     *
//     * @param  string  $value
//     * @return \Illuminate\Database\Eloquent\Casts\Attribute
//     */
//    protected function type(): Attribute
//    {
//        return new Attribute(
//            get: fn ($value) =>  ["user", "admin"][$value],
//        );
//    }


}
