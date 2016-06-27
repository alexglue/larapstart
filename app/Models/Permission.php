<?php namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

/**
 * Class Permission
 *
 * @package App\Models
 */
class Permission extends EntrustPermission
{
    /**
     * @var array fillable
     */
    protected $fillable = [
        'display_name',
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'display_name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

}