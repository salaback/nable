<?php namespace nable;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Respondent extends Model {

    use SoftDeletes;

	protected $fillable = ['first_name', 'last_name', 'dob', 'gender', 'phone_id', 'email_id', 'address_id', 'project_id'];

    public function phones()
    {
        return $this->hasMany('nable\RespondentPhone');
    }

    public function phone()
    {
        return $this->hasOne('nable\RespondentPhone', 'id', 'phone_id');
    }

    public function emails()
    {
        return $this->hasMany('nable\RespondentEmail');
    }

    public function email()
    {
        return $this->hasOne('nable\RespondentEmail', 'id', 'email_id');
    }

    public function addresses()
    {
        return $this->hasMany('nable\RespondentAddress');
    }

    public function address()
    {
        return $this->hasOne('nable\RespondentAddress', 'id', 'address_id');
    }

}
