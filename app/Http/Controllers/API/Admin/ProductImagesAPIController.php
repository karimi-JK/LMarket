<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateProductImagesAPIRequest;
use App\Http\Requests\API\Admin\UpdateProductImagesAPIRequest;
use App\Models\Admin\ProductImages;
use App\Repositories\Admin\ProductImagesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProductImagesController
 * @package App\Http\Controllers\API\Admin
 */

class ProductImagesAPIController extends AppBaseController
{
    /** @var  ProductImagesRepository */
    private $productImagesRepository;

    public function __construct(ProductImagesRepository $productImagesRepo)
    {
        $this->productImagesRepository = $productImagesRepo;
    }

    /**
     * Display a listing of the ProductImages.
     * GET|HEAD /productImages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productImagesRepository->pushCriteria(new RequestCriteria($request));
        $this->productImagesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $productImages = $this->productImagesRepository->all();

        return $this->sendResponse($productImages->toArray(), 'Product Images retrieved successfully');
    }

    /**
     * Store a newly created ProductImages in storage.
     * POST /productImages
     *
     * @param CreateProductImagesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProductImagesAPIRequest $request)
    {
        $input = $request->all();

        $productImages = $this->productImagesRepository->create($input);

        return $this->sendResponse($productImages->toArray(), 'Product Images saved successfully');
    }

    /**
     * Display the specified ProductImages.
     * GET|HEAD /productImages/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductImages $productImages */
        $productImages = $this->productImagesRepository->findWithoutFail($id);

        if (empty($productImages)) {
            return $this->sendError('Product Images not found');
        }

        return $this->sendResponse($productImages->toArray(), 'Product Images retrieved successfully');
    }

    /**
     * Update the specified ProductImages in storage.
     * PUT/PATCH /productImages/{id}
     *
     * @param  int $id
     * @param UpdateProductImagesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductImagesAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProductImages $productImages */
        $productImages = $this->productImagesRepository->findWithoutFail($id);

        if (empty($productImages)) {
            return $this->sendError('Product Images not found');
        }

        $productImages = $this->productImagesRepository->update($input, $id);

        return $this->sendResponse($productImages->toArray(), 'ProductImages updated successfully');
    }

    /**
     * Remove the specified ProductImages from storage.
     * DELETE /productImages/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductImages $productImages */
        $productImages = $this->productImagesRepository->findWithoutFail($id);

        if (empty($productImages)) {
            return $this->sendError('Product Images not found');
        }

        $productImages->delete();

        return $this->sendResponse($id, 'Product Images deleted successfully');
    }
}
