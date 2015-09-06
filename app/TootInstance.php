<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

class TootInstance extends Model {

	protected $fillable = ['name', 'project_id', 'toot_id'];

    public function project()
    {
        return $this->belongsTo('nable\Project');
    }

    public function toot()
    {
        return $this->belongsTo('nable\Toot');
    }

}
