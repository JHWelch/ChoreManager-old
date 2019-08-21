<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
A user's chore.
 */
class Chore extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    const FREQUENCIES = [
        0 => 'Daily',
        1 => 'Weekly',
        2 => 'Monthly',
        3 => 'Quarterly',
        4 => 'Yearly',
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
    Get All ChoreInstances of this Chore

    @return App\ChoreInstance Collection
     */
    public function instances()
    {
        return $this->hasMany('App\ChoreInstance');
    }

    public function getIntervalDaysAttribute()
    {

    }

    public function createInstanceNow()
    {
        $this->createInstanceAt(Carbon::now());
    }

    public function createInstanceAt($date)
    {
        ChoreInstance::create(
            [
                'due_date' => $date,
                'chore_id' => $this->id,
                'completed_date' => null,
            ]
        );
    }

    public function createNextInstance()
    {

    }
}
