<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model {

	protected $fillable = ['name', 'type'];

	public function members()
	{
		return $this->belongsToMany('App\User');
	}

}
