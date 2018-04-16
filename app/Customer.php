<?php

namespace App;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'street','postcode','user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


     public function accounts()
     {
        return $this->hasMany('App\Account');
     }
}
