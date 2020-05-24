<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransporteurAPIRequest;
use App\Http\Requests\API\UpdateTransporteurAPIRequest;
use App\Models\Transporteur;
use App\Repositories\TransporteurRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TransporteurController
 * @package App\Http\Controllers\API
 */

class TransporteurAPIController extends AppBaseController
{
    /** @var  TransporteurRepository */
    private $transporteurRepository;

    public function __construct(TransporteurRepository $transporteurRepo)
    {
        $this->transporteurRepository = $transporteurRepo;
    }

    /**
     * Display a listing of the Transporteur.
     * GET|HEAD /transporteurs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $transporteurs = $this->transporteurRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $transporteurs->toArray(),
            __('messages.retrieved', ['model' => __('models/transporteurs.plural')])
        );
    }

    /**
     * Store a newly created Transporteur in storage.
     * POST /transporteurs
     *
     * @param CreateTransporteurAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTransporteurAPIRequest $request)
    {
        $input = $request->all();

        $transporteur = $this->transporteurRepository->create($input);

        return $this->sendResponse(
            $transporteur->toArray(),
            __('messages.saved', ['model' => __('models/transporteurs.singular')])
        );
    }

    /**
     * Display the specified Transporteur.
     * GET|HEAD /transporteurs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Transporteur $transporteur */
        $transporteur = $this->transporteurRepository->find($id);

        if (empty($transporteur)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/transporteurs.singular')])
            );
        }

        return $this->sendResponse(
            $transporteur->toArray(),
            __('messages.retrieved', ['model' => __('models/transporteurs.singular')])
        );
    }

    /**
     * Update the specified Transporteur in storage.
     * PUT/PATCH /transporteurs/{id}
     *
     * @param int $id
     * @param UpdateTransporteurAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransporteurAPIRequest $request)
    {
        $input = $request->all();

        /** @var Transporteur $transporteur */
        $transporteur = $this->transporteurRepository->find($id);

        if (empty($transporteur)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/transporteurs.singular')])
            );
        }

        $transporteur = $this->transporteurRepository->update($input, $id);

        return $this->sendResponse(
            $transporteur->toArray(),
            __('messages.updated', ['model' => __('models/transporteurs.singular')])
        );
    }

    /**
     * Remove the specified Transporteur from storage.
     * DELETE /transporteurs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Transporteur $transporteur */
        $transporteur = $this->transporteurRepository->find($id);

        if (empty($transporteur)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/transporteurs.singular')])
            );
        }

        $transporteur->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/transporteurs.singular')])
        );
    }
}
