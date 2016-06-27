<?php namespace App\Models;

use Zizaco\Entrust\EntrustRole;

/**
 * Class Role
 *
 * @package App\Models
 */
class Role extends EntrustRole
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
     * @var array casts
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'display_name' => 'string',
        'description' => 'string'
    ];

    /**
     * @var array rules
     */
    public $rules = [];
}