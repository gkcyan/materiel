<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCarburantFactureAPIRequest;
use App\Http\Requests\API\UpdateCarburantFactureAPIRequest;
use App\Models\CarburantFacture;
use App\Repositories\CarburantFactureRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CarburantFactureController
 * @package App\Http\Controllers\API
 */

class CarburantFactureAPIController extends AppBaseController
{
    /** @var  CarburantFactureRepository */
    private $carburantFactureRepository;

    public function __construct(CarburantFactureRepository $carburantFactureRepo)
    {
        $this->carburantFactureRepository = $carburantFactureRepo;
    }

    /**
     * Display a listing of the CarburantFacture.
     * GET|HEAD /carburantFactures
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $carburantFactures = $this->carburantFactureRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $carburantFactures->toArray(),
            __('messages.retrieved', ['model' => __('models/carburantFactures.plural')])
        );
    }

    /**
     * Store a newly created CarburantFacture in storage.
     * POST /carburantFactures
     *
     * @param CreateCarburantFactureAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCarburantFactureAPIRequest $request)
    {
        $input = $request->all();

        $carburantFacture = $this->carburantFactureRepository->create($input);

        return $this->sendResponse(
            $carburantFacture->toArray(),
            __('messages.saved', ['model' => __('models/carburantFactures.singular')])
        );
    }

    /**
     * Display the specified CarburantFacture.
     * GET|HEAD /carburantFactures/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CarburantFacture $carburantFacture */
        $carburantFacture = $this->carburantFactureRepository->find($id);

        if (empty($carburantFacture)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/carburantFactures.singular')])
            );
        }

        return $this->sendResponse(
            $carburantFacture->toArray(),
            __('messages.retrieved', ['model' => __('models/carburantFactures.singular')])
        );
    }

    /**
     * Update the specified CarburantFacture in storage.
     * PUT/PATCH /carburantFactures/{id}
     *
     * @param int $id
     * @param UpdateCarburantFactureAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarburantFactureAPIRequest $request)
    {
        $input = $request->all();

        /** @var CarburantFacture $carburantFacture */
        $carburantFacture = $this->carburantFactureRepository->find($id);

        if (empty($carburantFacture)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/carburantFactures.singular')])
            );
        }

        $carburantFacture = $this->carburantFactureRepository->update($input, $id);

        return $this->sendResponse(
            $carburantFacture->toArray(),
            __('messages.updated', ['model' => __('models/carburantFactures.singular')])
        );
    }

    /**
     * Remove the specified CarburantFacture from storage.
     * DELETE /carburantFactures/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CarburantFacture $carburantFacture */
        $carburantFacture = $this->carburantFactureRepository->find($id);

        if (empty($carburantFacture)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/carburantFactures.singular')])
            );
        }

        $carburantFacture->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/carburantFactures.singular')])
        );
    }
}
