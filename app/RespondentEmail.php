<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class RespondentEmail extends Model {

	use SoftDeletes;

	protected $fillable = ['address', 'project_id', 'type'];

}
