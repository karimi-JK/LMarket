<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ProductDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Repositories\Admin\ProductRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use App\Models\Admin\Product;
use Illuminate\Support\Facades\Input;

use App\Repositories\Admin\TagRepository;
use App\Repositories\Admin\ResalerRepository;
use App\Repositories\Admin\CategoryRepository;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;
	
	/** @var  ResalerRepository */
    private $resalerRepository;
	
	/** @var  CategoryRepository */
    private $categoryRepository;

	/** @var  TagRepository */
    private $tagRepository;

    public function __construct(ProductRepository $productRepo , 
								ResalerRepository $resalerRepo , 
								TagRepository $tagRepo , 
								CategoryRepository $categoryRepo)
    {
        $this->productRepository = $productRepo;
		$this->resalerRepository = $resalerRepo;
		$this->categoryRepository = $categoryRepo;
		$this->tagRepository = $tagRepo;
		$this->middleware('auth');
    }

    /**
     * Display a listing of the Product.
     *
     * @param ProductDataTable $productDataTable
     * @return Response
     */
    public function index(ProductDataTable $productDataTable)
    {
        return $productDataTable->render('admin.products.index');
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
		
		
		
		$catTree = $this->categoryRepository->catTree();
		 
		$resaler = $this->resalerRepository->all();
		$categories = $this->categoryRepository->all();
		$tags = $this->tagRepository->all();
		
		$data["resaler"]	= $resaler;
		$data["categories"]	= $categories;
		$data["tags"]	= $tags;
		
        return view('admin.products.create')->with($data);
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();
				
		$product = new Product;
	
		$product->product_name 		= Input::get('product_name');
		$product->product_tags 		= implode (",",Input::get('product_tags'));
		$product->publisher_id 		= Input::get('publisher_id');
		$product->categories 		= implode (",",Input::get('categories'));
		$product->state 			= Input::get('state');
		$product->status 			= Input::get('status'); 
		$product->product_price 	= Input::get('product_price'); 
		$product->description   	= Input::get('description'); 		
		$product->save();
		
		if($request->file('image')){
						$imageName = $product->id . '.' . 
			$request->file('image')->getClientOriginalExtension();

			$request->file('image')->move(
				base_path() . '/public/images/products/', $imageName
			);
			
			$product 			= Product::find($product->id);	   
			$product->image 	= $imageName;
			$product->save();

		}
			 
	 
        //$product = $this->productRepository->create($input);

        Flash::success('Product saved successfully.');

        return redirect(route('admin.products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }

        return view('admin.products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
		/* 
		$resaler = $this->resalerRepository->findWithoutFail(5);
		var_dump($resaler);
		exit;
		 */

        $product = $this->productRepository->findWithoutFail($id);		
		$resaler = $this->resalerRepository->all();
		$categories = $this->categoryRepository->all();
		$tags = $this->tagRepository->all();
		
		$data["resaler"]	= $resaler;
		$data["categories"]	= $categories;
		$data["tags"]	= $tags;
		$data["product"]	= $product; 

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }

        return view('admin.products.edit')->with($data);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int              $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }
		
		$product 					= Product::find($id);
		$product->product_name 		= Input::get('product_name');
		$product->product_tags 		= implode (",",Input::get('product_tags'));
		$product->publisher_id 		= Input::get('publisher_id');
		$product->categories 		= implode (",",Input::get('categories'));
		$product->state 			= Input::get('state');
		$product->status 			= Input::get('status'); 
		$product->product_price 	= Input::get('product_price'); 
		$product->description   	= Input::get('description'); 		
		 
		if($request->file('image_replace')){
						$imageName = $id . '.' . 
			$request->file('image_replace')->getClientOriginalExtension();

			$request->file('image_replace')->move(
				base_path() . '/public/images/products/', $imageName
			);
			$product->image 	= $imageName;			
		}
		
		$product->save();
		 
        //$product = $this->productRepository->update($request->all(), $id);
		
        Flash::success('Product updated successfully.');

        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('admin.products.index'));
    }
}
