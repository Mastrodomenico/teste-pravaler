<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name','duration_week','status', 'institution_id'];

    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }
}
