<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\RoleDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateRoleRequest;
use App\Http\Requests\Admin\UpdateRoleRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Repositories\Admin\RoleRepository;
use Flash;
use Schema;
use Response;

/**
 * Class RoleController
 *
 * @package App\Http\Controllers\Admin
 */
class RoleController extends BaseController
{
    /** @var  RoleRepository */
    private $repository;

    /**
     * @param RoleRepository $repository
     */
    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the Role.
     *
     * @param RoleDataTable $roleDataTable
     * @return Response
     */
    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('admin.roles.index');
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();
        $role  = $this->repository->create( $input );

        Flash::success('Role saved successfully.');

        return redirect(route('admin.roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $role = $this->repository->findWithoutFail($id);

        if (empty($role))
        {
            Flash::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        return view('admin.roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->repository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        return view('admin.roles.edit')->with('role', $role);
    }

    /**
     * Update the specified Role in storage.
     *
     * @param  int              $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $role = $this->repository->findWithoutFail($id);

        if (empty($role))
        {
            Flash::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        $role = $this->repository->update($request->all(), $id);

        Flash::success('Role updated successfully.');

        return redirect(route('admin.roles.index'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $role = $this->repository->findWithoutFail($id);

        if (empty($role))
        {
            Flash::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        $this->repository->delete($id);

        Flash::success('Role deleted successfully.');

        return redirect(route('admin.roles.index'));
    }


    /**
     * @param         $id
     * @param Request $request
     *
     * @return mixed
     */
    public function permissions($id, Request $request)
    {
        $role 		= $this->repository->findWithoutFail($id);
        $query      = Role::query();
        $columns    = Schema::getColumnListing('role');
        $attributes = [];

/*        foreach($columns as $attribute)
        {
            if($request[$attribute] == true)
            {
                $operator = isset(self::$searchOperators[$attribute])? self::$searchOperators[$attribute] : '=';
                $value	  = $operator === 'LIKE' ? '%' . $request[$attribute] . '%' : $request[$attribute];

                $query->where($attribute, $operator, $value);
                $attributes[$attribute] = $request[$attribute];
            }
            else
            {
                $attributes[$attribute] = null;
            }
        };*/

        return view('admin.permissions.assign')
            ->with('type', 'role')
            ->with('model', $role)
            ->with('permissions', $role->perms);
            //->with('attributes', $attributes);
    }


    /**
     * @param $id
     * @param $permission
     *
     * @return mixed
     */
    public function permissionsDelete($id, $permission)
    {
        $role = $this->repository->findWithoutFail($id);
        $role->perms()->detach($permission);
        flash()->success(trans('admin.model.permissions.actions.detach.success'));

        return redirect()->back();
    }
}
