<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateVersionAPIRequest;
use App\Http\Requests\API\Admin\UpdateVersionAPIRequest;
use App\Models\Admin\Version;
use App\Repositories\Admin\VersionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class VersionController
 * @package App\Http\Controllers\API\Admin
 */

class VersionAPIController extends AppBaseController
{
    /** @var  VersionRepository */
    private $versionRepository;

    public function __construct(VersionRepository $versionRepo)
    {
        $this->versionRepository = $versionRepo;
    }

    /**
     * Display a listing of the Version.
     * GET|HEAD /versions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->versionRepository->pushCriteria(new RequestCriteria($request));
        $this->versionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $versions = $this->versionRepository->all();

        return $this->sendResponse($versions->toArray(), 'Versions retrieved successfully');
    }

    /**
     * Store a newly created Version in storage.
     * POST /versions
     *
     * @param CreateVersionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVersionAPIRequest $request)
    {
        $input = $request->all();

        $versions = $this->versionRepository->create($input);

        return $this->sendResponse($versions->toArray(), 'Version saved successfully');
    }

    /**
     * Display the specified Version.
     * GET|HEAD /versions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Version $version */
        $version = $this->versionRepository->findWithoutFail($id);

        if (empty($version)) {
            return $this->sendError('Version not found');
        }

        return $this->sendResponse($version->toArray(), 'Version retrieved successfully');
    }

    /**
     * Update the specified Version in storage.
     * PUT/PATCH /versions/{id}
     *
     * @param  int $id
     * @param UpdateVersionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVersionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Version $version */
        $version = $this->versionRepository->findWithoutFail($id);

        if (empty($version)) {
            return $this->sendError('Version not found');
        }

        $version = $this->versionRepository->update($input, $id);

        return $this->sendResponse($version->toArray(), 'Version updated successfully');
    }

    /**
     * Remove the specified Version from storage.
     * DELETE /versions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Version $version */
        $version = $this->versionRepository->findWithoutFail($id);

        if (empty($version)) {
            return $this->sendError('Version not found');
        }

        $version->delete();

        return $this->sendResponse($id, 'Version deleted successfully');
    }
}
