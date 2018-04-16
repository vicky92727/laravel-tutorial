<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Branch extends Model
{
   use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'branch_name', 'branch_street', 'branch_city','branch_town','branch_postcode',
    ];

     public function managers()
     {
        return $this->belongsTo('App\Manager','branch_id');
     }
}
