<?php

namespace App\Repositories\Admin;

use App\Models\User;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserRepository
 *
 * @property $model User
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
     * @param $userId
     * @param $password
     *
     * @return bool
     * @internal param $data
     *
     */
    public function updatePassword($userId, $password)
    {
        /** @var User $user */
        $user           = $this->model->findOrFail( $userId);
        $user->password = bcrypt($password);

        return $user->save();
    }
}
