<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const DEFAULT_NOTIFICATION_SETTINGS = [
        'Digests' => [
            'Daily Digest' => false,
            'Weekly Digest' => false,
            'Monthly Digest' => false,
        ],
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'notification_settings' => 'json',
    ];
    /**
     * Eloquent relationship to chores
     *
     * @return Eloquent relationship
     */
    public function chores()
    {
        return $this->hasMany(Chore::class, 'owner_id');
    }

    /**
     * Eloquent relationship to choreInstances
     *
     * @return Eloquent relationship
     */
    public function choreInstances()
    {
        return $this->hasManyThrough('App\ChoreInstance', 'App\Chore', 'owner_id');
    }
}
