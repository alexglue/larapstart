<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\UserDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdatePasswordRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Repositories\Admin\UserRepository;
use Flash;
use Response;

/**
 * Class UserController
 *
 * @package App\Http\Controllers\Admin
 */
class UserController extends BaseController
{
    /** @var  UserRepository */
    private $userRepository;


    /**
     * @param UserRepository $userRepo
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('admin.users.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);

        Flash::success('User saved successfully.');

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        return view('admin.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);

        Flash::success('User updated successfully.');

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('admin.users.index'));
    }


    /**
     * @param UpdatePasswordRequest $request
     * @param                       $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(UpdatePasswordRequest $request, $id)
    {
        $user = $this->userRepository->findWithoutFail($id);
        $this->userRepository->updatePassword($user->id, $request->get('password'));

        flash()->success(trans('laravel-admin.passwordUpdated'));

        return redirect()->back();
    }

    public function me(AclManager $aclManager)
    {
        $user = $this->model->findOrFail(\Auth::user()->id);

        return view('admin.users.edit')
            ->with('user', $user)
            ->with('roles', $aclManager->getRolesForSelect())
            ->with('activeMenu', 'sidebar.Users');
    }

    public function meEdit(Requests\UpdateUserRequest $request)
    {
        return $this->update($request, \Auth::user()->id);
    }
}
