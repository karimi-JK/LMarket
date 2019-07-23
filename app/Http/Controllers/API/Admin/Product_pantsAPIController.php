<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateProduct_pantsAPIRequest;
use App\Http\Requests\API\Admin\UpdateProduct_pantsAPIRequest;
use App\Models\Admin\Product_pants;
use App\Repositories\Admin\Product_pantsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class Product_pantsController
 * @package App\Http\Controllers\API\Admin
 */

class Product_pantsAPIController extends AppBaseController
{
    /** @var  Product_pantsRepository */
    private $productPantsRepository;

    public function __construct(Product_pantsRepository $productPantsRepo)
    {
        $this->productPantsRepository = $productPantsRepo;
    }

    /**
     * Display a listing of the Product_pants.
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
     * Store a newly created Product_pants in storage.
     * POST /productPants
     *
     * @param CreateProduct_pantsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProduct_pantsAPIRequest $request)
    {
        $input = $request->all();

        $productPants = $this->productPantsRepository->create($input);

        return $this->sendResponse($productPants->toArray(), 'Product Pants saved successfully');
    }

    /**
     * Display the specified Product_pants.
     * GET|HEAD /productPants/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Product_pants $productPants */
        $productPants = $this->productPantsRepository->findWithoutFail($id);

        if (empty($productPants)) {
            return $this->sendError('Product Pants not found');
        }

        return $this->sendResponse($productPants->toArray(), 'Product Pants retrieved successfully');
    }

    /**
     * Update the specified Product_pants in storage.
     * PUT/PATCH /productPants/{id}
     *
     * @param  int $id
     * @param UpdateProduct_pantsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProduct_pantsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Product_pants $productPants */
        $productPants = $this->productPantsRepository->findWithoutFail($id);

        if (empty($productPants)) {
            return $this->sendError('Product Pants not found');
        }

        $productPants = $this->productPantsRepository->update($input, $id);

        return $this->sendResponse($productPants->toArray(), 'Product_pants updated successfully');
    }

    /**
     * Remove the specified Product_pants from storage.
     * DELETE /productPants/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Product_pants $productPants */
        $productPants = $this->productPantsRepository->findWithoutFail($id);

        if (empty($productPants)) {
            return $this->sendError('Product Pants not found');
        }

        $productPants->delete();

        return $this->sendResponse($id, 'Product Pants deleted successfully');
    }
}
