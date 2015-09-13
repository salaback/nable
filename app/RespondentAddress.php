<?php namespace nable;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class RespondentAddress extends Model {
	use SoftDeletes;
	protected $fillable = ['street_number', 'street_name', 'apt', 'city', 'state', 'zip', 'type'];

}
