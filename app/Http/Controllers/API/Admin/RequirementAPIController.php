<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateRequirementAPIRequest;
use App\Http\Requests\API\Admin\UpdateRequirementAPIRequest;
use App\Models\Admin\Requirement;
use App\Repositories\Admin\RequirementRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RequirementController
 * @package App\Http\Controllers\API\Admin
 */

class RequirementAPIController extends AppBaseController
{
    /** @var  RequirementRepository */
    private $requirementRepository;

    public function __construct(RequirementRepository $requirementRepo)
    {
        $this->requirementRepository = $requirementRepo;
    }

    /**
     * Display a listing of the Requirement.
     * GET|HEAD /requirements
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->requirementRepository->pushCriteria(new RequestCriteria($request));
        $this->requirementRepository->pushCriteria(new LimitOffsetCriteria($request));
        $requirements = $this->requirementRepository->all();

        return $this->sendResponse($requirements->toArray(), 'Requirements retrieved successfully');
    }

    /**
     * Store a newly created Requirement in storage.
     * POST /requirements
     *
     * @param CreateRequirementAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRequirementAPIRequest $request)
    {
        $input = $request->all();

        $requirements = $this->requirementRepository->create($input);

        return $this->sendResponse($requirements->toArray(), 'Requirement saved successfully');
    }

    /**
     * Display the specified Requirement.
     * GET|HEAD /requirements/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Requirement $requirement */
        $requirement = $this->requirementRepository->findWithoutFail($id);

        if (empty($requirement)) {
            return $this->sendError('Requirement not found');
        }

        return $this->sendResponse($requirement->toArray(), 'Requirement retrieved successfully');
    }

    /**
     * Update the specified Requirement in storage.
     * PUT/PATCH /requirements/{id}
     *
     * @param  int $id
     * @param UpdateRequirementAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequirementAPIRequest $request)
    {
        $input = $request->all();

        /** @var Requirement $requirement */
        $requirement = $this->requirementRepository->findWithoutFail($id);

        if (empty($requirement)) {
            return $this->sendError('Requirement not found');
        }

        $requirement = $this->requirementRepository->update($input, $id);

        return $this->sendResponse($requirement->toArray(), 'Requirement updated successfully');
    }

    /**
     * Remove the specified Requirement from storage.
     * DELETE /requirements/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Requirement $requirement */
        $requirement = $this->requirementRepository->findWithoutFail($id);

        if (empty($requirement)) {
            return $this->sendError('Requirement not found');
        }

        $requirement->delete();

        return $this->sendResponse($id, 'Requirement deleted successfully');
    }
}
