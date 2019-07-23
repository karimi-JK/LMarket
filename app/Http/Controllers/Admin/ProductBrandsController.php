<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ProductBrandsDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateProductBrandsRequest;
use App\Http\Requests\Admin\UpdateProductBrandsRequest;
use App\Repositories\Admin\ProductBrandsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Admin\ProductBrands;
use Illuminate\Support\Facades\Input;

class ProductBrandsController extends AppBaseController
{
    /** @var  ProductBrandsRepository */
    private $productBrandsRepository;

    public function __construct(ProductBrandsRepository $productBrandsRepo)
    {
        $this->productBrandsRepository = $productBrandsRepo;
    }

    /**
     * Display a listing of the ProductBrands.
     *
     * @param ProductBrandsDataTable $productBrandsDataTable
     * @return Response
     */
    public function index(ProductBrandsDataTable $productBrandsDataTable)
    {
        return $productBrandsDataTable->render('admin.product_brands.index');
    }

    /**
     * Show the form for creating a new ProductBrands.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.product_brands.create');
    }

    /**
     * Store a newly created ProductBrands in storage.
     *
     * @param CreateProductBrandsRequest $request
     *
     * @return Response
     */
    public function store(CreateProductBrandsRequest $request)
    {
        $input = $request->all();
 
		$brand = new ProductBrands;
	
		$brand->name 		= Input::get('name');
		$brand->region 		= Input::get('region'); 
		$brand->description = Input::get('description'); 		
		$brand->save();
		
		if($request->file('logo')){
						$imageName = $brand->id . '.' . 
			$request->file('logo')->getClientOriginalExtension();

			$request->file('logo')->move(
				base_path() . '/public/images/product_brands/', $imageName
			);
			
			$brand 			= ProductBrands::find($brand->id);	   
			$brand->logo 	= $imageName;
			$brand->save();
		}
        //$productBrands = $this->productBrandsRepository->create($input);

        Flash::success('Product Brands saved successfully.');

        return redirect(route('admin.productBrands.index'));
    }

    /**
     * Display the specified ProductBrands.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productBrands = $this->productBrandsRepository->findWithoutFail($id);

        if (empty($productBrands)) {
            Flash::error('Product Brands not found');

            return redirect(route('admin.productBrands.index'));
        }

        return view('admin.product_brands.show')->with('productBrands', $productBrands);
    }

    /**
     * Show the form for editing the specified ProductBrands.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productBrands = $this->productBrandsRepository->findWithoutFail($id);

        if (empty($productBrands)) {
            Flash::error('Product Brands not found');

            return redirect(route('admin.productBrands.index'));
        }

        return view('admin.product_brands.edit')->with('productBrands', $productBrands);
    }

    /**
     * Update the specified ProductBrands in storage.
     *
     * @param  int              $id
     * @param UpdateProductBrandsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductBrandsRequest $request)
    {
        $productBrands = $this->productBrandsRepository->findWithoutFail($id);

        if (empty($productBrands)) {
            Flash::error('Product Brands not found');

            return redirect(route('admin.productBrands.index'));
        }

        $productBrands = $this->productBrandsRepository->update($request->all(), $id);

        Flash::success('Product Brands updated successfully.');

        return redirect(route('admin.productBrands.index'));
    }

    /**
     * Remove the specified ProductBrands from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productBrands = $this->productBrandsRepository->findWithoutFail($id);

        if (empty($productBrands)) {
            Flash::error('Product Brands not found');

            return redirect(route('admin.productBrands.index'));
        }

        $this->productBrandsRepository->delete($id);

        Flash::success('Product Brands deleted successfully.');

        return redirect(route('admin.productBrands.index'));
    }
}
