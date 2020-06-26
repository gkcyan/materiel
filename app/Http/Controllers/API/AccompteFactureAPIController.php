<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAccompteFactureAPIRequest;
use App\Http\Requests\API\UpdateAccompteFactureAPIRequest;
use App\Models\AccompteFacture;
use App\Repositories\AccompteFactureRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AccompteFactureController
 * @package App\Http\Controllers\API
 */

class AccompteFactureAPIController extends AppBaseController
{
    /** @var  AccompteFactureRepository */
    private $accompteFactureRepository;

    public function __construct(AccompteFactureRepository $accompteFactureRepo)
    {
        $this->accompteFactureRepository = $accompteFactureRepo;
    }

    /**
     * Display a listing of the AccompteFacture.
     * GET|HEAD /accompteFactures
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $accompteFactures = $this->accompteFactureRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $accompteFactures->toArray(),
            __('messages.retrieved', ['model' => __('models/accompteFactures.plural')])
        );
    }

    /**
     * Store a newly created AccompteFacture in storage.
     * POST /accompteFactures
     *
     * @param CreateAccompteFactureAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAccompteFactureAPIRequest $request)
    {
        $input = $request->all();

        $accompteFacture = $this->accompteFactureRepository->create($input);

        return $this->sendResponse(
            $accompteFacture->toArray(),
            __('messages.saved', ['model' => __('models/accompteFactures.singular')])
        );
    }

    /**
     * Display the specified AccompteFacture.
     * GET|HEAD /accompteFactures/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AccompteFacture $accompteFacture */
        $accompteFacture = $this->accompteFactureRepository->find($id);

        if (empty($accompteFacture)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/accompteFactures.singular')])
            );
        }

        return $this->sendResponse(
            $accompteFacture->toArray(),
            __('messages.retrieved', ['model' => __('models/accompteFactures.singular')])
        );
    }

    /**
     * Update the specified AccompteFacture in storage.
     * PUT/PATCH /accompteFactures/{id}
     *
     * @param int $id
     * @param UpdateAccompteFactureAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccompteFactureAPIRequest $request)
    {
        $input = $request->all();

        /** @var AccompteFacture $accompteFacture */
        $accompteFacture = $this->accompteFactureRepository->find($id);

        if (empty($accompteFacture)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/accompteFactures.singular')])
            );
        }

        $accompteFacture = $this->accompteFactureRepository->update($input, $id);

        return $this->sendResponse(
            $accompteFacture->toArray(),
            __('messages.updated', ['model' => __('models/accompteFactures.singular')])
        );
    }

    /**
     * Remove the specified AccompteFacture from storage.
     * DELETE /accompteFactures/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AccompteFacture $accompteFacture */
        $accompteFacture = $this->accompteFactureRepository->find($id);

        if (empty($accompteFacture)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/accompteFactures.singular')])
            );
        }

        $accompteFacture->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/accompteFactures.singular')])
        );
    }
}
