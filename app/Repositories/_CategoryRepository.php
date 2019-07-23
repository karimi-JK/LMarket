<?php

namespace App\Repositories;

use App\Models\Category;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CategoryRepository
 * @package App\Repositories
 * @version December 17, 2018, 6:27 am UTC
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
        'parent_id',
        'name' 
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
		
		$categories = Category::where('parent_id', '0')->get();
		
		 
		$parent = array();
		$i = 0;
		foreach($categories as $category){			
			$parents[$i]["id"]=$category->id;
			$parents[$i]["icon"]=$category->description;
			$parents[$i]["text"]=$category->name;
			$i++;
		}
		
		$i = 0;
		foreach($parents as $parent){			
			$category = Category::select(['id' , 'name AS text', 'description AS icon'])->where('parent_id', $parent["id"])->get();
			$parents[$i]["children"] = $category;
			$i++;
			
		}
		
		return $parents;
	}
	
}
