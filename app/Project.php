<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model {

    use SoftDeletes;

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

    public function respondents()
    {
        return $this->hasMany('nable\Respondent');
    }

    public function toots()
    {
        return $this->hasMany('nable\Toot');
    }

}
