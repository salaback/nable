<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

class RespondentPhone extends Model {

	protected $fillable = ['number', 'project_id', 'type'];

}
