<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ResalerDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateResalerRequest;
use App\Http\Requests\Admin\UpdateResalerRequest;
use App\Repositories\Admin\ResalerRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use App\Models\Admin\Resaler;
use Illuminate\Support\Facades\Input;

class ResalerController extends AppBaseController
{
    /** @var  ResalerRepository */
    private $resalerRepository;

    public function __construct(ResalerRepository $resalerRepo)
    {
        $this->resalerRepository = $resalerRepo;
    }

    /**
     * Display a listing of the Resaler.
     *
     * @param ResalerDataTable $resalerDataTable
     * @return Response
     */
    public function index(ResalerDataTable $resalerDataTable)
    {
        return $resalerDataTable->render('admin.resalers.index');
    }

    /**
     * Show the form for creating a new Resaler.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.resalers.create');
    }

    /**
     * Store a newly created Resaler in storage.
     *
     * @param CreateResalerRequest $request
     *
     * @return Response
     */
    public function store(CreateResalerRequest $request)
    {
        $input = $request->all();
			
		$resaler = new Resaler;
	
		$resaler->name 		= Input::get('name');
		$resaler->company 	= Input::get('company');
		$resaler->email 	= Input::get('email');
		$resaler->mobile 	= Input::get('mobile');
		$resaler->state 	= Input::get('state');
		$resaler->password 	= Input::get('password'); 
		$resaler->policy 	= Input::get('policy'); 	
		$resaler->save();
		
		$imageName = $resaler->id . '.' . 
        $request->file('image')->getClientOriginalExtension();

		$request->file('image')->move(
			base_path() . '/public/images/resaler/', $imageName
		);
		
		$resaler 			= Resaler::find($resaler->id);	   
		$resaler->avatar 	= $imageName;
		$resaler->save();
		
        //$resaler = $this->resalerRepository->create($input);

        Flash::success('Resaler saved successfully.');

        return redirect(route('admin.resalers.index'));
    }

    /**
     * Display the specified Resaler.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $resaler = $this->resalerRepository->findWithoutFail($id);

        if (empty($resaler)) {
            Flash::error('Resaler not found');

            return redirect(route('admin.resalers.index'));
        }

        return view('admin.resalers.show')->with('resaler', $resaler);
    }

    /**
     * Show the form for editing the specified Resaler.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $resaler = $this->resalerRepository->findWithoutFail($id);

        if (empty($resaler)) {
            Flash::error('Resaler not found');

            return redirect(route('admin.resalers.index'));
        }

        return view('admin.resalers.edit')->with('resaler', $resaler);
    }

    /**
     * Update the specified Resaler in storage.
     *
     * @param  int              $id
     * @param UpdateResalerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResalerRequest $request)
    {
        $resaler = $this->resalerRepository->findWithoutFail($id);

        if (empty($resaler)) {
            Flash::error('Resaler not found');

            return redirect(route('admin.resalers.index'));
        }

        $resaler = $this->resalerRepository->update($request->all(), $id);

        Flash::success('Resaler updated successfully.');

        return redirect(route('admin.resalers.index'));
    }

    /**
     * Remove the specified Resaler from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $resaler = $this->resalerRepository->findWithoutFail($id);

        if (empty($resaler)) {
            Flash::error('Resaler not found');

            return redirect(route('admin.resalers.index'));
        }

        $this->resalerRepository->delete($id);

        Flash::success('Resaler deleted successfully.');

        return redirect(route('admin.resalers.index'));
    }
}
