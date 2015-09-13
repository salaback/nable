<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class RespondentPhone extends Model {

	use SoftDeletes;

	protected $fillable = ['number', 'project_id', 'type'];

}
