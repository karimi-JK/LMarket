<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ProductPantsDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateProductPantsRequest;
use App\Http\Requests\Admin\UpdateProductPantsRequest;
use App\Repositories\Admin\ProductPantsRepository;

use App\Repositories\Admin\ProductBrandsRepository;
use App\Repositories\Admin\TagRepository;
use App\Repositories\Admin\ColorRepository;
use App\Repositories\Admin\CategoryRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use App\Models\Admin\ProductPants;
use Illuminate\Support\Facades\Input;

class ProductPantsController extends AppBaseController
{
    /** @var  ProductPantsRepository */
    private $productPantsRepository;

    public function __construct(ProductPantsRepository $productPantsRepo, 
								ProductBrandsRepository $productBrandsRepo,
								ColorRepository $colorRepo,
								CategoryRepository $categoryRepo,
								TagRepository $productTagsRepo)
    {
        $this->productPantsRepository = $productPantsRepo;
        $this->productBrandsRepository = $productBrandsRepo;
        $this->colorRepository = $colorRepo;
        $this->categoryRepository = $categoryRepo;
        $this->productTagsRepository = $productTagsRepo;
    }

    /**
     * Display a listing of the ProductPants.
     *
     * @param ProductPantsDataTable $productPantsDataTable
     * @return Response
     */
    public function index(ProductPantsDataTable $productPantsDataTable)
    {
        return $productPantsDataTable->render('admin.product_pants.index');
    }
	
	
	public function array2jstree($ar){
		$out = '';
		foreach($ar as $k => $v){
			$out .= "<li>$k";
			if(is_array($v)){
				$out .= $this->array2jstree($v);
			}else{
				$out .= "<ul><li class=\"jstree-nochildren\">$v</li></ul>";
			}
			$out .= '</li>';
		}
		return "<ul>$out</ul>";
	}


    /**
     * Show the form for creating a new ProductPants.
     *
     * @return Response
     */
    public function create()
    {
		
		$brands = $this->productBrandsRepository->all(); 
		$tags = $this->productTagsRepository->all();
		$categories = $this->categoryRepository->all();
		$colors = $this->colorRepository->all();
		
		$data["brands"]	= $brands;
		$data["tags"]	= $tags;
		$data["categories"]	= $categories;
		$data["colors"]	= $colors;
		
		$categoriesTree = array();
		$i = 0;
		
		foreach($categories as $key => $category){
			$categoriesTree[$i]["id"]	= $category["id"];
			$categoriesTree[$i]["parent"]	= $category["parent"];
			$categoriesTree[$i]["text"]	= $category["text"];
			$categoriesTree[$i]["child"]	= "";
			$i++;
		} 
		
		//echo '<div id="cTree">'. $this->array2jstree(array('name' => $categoriesTree)) .'</div>';
		
		
		$itemsByReference = array();
		// Build array of item references:
		foreach($categoriesTree as $key => &$item) {
		$itemsByReference[$item['id']] = &$item;
		// Children array:
		$itemsByReference[$item['id']]['children'] = array();
		// Empty data class (so that json_encode adds "data: {}" )
		$itemsByReference[$item['id']]['data'] = new \StdClass();
		}
		// Set items as children of the relevant parent item.
		foreach($categoriesTree as $key => &$item)
		if($item['parent'] && isset($itemsByReference[$item['parent']]))
		$itemsByReference [$item['parent']]['children'][] = &$item;
		// Remove items that were added to parents elsewhere:
		foreach($categoriesTree as $key => &$item) {
		if($item['parent'] && isset($itemsByReference[$item['parent']]))
		unset($categoriesTree[$key]);
		}
		 
		/*  
		echo "<pre>";
		
		var_dump(($categoriesTree));
		echo "</pre>";
		 */
		 
        return view('admin.product_pants.create',$data);
    }

    /**
     * Store a newly created ProductPants in storage.
     *
     * @param CreateProductPantsRequest $request
     *
     * @return Response
     */
    public function store(CreateProductPantsRequest $request)
    {
        $input = $request->all();
		 	
		$product = new ProductPants;
	
		$product->product_id 		= Input::get('product_id');
		$product->name 				= Input::get('name');
		$product->price 			= Input::get('price');
		$product->brand_id 			= Input::get('brand');		
		$product->tags 				= implode (",",Input::get('product_tags'));
		$product->categories 		= implode (",",Input::get('product_categories'));		
		$product->color_id 			= implode (",",Input::get('product_colors'));		
		$product->size 				= implode (",",Input::get('product_size'));		
		$product->count 			= Input::get('count');
		$product->critical_number 	= Input::get('critical_number');	 
		$product->state 			= Input::get('state');
		$product->status 			= Input::get('status'); 
		$product->description   	= Input::get('description');		
	 
		$product->save();
		
		//$imageName = $product->id;		

        //$productPants = $this->productPantsRepository->create($input);

        Flash::success('Product Pants saved successfully.');

        return redirect(route('admin.productPants.index'));
    }

    /**
     * Display the specified ProductPants.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productPants = $this->productPantsRepository->findWithoutFail($id);

        if (empty($productPants)) {
            Flash::error('Product Pants not found');

            return redirect(route('admin.productPants.index'));
        }

        return view('admin.product_pants.show')->with('productPants', $productPants);
    }

    /**
     * Show the form for editing the specified ProductPants.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productPants = $this->productPantsRepository->findWithoutFail($id);

        if (empty($productPants)) {
            Flash::error('Product Pants not found');

            return redirect(route('admin.productPants.index'));
        }

        return view('admin.product_pants.edit')->with('productPants', $productPants);
    }

    /**
     * Update the specified ProductPants in storage.
     *
     * @param  int              $id
     * @param UpdateProductPantsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductPantsRequest $request)
    {
        $productPants = $this->productPantsRepository->findWithoutFail($id);

        if (empty($productPants)) {
            Flash::error('Product Pants not found');

            return redirect(route('admin.productPants.index'));
        }

        $productPants = $this->productPantsRepository->update($request->all(), $id);

        Flash::success('Product Pants updated successfully.');

        return redirect(route('admin.productPants.index'));
    }

    /**
     * Remove the specified ProductPants from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productPants = $this->productPantsRepository->findWithoutFail($id);

        if (empty($productPants)) {
            Flash::error('Product Pants not found');

            return redirect(route('admin.productPants.index'));
        }

        $this->productPantsRepository->delete($id);

        Flash::success('Product Pants deleted successfully.');

        return redirect(route('admin.productPants.index'));
    }
}
