<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTypeAccompteAPIRequest;
use App\Http\Requests\API\UpdateTypeAccompteAPIRequest;
use App\Models\TypeAccompte;
use App\Repositories\TypeAccompteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TypeAccompteController
 * @package App\Http\Controllers\API
 */

class TypeAccompteAPIController extends AppBaseController
{
    /** @var  TypeAccompteRepository */
    private $typeAccompteRepository;

    public function __construct(TypeAccompteRepository $typeAccompteRepo)
    {
        $this->typeAccompteRepository = $typeAccompteRepo;
    }

    /**
     * Display a listing of the TypeAccompte.
     * GET|HEAD /typeAccomptes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $typeAccomptes = $this->typeAccompteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $typeAccomptes->toArray(),
            __('messages.retrieved', ['model' => __('models/typeAccomptes.plural')])
        );
    }

    /**
     * Store a newly created TypeAccompte in storage.
     * POST /typeAccomptes
     *
     * @param CreateTypeAccompteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeAccompteAPIRequest $request)
    {
        $input = $request->all();

        $typeAccompte = $this->typeAccompteRepository->create($input);

        return $this->sendResponse(
            $typeAccompte->toArray(),
            __('messages.saved', ['model' => __('models/typeAccomptes.singular')])
        );
    }

    /**
     * Display the specified TypeAccompte.
     * GET|HEAD /typeAccomptes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TypeAccompte $typeAccompte */
        $typeAccompte = $this->typeAccompteRepository->find($id);

        if (empty($typeAccompte)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/typeAccomptes.singular')])
            );
        }

        return $this->sendResponse(
            $typeAccompte->toArray(),
            __('messages.retrieved', ['model' => __('models/typeAccomptes.singular')])
        );
    }

    /**
     * Update the specified TypeAccompte in storage.
     * PUT/PATCH /typeAccomptes/{id}
     *
     * @param int $id
     * @param UpdateTypeAccompteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeAccompteAPIRequest $request)
    {
        $input = $request->all();

        /** @var TypeAccompte $typeAccompte */
        $typeAccompte = $this->typeAccompteRepository->find($id);

        if (empty($typeAccompte)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/typeAccomptes.singular')])
            );
        }

        $typeAccompte = $this->typeAccompteRepository->update($input, $id);

        return $this->sendResponse(
            $typeAccompte->toArray(),
            __('messages.updated', ['model' => __('models/typeAccomptes.singular')])
        );
    }

    /**
     * Remove the specified TypeAccompte from storage.
     * DELETE /typeAccomptes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TypeAccompte $typeAccompte */
        $typeAccompte = $this->typeAccompteRepository->find($id);

        if (empty($typeAccompte)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/typeAccomptes.singular')])
            );
        }

        $typeAccompte->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/typeAccomptes.singular')])
        );
    }
}
