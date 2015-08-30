<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

	private $fillable = ['name', 'description', 'privacy'];

    public function organization()
    {
        return $this->belongsTo('nable\Organization');
    }

    public function members()
    {
        return $this->belongsToMany('nable\User');
    }
}
