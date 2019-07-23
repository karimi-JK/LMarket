<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateColorAPIRequest;
use App\Http\Requests\API\Admin\UpdateColorAPIRequest;
use App\Models\Admin\Color;
use App\Repositories\Admin\ColorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ColorController
 * @package App\Http\Controllers\API\Admin
 */

class ColorAPIController extends AppBaseController
{
    /** @var  ColorRepository */
    private $colorRepository;

    public function __construct(ColorRepository $colorRepo)
    {
        $this->colorRepository = $colorRepo;
    }

    /**
     * Display a listing of the Color.
     * GET|HEAD /colors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->colorRepository->pushCriteria(new RequestCriteria($request));
        $this->colorRepository->pushCriteria(new LimitOffsetCriteria($request));
        $colors = $this->colorRepository->all();

        return $this->sendResponse($colors->toArray(), 'Colors retrieved successfully');
    }

    /**
     * Store a newly created Color in storage.
     * POST /colors
     *
     * @param CreateColorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateColorAPIRequest $request)
    {
        $input = $request->all();

        $colors = $this->colorRepository->create($input);

        return $this->sendResponse($colors->toArray(), 'Color saved successfully');
    }

    /**
     * Display the specified Color.
     * GET|HEAD /colors/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Color $color */
        $color = $this->colorRepository->findWithoutFail($id);

        if (empty($color)) {
            return $this->sendError('Color not found');
        }

        return $this->sendResponse($color->toArray(), 'Color retrieved successfully');
    }

    /**
     * Update the specified Color in storage.
     * PUT/PATCH /colors/{id}
     *
     * @param  int $id
     * @param UpdateColorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateColorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Color $color */
        $color = $this->colorRepository->findWithoutFail($id);

        if (empty($color)) {
            return $this->sendError('Color not found');
        }

        $color = $this->colorRepository->update($input, $id);

        return $this->sendResponse($color->toArray(), 'Color updated successfully');
    }

    /**
     * Remove the specified Color from storage.
     * DELETE /colors/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Color $color */
        $color = $this->colorRepository->findWithoutFail($id);

        if (empty($color)) {
            return $this->sendError('Color not found');
        }

        $color->delete();

        return $this->sendResponse($id, 'Color deleted successfully');
    }
}
