<?php

namespace App;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
	use Notifiable;
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'street','city','postcode','phone','branch_id',
    ];


}
