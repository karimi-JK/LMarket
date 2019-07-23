<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateProductBrandsAPIRequest;
use App\Http\Requests\API\Admin\UpdateProductBrandsAPIRequest;
use App\Models\Admin\ProductBrands;
use App\Repositories\Admin\ProductBrandsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProductBrandsController
 * @package App\Http\Controllers\API\Admin
 */

class ProductBrandsAPIController extends AppBaseController
{
    /** @var  ProductBrandsRepository */
    private $productBrandsRepository;

    public function __construct(ProductBrandsRepository $productBrandsRepo)
    {
        $this->productBrandsRepository = $productBrandsRepo;
    }

    /**
     * Display a listing of the ProductBrands.
     * GET|HEAD /productBrands
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productBrandsRepository->pushCriteria(new RequestCriteria($request));
        $this->productBrandsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $productBrands = $this->productBrandsRepository->all();

        return $this->sendResponse($productBrands->toArray(), 'Product Brands retrieved successfully');
    }

    /**
     * Store a newly created ProductBrands in storage.
     * POST /productBrands
     *
     * @param CreateProductBrandsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductBrandsAPIRequest $request)
    {
        $input = $request->all();

        $productBrands = $this->productBrandsRepository->create($input);

        return $this->sendResponse($productBrands->toArray(), 'Product Brands saved successfully');
    }

    /**
     * Display the specified ProductBrands.
     * GET|HEAD /productBrands/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductBrands $productBrands */
        $productBrands = $this->productBrandsRepository->findWithoutFail($id);

        if (empty($productBrands)) {
            return $this->sendError('Product Brands not found');
        }

        return $this->sendResponse($productBrands->toArray(), 'Product Brands retrieved successfully');
    }

    /**
     * Update the specified ProductBrands in storage.
     * PUT/PATCH /productBrands/{id}
     *
     * @param  int $id
     * @param UpdateProductBrandsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductBrandsAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductBrands $productBrands */
        $productBrands = $this->productBrandsRepository->findWithoutFail($id);

        if (empty($productBrands)) {
            return $this->sendError('Product Brands not found');
        }

        $productBrands = $this->productBrandsRepository->update($input, $id);

        return $this->sendResponse($productBrands->toArray(), 'ProductBrands updated successfully');
    }

    /**
     * Remove the specified ProductBrands from storage.
     * DELETE /productBrands/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductBrands $productBrands */
        $productBrands = $this->productBrandsRepository->findWithoutFail($id);

        if (empty($productBrands)) {
            return $this->sendError('Product Brands not found');
        }

        $productBrands->delete();

        return $this->sendResponse($id, 'Product Brands deleted successfully');
    }
}
