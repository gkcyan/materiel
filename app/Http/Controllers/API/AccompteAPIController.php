<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAccompteAPIRequest;
use App\Http\Requests\API\UpdateAccompteAPIRequest;
use App\Models\Accompte;
use App\Repositories\AccompteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AccompteController
 * @package App\Http\Controllers\API
 */

class AccompteAPIController extends AppBaseController
{
    /** @var  AccompteRepository */
    private $accompteRepository;

    public function __construct(AccompteRepository $accompteRepo)
    {
        $this->accompteRepository = $accompteRepo;
    }

    /**
     * Display a listing of the Accompte.
     * GET|HEAD /accomptes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $accomptes = $this->accompteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $accomptes->toArray(),
            __('messages.retrieved', ['model' => __('models/accomptes.plural')])
        );
    }

    /**
     * Store a newly created Accompte in storage.
     * POST /accomptes
     *
     * @param CreateAccompteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAccompteAPIRequest $request)
    {
        $input = $request->all();

        $accompte = $this->accompteRepository->create($input);

        return $this->sendResponse(
            $accompte->toArray(),
            __('messages.saved', ['model' => __('models/accomptes.singular')])
        );
    }

    /**
     * Display the specified Accompte.
     * GET|HEAD /accomptes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Accompte $accompte */
        $accompte = $this->accompteRepository->find($id);

        if (empty($accompte)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/accomptes.singular')])
            );
        }

        return $this->sendResponse(
            $accompte->toArray(),
            __('messages.retrieved', ['model' => __('models/accomptes.singular')])
        );
    }

    /**
     * Update the specified Accompte in storage.
     * PUT/PATCH /accomptes/{id}
     *
     * @param int $id
     * @param UpdateAccompteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccompteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Accompte $accompte */
        $accompte = $this->accompteRepository->find($id);

        if (empty($accompte)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/accomptes.singular')])
            );
        }

        $accompte = $this->accompteRepository->update($input, $id);

        return $this->sendResponse(
            $accompte->toArray(),
            __('messages.updated', ['model' => __('models/accomptes.singular')])
        );
    }

    /**
     * Remove the specified Accompte from storage.
     * DELETE /accomptes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Accompte $accompte */
        $accompte = $this->accompteRepository->find($id);

        if (empty($accompte)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/accomptes.singular')])
            );
        }

        $accompte->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/accomptes.singular')])
        );
    }
}
