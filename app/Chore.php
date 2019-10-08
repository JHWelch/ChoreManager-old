<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * A user's chore.
 */
class Chore extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    const FREQUENCIES = [
        0 => 'Does not Repeat',
        1 => 'Daily',
        2 => 'Weekly',
        3 => 'Monthly',
        4 => 'Quarterly',
        5 => 'Yearly',
    ];

    public function getFrequencyNameAttribute()
    {
        return self::FREQUENCIES[$this->frequency_id];
    }

    /**
     * Relationship to App\User
     *
     * @return mixed
     */
    public function owner()
    {
        return $this->belongsTo('App\User');
    }

    /**
    * Get All ChoreInstances of this Chore
    *
    * @return App\ChoreInstance Collection
     */
    public function instances()
    {
        return $this->hasMany('App\ChoreInstance');
    }

    public function createInstanceNow()
    {
        return $this->createInstanceAt(Carbon::now());
    }

    public function createInstanceAt($date)
    {
        $currentInstance = $this->currentInstance();

        if (gettype($date) === 'string') {
            $date = new Carbon($date);
        }

        if ($currentInstance != null) {
            $currentInstance->due_date = $date->toDateString();

            $currentInstance->save();
            return $currentInstance;
        } else {
            return ChoreInstance::create(
                [
                    'due_date' => $date->toDateString(),
                    'chore_id' => $this->id,
                    'completed_date' => null,
                ]
            );
        }
    }

    public function createNextInstance()
    {
        switch ($this->frequency_id) {
            case 0:
                return null;
            case 1: // Daily
                return $this->createInstanceAt(Carbon::now()->addDay());
                break;
            case 2: // Weekly
                return $this->createInstanceAt(Carbon::now()->addWeek());
                break;
            case 3:
                return $this->createInstanceAt(Carbon::now()->addMonth());
                break;
            case 4: // Quarterly
                return $this->createInstanceAt(Carbon::now()->addMonths(3));
                break;
            case 5: //Year
                return $this->createInstanceAt(Carbon::now()->addYear());
                break;
        }
    }

    public function currentInstance()
    {
        return ChoreInstance::where(
            [
                'chore_id' => $this->id,
                'completed_date' => null,
            ]
        )->get()->first();
    }
}
