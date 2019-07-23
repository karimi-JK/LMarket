<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\VersionDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateVersionRequest;
use App\Http\Requests\Admin\UpdateVersionRequest;
use App\Repositories\Admin\VersionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use App\Models\Admin\Version;
use Illuminate\Support\Facades\Input;

use App\Repositories\Admin\RequirementRepository;
use App\Repositories\Admin\ProductRepository;

class VersionController extends AppBaseController
{
    /** @var  VersionRepository */
    private $versionRepository;

    /** @var  RequirementRepository */
    private $requirementRepository;

    /** @var  RequirementRepository */
    private $productRepository;

    public function __construct(VersionRepository $versionRepo,
								RequirementRepository $requirementRepo,
								ProductRepository $productRepo)
    {
        $this->versionRepository = $versionRepo;
        $this->requirementRepository= $requirementRepo;
        $this->productRepository= $productRepo;
    }

    /**
     * Display a listing of the Version.
     *
     * @param VersionDataTable $versionDataTable
     * @return Response
     */
    public function index(VersionDataTable $versionDataTable,$id)
    {
 
		$versionDataTable->product_id = $id;
		$data["id"] = $id;
        return $versionDataTable->render('admin.versions.index',$data);
    }

    /**
     * Show the form for creating a new Version.
     *
     * @return Response
     */
    public function create($id)
    {
		
		$requirements = $this->requirementRepository->all();
		$productName	= $this->productRepository->findWithoutFail($id)->product_name;
		
		$data["requirements"]	= $requirements;
		$data["id"]	= $id;
		$data["productName"]	= $productName;
		
		 
        return view('admin.versions.create')->with($data);
    }

    /**
     * Store a newly created Version in storage.
     *
     * @param CreateVersionRequest $request
     *
     * @return Response
     */
    public function store(CreateVersionRequest $request)
    {
		
	
        $input = $request->all();
		
		
		$version = new Version;
	
		$version->product_id 		= Input::get('product_id');
		$version->version 	= Input::get('version');
		$version->version_price 	= Input::get('version_price');
		$version->compony 	= Input::get('compony');
		$version->visited 	= Input::get('visited');
		$version->downloaded 	= Input::get('downloaded'); 
		$version->change 	= Input::get('change'); 	
		$version->description 	= Input::get('description'); 	
		$version->requirements 	= implode (",",Input::get('requirements'));
		$version->state 	= Input::get('state'); 	
		$version->status 	= Input::get('status'); 
		$version->save();
		
		
		if($request->file('apk')){
						$apkName = $version->id . '.' . 
			$request->file('apk')->getClientOriginalExtension();

			$request->file('apk')->move(
				base_path() . '/public/file/apk/', $apkName
			);
			
			$version 			= Version::find($version->id);	   
			$version->apk 	   = $apkName;
			$version->save();

		}
		
		//$version = $this->versionRepository->create($input);

        Flash::success('Version saved successfully.');

        return redirect(route('admin.versions.index',$version->product_id ));
    }

    /**
     * Display the specified Version.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $version = $this->versionRepository->findWithoutFail($id);

        if (empty($version)) {
            Flash::error('Version not found');

            return redirect(route('admin.versions.index'));
        }

        return view('admin.versions.show')->with('version', $version);
    }

    /**
     * Show the form for editing the specified Version.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
		
        $version = $this->versionRepository->findWithoutFail($id);
		$requirements = $this->requirementRepository->all();
		$productName	= $this->productRepository->findWithoutFail($version["product_id"])->product_name;
		
		$data["version"]		= $version;
		$data["requirements"]	= $requirements;
		//$data["id"]	= $id;
		$data["productName"]	= $productName;
		
        if (empty($version)) {
            Flash::error('Version not found');

            return redirect(route('admin.versions.index'));
        }

        return view('admin.versions.edit')->with($data);
    }

    /**
     * Update the specified Version in storage.
     *
     * @param  int              $id
     * @param UpdateVersionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVersionRequest $request)
    {
        $version = $this->versionRepository->findWithoutFail($id);

        if (empty($version)) {
            Flash::error('Version not found');

            return redirect(route('admin.versions.index'));
        }

		$input = $request->all();
		
		$productIdInput				= Input::get('product_id');
		$version 					= Version::find($id); 
			 
		$version->version 			= Input::get('version');
		$version->version_price 	= Input::get('version_price');
		$version->compony 			= Input::get('compony');
		$version->visited 			= Input::get('visited');
		$version->downloaded 		= Input::get('downloaded'); 
		$version->change 			= Input::get('change'); 	
		$version->description 		= Input::get('description'); 	
		$version->requirements 		= implode (",",Input::get('requirements'));
		$version->state 			= Input::get('state'); 	
		$version->status 			= Input::get('status'); 
		 
		
		if($request->file('apk')){
						$apkName = $id . '.' . 
			$request->file('apk')->getClientOriginalExtension();

			$request->file('apk')->move(
				base_path() . '/public/file/apk/', $apkName
			);			
			$version->apk 	   = $apkName;			
		}
		
		$version->save();
		
        //$version = $this->versionRepository->update($request->all(), $id);

        Flash::success('Version updated successfully.');

        return redirect(route('admin.versions.index',$productIdInput));
    }

    /**
     * Remove the specified Version from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $version = $this->versionRepository->findWithoutFail($id);

        if (empty($version)) {
            Flash::error('Version not found');

            return redirect(route('admin.versions.index'));
        }

        $this->versionRepository->delete($id);

        Flash::success('Version deleted successfully.');

        return redirect(route('admin.versions.index',$version->product_id));
    }
}
