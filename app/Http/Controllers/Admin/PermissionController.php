<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\PermissionDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreatePermissionRequest;
use App\Http\Requests\Admin\UpdatePermissionRequest;
use App\Http\Requests\AjaxRequest;
use App\Models\Permission;
use App\Repositories\Admin\PermissionRepository;
use App\Services\Acl\AclManager;
use Flash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Response;

/**
 * Class PermissionController
 *
 * @package App\Http\Controllers\Admin
 */
class PermissionController extends BaseController
{
    /** @var  PermissionRepository */
    private $permissionRepository;


    /**
     * @param PermissionRepository $permissionRepo
     */
    public function __construct(PermissionRepository $permissionRepo)
    {
        $this->permissionRepository = $permissionRepo;
    }

    /**
     * Display a listing of the Permission.
     *
     * @param PermissionDataTable $permissionDataTable
     * @return Response
     */
    public function index(PermissionDataTable $permissionDataTable)
    {
        return $permissionDataTable->render('admin.permissions.index');
    }

    /**
     * Show the form for creating a new Permission.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param CreatePermissionRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionRequest $request)
    {
        $input = $request->all();

        $permission = $this->permissionRepository->create($input);

        Flash::success('Permission saved successfully.');

        return redirect(route('admin.permissions.index'));
    }

    /**
     * Display the specified Permission.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permission = $this->permissionRepository->findWithoutFail($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('admin.permissions.index'));
        }

        return view('admin.permissions.show')->with('permission', $permission);
    }

    /**
     * Show the form for editing the specified Permission.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permission = $this->permissionRepository->findWithoutFail($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('admin.permissions.index'));
        }

        return view('admin.permissions.edit')->with('permission', $permission);
    }

    /**
     * Update the specified Permission in storage.
     *
     * @param  int              $id
     * @param UpdatePermissionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermissionRequest $request)
    {
        $permission = $this->permissionRepository->findWithoutFail($id);

        if (empty($permission))
        {
            Flash::error('Permission not found');

            return redirect(route('admin.permissions.index'));
        }

        $permission = $this->permissionRepository->update($request->all(), $id);

        Flash::success('Permission updated successfully.');

        return redirect(route('admin.permissions.index'));
    }

    /**
     * Remove the specified Permission from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permission = $this->permissionRepository->findWithoutFail($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('admin.permissions.index'));
        }

        $this->permissionRepository->delete($id);

        Flash::success('Permission deleted successfully.');

        return redirect(route('admin.permissions.index'));
    }


    /**
     * @param Request $request
     * @param AclManager          $acl
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getForSelect(Request $request, AclManager $acl)
    {
        if($request->get('type') === 'role')
        {
            $permissionsModel = $acl->getPermissionsIdsForRole($request->get('model'));
        }
        else
        {
            $permissionsModel = $acl->getPermissionsIdsForUser($request->get('model'));
        }

        $permissions = Permission::whereNotIn('id', $permissionsModel)->get();

        return response()->json($permissions);
    }


    /**
     * @param Request    $request
     * @param AclManager $acl
     *
     * @return mixed
     */
    public function permissionsAssign(Request $request, AclManager $acl)
    {
        if($request->get('type') === 'role')
        {
            $acl->assignPermissionsToRole($request->get('model'), $request->get('perms'));
        }
        else
        {
            $acl->assignPermissionsToUser($request->get('model'), $request->get('perms'));
        }
        flash()->success(trans('laravel-admin.permissionsAttachSuccess'));

        return \Redirect::back();
    }
}
