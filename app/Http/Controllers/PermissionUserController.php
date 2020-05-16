<?php

namespace App\Http\Controllers;

use App\DataTables\PermissionUserDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePermissionUserRequest;
use App\Http\Requests\UpdatePermissionUserRequest;
use App\Repositories\PermissionUserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PermissionUserController extends AppBaseController
{
    /** @var  PermissionUserRepository */
    private $permissionUserRepository;

    public function __construct(PermissionUserRepository $permissionUserRepo)
    {
        $this->permissionUserRepository = $permissionUserRepo;
    }

    /**
     * Display a listing of the PermissionUser.
     *
     * @param PermissionUserDataTable $permissionUserDataTable
     * @return Response
     */
    public function index(PermissionUserDataTable $permissionUserDataTable)
    {
        return $permissionUserDataTable->render('permission_users.index');
    }

    /**
     * Show the form for creating a new PermissionUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('permission_users.create');
    }

    /**
     * Store a newly created PermissionUser in storage.
     *
     * @param CreatePermissionUserRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionUserRequest $request)
    {
        $input = $request->all();

        $permissionUser = $this->permissionUserRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/permissionUsers.singular')]));

        return redirect(route('permissionUsers.index'));
    }

    /**
     * Display the specified PermissionUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permissionUser = $this->permissionUserRepository->find($id);

        if (empty($permissionUser)) {
            Flash::error(__('models/permissionUsers.singular').' '.__('messages.not_found'));

            return redirect(route('permissionUsers.index'));
        }

        return view('permission_users.show')->with('permissionUser', $permissionUser);
    }

    /**
     * Show the form for editing the specified PermissionUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permissionUser = $this->permissionUserRepository->find($id);

        if (empty($permissionUser)) {
            Flash::error(__('messages.not_found', ['model' => __('models/permissionUsers.singular')]));

            return redirect(route('permissionUsers.index'));
        }

        return view('permission_users.edit')->with('permissionUser', $permissionUser);
    }

    /**
     * Update the specified PermissionUser in storage.
     *
     * @param  int              $id
     * @param UpdatePermissionUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermissionUserRequest $request)
    {
        $permissionUser = $this->permissionUserRepository->find($id);

        if (empty($permissionUser)) {
            Flash::error(__('messages.not_found', ['model' => __('models/permissionUsers.singular')]));

            return redirect(route('permissionUsers.index'));
        }

        $permissionUser = $this->permissionUserRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/permissionUsers.singular')]));

        return redirect(route('permissionUsers.index'));
    }

    /**
     * Remove the specified PermissionUser from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permissionUser = $this->permissionUserRepository->find($id);

        if (empty($permissionUser)) {
            Flash::error(__('messages.not_found', ['model' => __('models/permissionUsers.singular')]));

            return redirect(route('permissionUsers.index'));
        }

        $this->permissionUserRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/permissionUsers.singular')]));

        return redirect(route('permissionUsers.index'));
    }
}
