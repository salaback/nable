<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class TootInstance extends Model {

    use SoftDeletes;

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
