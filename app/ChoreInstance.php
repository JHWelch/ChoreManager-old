<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChoreInstance extends Model
{
    public function owner()
    {
    	return $this->hasOneThrough('App\User', 'App\Chore');
    }
}
