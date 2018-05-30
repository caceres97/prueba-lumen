<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use Eloquent;

class User extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Users';

	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = array('id');
}
