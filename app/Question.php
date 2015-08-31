<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $fillable = ['name', 'question', 'topic_id'];

    public function topic()
    {
        return $this->belongsTo('nable\Topic');
    }

}