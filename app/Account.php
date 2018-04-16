<?php

namespace App;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'balance', 'branch_id', 'account_type','customer_id',
    ];

    public function branches()
     {
        return $this->belongsTo('App\Branch','branch_id');
     }
}
