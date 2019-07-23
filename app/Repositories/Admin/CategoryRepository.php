<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Category;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CategoryRepository
 * @package App\Repositories\Admin
 * @version January 2, 2019, 10:39 am UTC
 *
 * @method Category findWithoutFail($id, $columns = ['*'])
 * @method Category find($id, $columns = ['*'])
 * @method Category first($columns = ['*'])
*/
class CategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'parent',
        'text',
        'icon',
        'position',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Category::class;
    }
	
	
	/**
	 * Build Category Tree
	 **/
	public function CatTree(){
		
		//$categories1 = Category::where('parent', 0)->get();  
		  
		$categories = Category::select('id', 'parent', 'icon' , 'text')->get();
		
		
		/* 
		$i	= 0;
		
		foreach($categories as $key => $category){
			$categoriesTree[$i]["id"]	= $category["id"];
			$categoriesTree[$i]["parent"]	= $category["parent"];
			$categoriesTree[$i]["text"]	= $category["text"];
			$categoriesTree[$i]["children"]	= "";
			$i++;
		} 
		
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
		
		
		
		
		
		$parent = array();
		$i = 0;
		foreach($categories1 as $category){			
			$parents[$i]["id"]=$category->id;
			$parents[$i]["icon"]=$category->icon;
			$parents[$i]["text"]=$category->text;
			$i++;
		}
		
		$i = 0;
		foreach($parents as $parent){			
			$category = Category::select(['id' , 'text', 'icon'])->where('parent', $parent["id"])->get();
			$parents[$i]["children"] = $category;
			$i++;
			
		} 
		  
		 */ 
		  
		  
		$parents = array();
		$i = 0;
		foreach($categories as $category){			
			$parents[$i]["id"]=$category->id;
			$parents[$i]["icon"]=$category->icon;
			$parents[$i]["parent"]=$category->parent;
			$parents[$i]["text"]=$category->text;
			$i++;
		}
		
		 
		
		return $parents;
	}
	
}
