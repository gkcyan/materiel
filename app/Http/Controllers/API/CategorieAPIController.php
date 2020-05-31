<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCategorieAPIRequest;
use App\Http\Requests\API\UpdateCategorieAPIRequest;
use App\Models\Categorie;
use App\Repositories\CategorieRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CategorieController
 * @package App\Http\Controllers\API
 */

class CategorieAPIController extends AppBaseController
{
    /** @var  CategorieRepository */
    private $categorieRepository;

    public function __construct(CategorieRepository $categorieRepo)
    {
        $this->categorieRepository = $categorieRepo;
    }

    /**
     * Display a listing of the Categorie.
     * GET|HEAD /categories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $categories = $this->categorieRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $categories->toArray(),
            __('messages.retrieved', ['model' => __('models/categories.plural')])
        );
    }

    /**
     * Store a newly created Categorie in storage.
     * POST /categories
     *
     * @param CreateCategorieAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCategorieAPIRequest $request)
    {
        $input = $request->all();

        $categorie = $this->categorieRepository->create($input);

        return $this->sendResponse(
            $categorie->toArray(),
            __('messages.saved', ['model' => __('models/categories.singular')])
        );
    }

    /**
     * Display the specified Categorie.
     * GET|HEAD /categories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Categorie $categorie */
        $categorie = $this->categorieRepository->find($id);

        if (empty($categorie)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/categories.singular')])
            );
        }

        return $this->sendResponse(
            $categorie->toArray(),
            __('messages.retrieved', ['model' => __('models/categories.singular')])
        );
    }

    /**
     * Update the specified Categorie in storage.
     * PUT/PATCH /categories/{id}
     *
     * @param int $id
     * @param UpdateCategorieAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategorieAPIRequest $request)
    {
        $input = $request->all();

        /** @var Categorie $categorie */
        $categorie = $this->categorieRepository->find($id);

        if (empty($categorie)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/categories.singular')])
            );
        }

        $categorie = $this->categorieRepository->update($input, $id);

        return $this->sendResponse(
            $categorie->toArray(),
            __('messages.updated', ['model' => __('models/categories.singular')])
        );
    }

    /**
     * Remove the specified Categorie from storage.
     * DELETE /categories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Categorie $categorie */
        $categorie = $this->categorieRepository->find($id);

        if (empty($categorie)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/categories.singular')])
            );
        }

        $categorie->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/categories.singular')])
        );
    }
}
