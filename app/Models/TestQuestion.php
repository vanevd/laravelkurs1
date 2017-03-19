<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    public function test()
    {
        return $this->belongsTo('App\Models\Test');        
    }

    public function options()
    {
        return $this->hasMany('App\Models\QuestionOption');        
    }    
}
