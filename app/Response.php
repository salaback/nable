<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Response extends Model {

    use SoftDeletes;

	protected $fillable = ['question_id', 'name', 'type', 'options'];

    public function question()
    {
        return $this->belongsTo('nable\Question');
    }

}
