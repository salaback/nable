<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

class Response extends Model {

	protected $fillable = ['question_id', 'name', 'type', 'options'];

    public function question()
    {
        return $this->belongsTo('nable\Question');
    }

}
