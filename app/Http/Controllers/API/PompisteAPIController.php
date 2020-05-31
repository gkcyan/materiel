<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePompisteAPIRequest;
use App\Http\Requests\API\UpdatePompisteAPIRequest;
use App\Models\Pompiste;
use App\Repositories\PompisteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PompisteController
 * @package App\Http\Controllers\API
 */

class PompisteAPIController extends AppBaseController
{
    /** @var  PompisteRepository */
    private $pompisteRepository;

    public function __construct(PompisteRepository $pompisteRepo)
    {
        $this->pompisteRepository = $pompisteRepo;
    }

    /**
     * Display a listing of the Pompiste.
     * GET|HEAD /pompistes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pompistes = $this->pompisteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $pompistes->toArray(),
            __('messages.retrieved', ['model' => __('models/pompistes.plural')])
        );
    }

    /**
     * Store a newly created Pompiste in storage.
     * POST /pompistes
     *
     * @param CreatePompisteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePompisteAPIRequest $request)
    {
        $input = $request->all();

        $pompiste = $this->pompisteRepository->create($input);

        return $this->sendResponse(
            $pompiste->toArray(),
            __('messages.saved', ['model' => __('models/pompistes.singular')])
        );
    }

    /**
     * Display the specified Pompiste.
     * GET|HEAD /pompistes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pompiste $pompiste */
        $pompiste = $this->pompisteRepository->find($id);

        if (empty($pompiste)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/pompistes.singular')])
            );
        }

        return $this->sendResponse(
            $pompiste->toArray(),
            __('messages.retrieved', ['model' => __('models/pompistes.singular')])
        );
    }

    /**
     * Update the specified Pompiste in storage.
     * PUT/PATCH /pompistes/{id}
     *
     * @param int $id
     * @param UpdatePompisteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePompisteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pompiste $pompiste */
        $pompiste = $this->pompisteRepository->find($id);

        if (empty($pompiste)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/pompistes.singular')])
            );
        }

        $pompiste = $this->pompisteRepository->update($input, $id);

        return $this->sendResponse(
            $pompiste->toArray(),
            __('messages.updated', ['model' => __('models/pompistes.singular')])
        );
    }

    /**
     * Remove the specified Pompiste from storage.
     * DELETE /pompistes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pompiste $pompiste */
        $pompiste = $this->pompisteRepository->find($id);

        if (empty($pompiste)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/pompistes.singular')])
            );
        }

        $pompiste->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/pompistes.singular')])
        );
    }
}
