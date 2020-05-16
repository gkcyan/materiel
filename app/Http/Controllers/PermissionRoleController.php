<?php

namespace App\Http\Controllers;

use App\DataTables\PermissionRoleDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePermissionRoleRequest;
use App\Http\Requests\UpdatePermissionRoleRequest;
use App\Repositories\PermissionRoleRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PermissionRoleController extends AppBaseController
{
    /** @var  PermissionRoleRepository */
    private $permissionRoleRepository;

    public function __construct(PermissionRoleRepository $permissionRoleRepo)
    {
        $this->permissionRoleRepository = $permissionRoleRepo;
    }

    /**
     * Display a listing of the PermissionRole.
     *
     * @param PermissionRoleDataTable $permissionRoleDataTable
     * @return Response
     */
    public function index(PermissionRoleDataTable $permissionRoleDataTable)
    {
        return $permissionRoleDataTable->render('permission_roles.index');
    }

    /**
     * Show the form for creating a new PermissionRole.
     *
     * @return Response
     */
    public function create()
    {
        return view('permission_roles.create');
    }

    /**
     * Store a newly created PermissionRole in storage.
     *
     * @param CreatePermissionRoleRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionRoleRequest $request)
    {
        $input = $request->all();

        $permissionRole = $this->permissionRoleRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/permissionRoles.singular')]));

        return redirect(route('permissionRoles.index'));
    }

    /**
     * Display the specified PermissionRole.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permissionRole = $this->permissionRoleRepository->find($id);

        if (empty($permissionRole)) {
            Flash::error(__('models/permissionRoles.singular').' '.__('messages.not_found'));

            return redirect(route('permissionRoles.index'));
        }

        return view('permission_roles.show')->with('permissionRole', $permissionRole);
    }

    /**
     * Show the form for editing the specified PermissionRole.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permissionRole = $this->permissionRoleRepository->find($id);

        if (empty($permissionRole)) {
            Flash::error(__('messages.not_found', ['model' => __('models/permissionRoles.singular')]));

            return redirect(route('permissionRoles.index'));
        }

        return view('permission_roles.edit')->with('permissionRole', $permissionRole);
    }

    /**
     * Update the specified PermissionRole in storage.
     *
     * @param  int              $id
     * @param UpdatePermissionRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermissionRoleRequest $request)
    {
        $permissionRole = $this->permissionRoleRepository->find($id);

        if (empty($permissionRole)) {
            Flash::error(__('messages.not_found', ['model' => __('models/permissionRoles.singular')]));

            return redirect(route('permissionRoles.index'));
        }

        $permissionRole = $this->permissionRoleRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/permissionRoles.singular')]));

        return redirect(route('permissionRoles.index'));
    }

    /**
     * Remove the specified PermissionRole from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permissionRole = $this->permissionRoleRepository->find($id);

        if (empty($permissionRole)) {
            Flash::error(__('messages.not_found', ['model' => __('models/permissionRoles.singular')]));

            return redirect(route('permissionRoles.index'));
        }

        $this->permissionRoleRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/permissionRoles.singular')]));

        return redirect(route('permissionRoles.index'));
    }
}
