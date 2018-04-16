<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','manager_id','provider','provider_id'
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
     * Get the phone record associated with the user.
     */
    public function salary()
    {
        return $this->hasOne('App\Usersalary');
    }

    public function customers()
    {
        return $this->hasMany('App\Customer');
    }

    /**
     * [accounts description]
     * @return [type] [description]
     */
    public function accounts(){
        return $this->hasMany('App\LinkedSocialAccount');
    }
}
