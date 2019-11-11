<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Institution extends Model
{
    protected $fillable = ['name', 'cnpj', 'status'];

    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}

