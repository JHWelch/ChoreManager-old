<?php

namespace App;

use App\Chore;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ChoreInstance extends Model
{
    /**
     * No gaurded fields
     *
     * @var array
     */
    protected $guarded = [];

    /**
    Relationship to Chore

    @return eloquent relationship
     */
    public function chore()
    {
        return $this->belongsTo('App\Chore');
    }

    /**
     * @return Next Chore Instance
     */
    public function complete()
    {
        if ($this->completed_date != null) {
            $this->update(
                [
                    'completed_date' => Carbon::now(),
                ]
            );
        }

        return $this->chore->createNextInstance();
    }

}
