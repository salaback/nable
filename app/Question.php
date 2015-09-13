<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model {

    use SoftDeletes;

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
