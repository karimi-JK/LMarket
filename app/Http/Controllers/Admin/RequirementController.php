<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\RequirementDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateRequirementRequest;
use App\Http\Requests\Admin\UpdateRequirementRequest;
use App\Repositories\Admin\RequirementRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RequirementController extends AppBaseController
{
    /** @var  RequirementRepository */
    private $requirementRepository;

    public function __construct(RequirementRepository $requirementRepo)
    {
        $this->requirementRepository = $requirementRepo;
    }

    /**
     * Display a listing of the Requirement.
     *
     * @param RequirementDataTable $requirementDataTable
     * @return Response
     */
    public function index(RequirementDataTable $requirementDataTable)
    {
        return $requirementDataTable->render('admin.requirements.index');
    }

    /**
     * Show the form for creating a new Requirement.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.requirements.create');
    }

    /**
     * Store a newly created Requirement in storage.
     *
     * @param CreateRequirementRequest $request
     *
     * @return Response
     */
    public function store(CreateRequirementRequest $request)
    {
        $input = $request->all();

        $requirement = $this->requirementRepository->create($input);

        Flash::success('Requirement saved successfully.');

        return redirect(route('admin.requirements.index'));
    }

    /**
     * Display the specified Requirement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $requirement = $this->requirementRepository->findWithoutFail($id);

        if (empty($requirement)) {
            Flash::error('Requirement not found');

            return redirect(route('admin.requirements.index'));
        }

        return view('admin.requirements.show')->with('requirement', $requirement);
    }

    /**
     * Show the form for editing the specified Requirement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $requirement = $this->requirementRepository->findWithoutFail($id);

        if (empty($requirement)) {
            Flash::error('Requirement not found');

            return redirect(route('admin.requirements.index'));
        }

        return view('admin.requirements.edit')->with('requirement', $requirement);
    }

    /**
     * Update the specified Requirement in storage.
     *
     * @param  int              $id
     * @param UpdateRequirementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequirementRequest $request)
    {
        $requirement = $this->requirementRepository->findWithoutFail($id);

        if (empty($requirement)) {
            Flash::error('Requirement not found');

            return redirect(route('admin.requirements.index'));
        }

        $requirement = $this->requirementRepository->update($request->all(), $id);

        Flash::success('Requirement updated successfully.');

        return redirect(route('admin.requirements.index'));
    }

    /**
     * Remove the specified Requirement from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $requirement = $this->requirementRepository->findWithoutFail($id);

        if (empty($requirement)) {
            Flash::error('Requirement not found');

            return redirect(route('admin.requirements.index'));
        }

        $this->requirementRepository->delete($id);

        Flash::success('Requirement deleted successfully.');

        return redirect(route('admin.requirements.index'));
    }
}
