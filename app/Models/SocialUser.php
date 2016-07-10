<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SocialUser
 *
 * @property  int social_id
 * @property string provider
 * @package App\Models
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
