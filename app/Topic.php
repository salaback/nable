<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model {

    use SoftDeletes;

	protected $fillable = ['name', 'project_id'];

    public function project()
    {
        return $this->belongsTo('nable\Project');
    }

    public function questions()
    {
        return $this->hasMany('nable\Question');
    }

}
