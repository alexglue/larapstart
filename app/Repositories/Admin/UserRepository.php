<?php

namespace App\Repositories\Admin;

use App\Models\Admin\User;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserRepository
 *
 * @package App\Repositories\Admin
 */
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'remember_token',
        'deleted_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    /**
     * @param $user
     * @param $data
     * @return bool
     */
    public function updatePassword($user, $data)
    {
        $u           = $this->model->find($user);
        $u->password = bcrypt($data['password']);
        $u->save();

        return $u;
    }
}
