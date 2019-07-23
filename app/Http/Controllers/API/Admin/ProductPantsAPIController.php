<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateProductPantsAPIRequest;
use App\Http\Requests\API\Admin\UpdateProductPantsAPIRequest;
use App\Models\Admin\ProductPants;
use App\Repositories\Admin\ProductPantsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProductPantsController
 * @package App\Http\Controllers\API\Admin
 */

class ProductPantsAPIController extends AppBaseController
{
    /** @var  ProductPantsRepository */
    private $productPantsRepository;

    public function __construct(ProductPantsRepository $productPantsRepo)
    {
        $this->productPantsRepository = $productPantsRepo;
    }

    /**
     * Display a listing of the ProductPants.
     * GET|HEAD /productPants
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productPantsRepository->pushCriteria(new RequestCriteria($request));
        $this->productPantsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $productPants = $this->productPantsRepository->all();

        return $this->sendResponse($productPants->toArray(), 'Product Pants retrieved successfully');
    }

    /**
     * Store a newly created ProductPants in storage.
     * POST /productPants
     *
     * @param CreateProductPantsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductPantsAPIRequest $request)
    {
        $input = $request->all();

        $productPants = $this->productPantsRepository->create($input);

        return $this->sendResponse($productPants->toArray(), 'Product Pants saved successfully');
    }

    /**
     * Display the specified ProductPants.
     * GET|HEAD /productPants/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductPants $productPants */
        $productPants = $this->productPantsRepository->findWithoutFail($id);

        if (empty($productPants)) {
            return $this->sendError('Product Pants not found');
        }

        return $this->sendResponse($productPants->toArray(), 'Product Pants retrieved successfully');
    }

    /**
     * Update the specified ProductPants in storage.
     * PUT/PATCH /productPants/{id}
     *
     * @param  int $id
     * @param UpdateProductPantsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductPantsAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductPants $productPants */
        $productPants = $this->productPantsRepository->findWithoutFail($id);

        if (empty($productPants)) {
            return $this->sendError('Product Pants not found');
        }

        $productPants = $this->productPantsRepository->update($input, $id);

        return $this->sendResponse($productPants->toArray(), 'ProductPants updated successfully');
    }

    /**
     * Remove the specified ProductPants from storage.
     * DELETE /productPants/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductPants $productPants */
        $productPants = $this->productPantsRepository->findWithoutFail($id);

        if (empty($productPants)) {
            return $this->sendError('Product Pants not found');
        }

        $productPants->delete();

        return $this->sendResponse($id, 'Product Pants deleted successfully');
    }
}
