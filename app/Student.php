<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'cpf', 'date_birth', 'email', 'phone', 'street', 'number', 'district', 'city', 'uf', 'status', 'course_id'];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }



    public function getDateBirthAttribute($value)
    {
        return implode('/',array_reverse(explode('-', $value)));
    }

    public function setDateBirthAttribute($value)
    {
        $this->attributes['date_birth'] = implode('-',array_reverse(explode('/', $value)));
    }
}
