<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateResalerAPIRequest;
use App\Http\Requests\API\Admin\UpdateResalerAPIRequest;
use App\Models\Admin\Resaler;
use App\Repositories\Admin\ResalerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ResalerController
 * @package App\Http\Controllers\API\Admin
 */

class ResalerAPIController extends AppBaseController
{
    /** @var  ResalerRepository */
    private $resalerRepository;

    public function __construct(ResalerRepository $resalerRepo)
    {
        $this->resalerRepository = $resalerRepo;
    }

    /**
     * Display a listing of the Resaler.
     * GET|HEAD /resalers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->resalerRepository->pushCriteria(new RequestCriteria($request));
        $this->resalerRepository->pushCriteria(new LimitOffsetCriteria($request));
        $resalers = $this->resalerRepository->all();

        return $this->sendResponse($resalers->toArray(), 'Resalers retrieved successfully');
    }

    /**
     * Store a newly created Resaler in storage.
     * POST /resalers
     *
     * @param CreateResalerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateResalerAPIRequest $request)
    {
        $input = $request->all();

        $resalers = $this->resalerRepository->create($input);

        return $this->sendResponse($resalers->toArray(), 'Resaler saved successfully');
    }

    /**
     * Display the specified Resaler.
     * GET|HEAD /resalers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Resaler $resaler */
        $resaler = $this->resalerRepository->findWithoutFail($id);

        if (empty($resaler)) {
            return $this->sendError('Resaler not found');
        }

        return $this->sendResponse($resaler->toArray(), 'Resaler retrieved successfully');
    }

    /**
     * Update the specified Resaler in storage.
     * PUT/PATCH /resalers/{id}
     *
     * @param  int $id
     * @param UpdateResalerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResalerAPIRequest $request)
    {
        $input = $request->all();

        /** @var Resaler $resaler */
        $resaler = $this->resalerRepository->findWithoutFail($id);

        if (empty($resaler)) {
            return $this->sendError('Resaler not found');
        }

        $resaler = $this->resalerRepository->update($input, $id);

        return $this->sendResponse($resaler->toArray(), 'Resaler updated successfully');
    }

    /**
     * Remove the specified Resaler from storage.
     * DELETE /resalers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Resaler $resaler */
        $resaler = $this->resalerRepository->findWithoutFail($id);

        if (empty($resaler)) {
            return $this->sendError('Resaler not found');
        }

        $resaler->delete();

        return $this->sendResponse($id, 'Resaler deleted successfully');
    }
}
