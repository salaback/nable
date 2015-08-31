<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model {

	protected $fillable = ['name', 'project_id'];

    public function project()
    {
        return $this->belongsTo('nable\Project');
    }

}
