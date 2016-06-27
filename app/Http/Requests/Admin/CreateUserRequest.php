<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use App\Models\User;

/**
 * Class CreateUserRequest
 *
 * @package App\Http\Requests\Admin
 */
class CreateUserRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return User::$rules;
    }
}
