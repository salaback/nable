<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

class RespondentAddress extends Model {

	protected $fillable = ['street_number', 'street_name', 'apt', 'city', 'state', 'zip', 'type'];

}
