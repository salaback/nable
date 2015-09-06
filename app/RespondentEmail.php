<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

class RespondentEmail extends Model {

	protected $fillable = ['address', 'project_id', 'type'];

}
