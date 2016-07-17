<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SocialUser
 *
 * @package App\Models
 * @property integer $id
 * @property integer $user_id
 * @property string $provider
 * @property int $social_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SocialUser whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SocialUser whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SocialUser whereProvider($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SocialUser whereSocialId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SocialUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SocialUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SocialUser extends Model
{

    /**
     * @var string table
     */
    protected $table = 'social_user';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
