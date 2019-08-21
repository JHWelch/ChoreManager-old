<?php

namespace App;

use App\Chore;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ChoreInstance extends Model
{
    protected $guarded = [];

    public function owner()
    {
        return $this->hasOneThrough('App\User', 'App\Chore', 'chore_id', 'owner_id');
    }
    /**
    Relationship to Chore

    @return eloquent relationship
     */
    public function chore()
    {
        return $this->hasOne('App\Chore');
    }

    public function complete()
    {
        if ($this->completed_date != null) {
            $this->update(
                [
                    'completed_date' => Carbon::now(),
                ]
            );
        }

        $this->chore->createNextInstance();
    }

    // protected function createNextInstance()
    // {
    //     Chore::create(

    //     );
    // }
}
