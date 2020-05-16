<?php

namespace App\Http\Controllers;

use App\DataTables\RoleUserDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRoleUserRequest;
use App\Http\Requests\UpdateRoleUserRequest;
use App\Repositories\RoleUserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RoleUserController extends AppBaseController
{
    /** @var  RoleUserRepository */
    private $roleUserRepository;

    public function __construct(RoleUserRepository $roleUserRepo)
    {
        $this->roleUserRepository = $roleUserRepo;
    }

    /**
     * Display a listing of the RoleUser.
     *
     * @param RoleUserDataTable $roleUserDataTable
     * @return Response
     */
    public function index(RoleUserDataTable $roleUserDataTable)
    {
        return $roleUserDataTable->render('role_users.index');
    }

    /**
     * Show the form for creating a new RoleUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('role_users.create');
    }

    /**
     * Store a newly created RoleUser in storage.
     *
     * @param CreateRoleUserRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleUserRequest $request)
    {
        $input = $request->all();

        $roleUser = $this->roleUserRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/roleUsers.singular')]));

        return redirect(route('roleUsers.index'));
    }

    /**
     * Display the specified RoleUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roleUser = $this->roleUserRepository->find($id);

        if (empty($roleUser)) {
            Flash::error(__('models/roleUsers.singular').' '.__('messages.not_found'));

            return redirect(route('roleUsers.index'));
        }

        return view('role_users.show')->with('roleUser', $roleUser);
    }

    /**
     * Show the form for editing the specified RoleUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roleUser = $this->roleUserRepository->find($id);

        if (empty($roleUser)) {
            Flash::error(__('messages.not_found', ['model' => __('models/roleUsers.singular')]));

            return redirect(route('roleUsers.index'));
        }

        return view('role_users.edit')->with('roleUser', $roleUser);
    }

    /**
     * Update the specified RoleUser in storage.
     *
     * @param  int              $id
     * @param UpdateRoleUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleUserRequest $request)
    {
        $roleUser = $this->roleUserRepository->find($id);

        if (empty($roleUser)) {
            Flash::error(__('messages.not_found', ['model' => __('models/roleUsers.singular')]));

            return redirect(route('roleUsers.index'));
        }

        $roleUser = $this->roleUserRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/roleUsers.singular')]));

        return redirect(route('roleUsers.index'));
    }

    /**
     * Remove the specified RoleUser from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roleUser = $this->roleUserRepository->find($id);

        if (empty($roleUser)) {
            Flash::error(__('messages.not_found', ['model' => __('models/roleUsers.singular')]));

            return redirect(route('roleUsers.index'));
        }

        $this->roleUserRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/roleUsers.singular')]));

        return redirect(route('roleUsers.index'));
    }
}
