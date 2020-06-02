<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateChauffeurPermiAPIRequest;
use App\Http\Requests\API\UpdateChauffeurPermiAPIRequest;
use App\Models\ChauffeurPermi;
use App\Repositories\ChauffeurPermiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ChauffeurPermiController
 * @package App\Http\Controllers\API
 */

class ChauffeurPermiAPIController extends AppBaseController
{
    /** @var  ChauffeurPermiRepository */
    private $chauffeurPermiRepository;

    public function __construct(ChauffeurPermiRepository $chauffeurPermiRepo)
    {
        $this->chauffeurPermiRepository = $chauffeurPermiRepo;
    }

    /**
     * Display a listing of the ChauffeurPermi.
     * GET|HEAD /chauffeurPermis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $chauffeurPermis = $this->chauffeurPermiRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $chauffeurPermis->toArray(),
            __('messages.retrieved', ['model' => __('models/chauffeurPermis.plural')])
        );
    }

    /**
     * Store a newly created ChauffeurPermi in storage.
     * POST /chauffeurPermis
     *
     * @param CreateChauffeurPermiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateChauffeurPermiAPIRequest $request)
    {
        $input = $request->all();

        $chauffeurPermi = $this->chauffeurPermiRepository->create($input);

        return $this->sendResponse(
            $chauffeurPermi->toArray(),
            __('messages.saved', ['model' => __('models/chauffeurPermis.singular')])
        );
    }

    /**
     * Display the specified ChauffeurPermi.
     * GET|HEAD /chauffeurPermis/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ChauffeurPermi $chauffeurPermi */
        $chauffeurPermi = $this->chauffeurPermiRepository->find($id);

        if (empty($chauffeurPermi)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/chauffeurPermis.singular')])
            );
        }

        return $this->sendResponse(
            $chauffeurPermi->toArray(),
            __('messages.retrieved', ['model' => __('models/chauffeurPermis.singular')])
        );
    }

    /**
     * Update the specified ChauffeurPermi in storage.
     * PUT/PATCH /chauffeurPermis/{id}
     *
     * @param int $id
     * @param UpdateChauffeurPermiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChauffeurPermiAPIRequest $request)
    {
        $input = $request->all();

        /** @var ChauffeurPermi $chauffeurPermi */
        $chauffeurPermi = $this->chauffeurPermiRepository->find($id);

        if (empty($chauffeurPermi)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/chauffeurPermis.singular')])
            );
        }

        $chauffeurPermi = $this->chauffeurPermiRepository->update($input, $id);

        return $this->sendResponse(
            $chauffeurPermi->toArray(),
            __('messages.updated', ['model' => __('models/chauffeurPermis.singular')])
        );
    }

    /**
     * Remove the specified ChauffeurPermi from storage.
     * DELETE /chauffeurPermis/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ChauffeurPermi $chauffeurPermi */
        $chauffeurPermi = $this->chauffeurPermiRepository->find($id);

        if (empty($chauffeurPermi)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/chauffeurPermis.singular')])
            );
        }

        $chauffeurPermi->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/chauffeurPermis.singular')])
        );
    }
}
