<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

	protected $fillable = ['name', 'description', 'privacy', 'organization_id'];

    public function organization()
    {
        return $this->belongsTo('nable\Organization');
    }

    public function members()
    {
        return $this->belongsToMany('nable\User');
    }

    public function topics()
    {
        return $this->hasMany('nable\Topic');
    }

}
