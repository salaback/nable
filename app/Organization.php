<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model {

	protected $fillable = ['name', 'type'];

	public function members()
	{
		return $this->belongsToMany('nable\User');
	}

	public function owner()
	{
		return $this->hasOne('nable\User');
	}

}
