<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $fillable = ['name', 'question', 'topic_id', 'type', 'defined'];

    public function topic()
    {
        return $this->belongsTo('nable\Topic');
    }

    public function responses()
    {
        return $this->hasMany('nable\Response');
    }

}
