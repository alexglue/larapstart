<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use App\Models\Permission;

/**
 * Class CreatePermissionRequest
 *
 * @package App\Http\Requests\Admin
 */
class CreatePermissionRequest extends Request
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
        return Permission::$rules;
    }
}
