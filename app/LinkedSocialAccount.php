<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkedSocialAccount extends Model
{
	    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider_name','provider_id'
    ];

	/**
	 * [user description]
	 * @return [type] [description]
	 */
    public function user()
	{
	    return $this->belongsTo('App\User');
	}
}
