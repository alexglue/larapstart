<?php

namespace App\Models;

use Carbon\Carbon;
use Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class UserSession
 *
 * @property Carbon last_activity
 * @method static UserSession|Builder registered()
 * @method static UserSession|Builder guests()
 * @package App\Models
 *
 * @examples $onlineRegisteredUsersSessions = UserSession::registered()->first()->toArray();
 */
class UserSession extends Model
{
    const DefaultActivityLimit = 5;
    /**
     * @var array hidden
     */
    protected $hidden = ['payload'];

    /**
     * @var bool incrementing
     */
    public $incrementing = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'sessions';

    /**
     * @var bool timestamps
     */
    public $timestamps = false;

    /**
     * @var array dates
     */
    public $dates = ['last_activity'];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * Returns the user that belongs to this entry.
     * @return User[]|Builder
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns all the guest users.
     *
     * @param  $query Builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGuests($query)
    {
        return $query
            ->whereNull('user_id')
            ->where('last_activity', '>=', strtotime($this->getTimeoutTime()));
    }

    /**
     * Returns all the registered users.
     *
     * @param  $query Builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRegistered($query)
    {
        return $query
            ->whereNotNull('user_id')
            ->where('last_activity', '>=', strtotime($this->getTimeoutTime()))
            ->with('user');
    }


    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->last_activity->gte($this->getTimeoutTime());
    }


    /**
     * @return Carbon
     */
    private function getTimeoutTime()
    {
        return Carbon::now()->subMinutes(Config::get('common.activity_limit', self::DefaultActivityLimit));
    }
}
