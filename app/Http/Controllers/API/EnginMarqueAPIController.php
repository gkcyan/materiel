<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEnginMarqueAPIRequest;
use App\Http\Requests\API\UpdateEnginMarqueAPIRequest;
use App\Models\EnginMarque;
use App\Repositories\EnginMarqueRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EnginMarqueController
 * @package App\Http\Controllers\API
 */

class EnginMarqueAPIController extends AppBaseController
{
    /** @var  EnginMarqueRepository */
    private $enginMarqueRepository;

    public function __construct(EnginMarqueRepository $enginMarqueRepo)
    {
        $this->enginMarqueRepository = $enginMarqueRepo;
    }

    /**
     * Display a listing of the EnginMarque.
     * GET|HEAD /enginMarques
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $enginMarques = $this->enginMarqueRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $enginMarques->toArray(),
            __('messages.retrieved', ['model' => __('models/enginMarques.plural')])
        );
    }

    /**
     * Store a newly created EnginMarque in storage.
     * POST /enginMarques
     *
     * @param CreateEnginMarqueAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEnginMarqueAPIRequest $request)
    {
        $input = $request->all();

        $enginMarque = $this->enginMarqueRepository->create($input);

        return $this->sendResponse(
            $enginMarque->toArray(),
            __('messages.saved', ['model' => __('models/enginMarques.singular')])
        );
    }

    /**
     * Display the specified EnginMarque.
     * GET|HEAD /enginMarques/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EnginMarque $enginMarque */
        $enginMarque = $this->enginMarqueRepository->find($id);

        if (empty($enginMarque)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/enginMarques.singular')])
            );
        }

        return $this->sendResponse(
            $enginMarque->toArray(),
            __('messages.retrieved', ['model' => __('models/enginMarques.singular')])
        );
    }

    /**
     * Update the specified EnginMarque in storage.
     * PUT/PATCH /enginMarques/{id}
     *
     * @param int $id
     * @param UpdateEnginMarqueAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnginMarqueAPIRequest $request)
    {
        $input = $request->all();

        /** @var EnginMarque $enginMarque */
        $enginMarque = $this->enginMarqueRepository->find($id);

        if (empty($enginMarque)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/enginMarques.singular')])
            );
        }

        $enginMarque = $this->enginMarqueRepository->update($input, $id);

        return $this->sendResponse(
            $enginMarque->toArray(),
            __('messages.updated', ['model' => __('models/enginMarques.singular')])
        );
    }

    /**
     * Remove the specified EnginMarque from storage.
     * DELETE /enginMarques/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EnginMarque $enginMarque */
        $enginMarque = $this->enginMarqueRepository->find($id);

        if (empty($enginMarque)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/enginMarques.singular')])
            );
        }

        $enginMarque->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/enginMarques.singular')])
        );
    }
}
