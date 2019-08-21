<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
A user's chore.
 */
class Chore extends Model {
    protected $guarded = [];

    const FREQUENCIES = [
        0 => 'Daily',
        1 => 'Weekly',
        2 => 'Monthly',
        3 => 'Quarterly',
        4 => 'Yearly',
    ];

    public function getFrequencyNameAttribute() {
        return self::FREQUENCIES[$this->frequency_id];
    }

    public function owner() {
        return $this->belongsTo('App\User');
    }
    /**
    Get All ChoreInstances of this Chore

    @return App\ChoreInstance Collection
     */
    public function instances() {
        return $this->hasMany('App\ChoreInstance');
    }

    public function getIntervalDaysAttribute() {

    }
}