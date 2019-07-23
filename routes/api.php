<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

 


//Route::resource('categories', 'CategoryAPIController');
/* 
Route::get('categories', 'CategoryAPIController@index');
Route::post('categories/create', 'CategoryAPIController@store');
Route::get('acategories/{categories}', 'CategoryAPIController@show');
Route::put('categories/{categories}', 'CategoryAPIController@update');
Route::patch('categories/{categories}', 'CategoryAPIController@update');
Route::delete('categories/{categories}', 'CategoryAPIController@destroy');
 */

Route::get('admin/resalers', 'Admin\ResalerAPIController@index');
Route::post('admin/resalers', 'Admin\ResalerAPIController@store');
Route::get('admin/resalers/{resalers}', 'Admin\ResalerAPIController@show');
Route::put('admin/resalers/{resalers}', 'Admin\ResalerAPIController@update');
Route::patch('admin/resalers/{resalers}', 'Admin\ResalerAPIController@update');
Route::delete('admin/resalers/{resalers}', 'Admin\ResalerAPIController@destroy');


Route::get('admin/products', 'Admin\ProductAPIController@index');
Route::post('admin/products', 'Admin\ProductAPIController@store');
Route::get('admin/products/{products}', 'Admin\ProductAPIController@show');
Route::put('admin/products/{products}', 'Admin\ProductAPIController@update');
Route::patch('admin/products/{products}', 'Admin\ProductAPIController@update');
Route::delete('admin/products/{products}', 'Admin\ProductAPIController@destroy');

/* 
Route::get('admin/versions', 'Admin\VersionAPIController@index');
Route::post('admin/versions', 'Admin\VersionAPIController@store');
Route::get('admin/versions/{versions}', 'Admin\VersionAPIController@show');
Route::put('admin/versions/{versions}', 'Admin\VersionAPIController@update');
Route::patch('admin/versions/{versions}', 'Admin\VersionAPIController@update');
Route::delete('admin/versions/{versions}', 'Admin\VersionAPIController@destroy');
 */

Route::get('admin/comments', 'Admin\CommentAPIController@index');
Route::post('admin/comments', 'Admin\CommentAPIController@store');
Route::get('admin/comments/{comments}', 'Admin\CommentAPIController@show');
Route::put('admin/comments/{comments}', 'Admin\CommentAPIController@update');
Route::patch('admin/comments/{comments}', 'Admin\CommentAPIController@update');
Route::delete('admin/comments/{comments}', 'Admin\CommentAPIController@destroy');


Route::get('admin/requirements', 'Admin\RequirementAPIController@index');
Route::post('admin/requirements', 'Admin\RequirementAPIController@store');
Route::get('admin/requirements/{requirements}', 'Admin\RequirementAPIController@show');
Route::put('admin/requirements/{requirements}', 'Admin\RequirementAPIController@update');
Route::patch('admin/requirements/{requirements}', 'Admin\RequirementAPIController@update');
Route::delete('admin/requirements/{requirements}', 'Admin\RequirementAPIController@destroy');


Route::get('admin/tags', 'Admin\TagAPIController@index');
Route::post('admin/tags', 'Admin\TagAPIController@store');
Route::get('admin/tags/{tags}', 'Admin\TagAPIController@show');
Route::put('admin/tags/{tags}', 'Admin\TagAPIController@update');
Route::patch('admin/tags/{tags}', 'Admin\TagAPIController@update');
Route::delete('admin/tags/{tags}', 'Admin\TagAPIController@destroy');


Route::get('admin/categories', 'Admin\CategoryAPIController@index');
Route::post('admin/categories', 'Admin\CategoryAPIController@store');
Route::get('admin/categories/{categories}', 'Admin\CategoryAPIController@show');
Route::put('admin/categories/{categories}', 'Admin\CategoryAPIController@update');
Route::patch('admin/categories/{categories}', 'Admin\CategoryAPIController@update');
Route::delete('admin/categories/{categories}', 'Admin\CategoryAPIController@destroy');


Route::get('admin/colors', 'Admin\ColorAPIController@index');
Route::post('admin/colors', 'Admin\ColorAPIController@store');
Route::get('admin/colors/{colors}', 'Admin\ColorAPIController@show');
Route::put('admin/colors/{colors}', 'Admin\ColorAPIController@update');
Route::patch('admin/colors/{colors}', 'Admin\ColorAPIController@update');
Route::delete('admin/colors/{colors}', 'Admin\ColorAPIController@destroy');


Route::get('admin/colors', 'Admin\ColorAPIController@index');
Route::post('admin/colors', 'Admin\ColorAPIController@store');
Route::get('admin/colors/{colors}', 'Admin\ColorAPIController@show');
Route::put('admin/colors/{colors}', 'Admin\ColorAPIController@update');
Route::patch('admin/colors/{colors}', 'Admin\ColorAPIController@update');
Route::delete('admin/colors/{colors}', 'Admin\ColorAPIController@destroy');


Route::get('admin/colors', 'Admin\ColorAPIController@index');
Route::post('admin/colors', 'Admin\ColorAPIController@store');
Route::get('admin/colors/{colors}', 'Admin\ColorAPIController@show');
Route::put('admin/colors/{colors}', 'Admin\ColorAPIController@update');
Route::patch('admin/colors/{colors}', 'Admin\ColorAPIController@update');
Route::delete('admin/colors/{colors}', 'Admin\ColorAPIController@destroy');


Route::get('admin/product_pants', 'Admin\Product_pantsAPIController@index');
Route::post('admin/product_pants', 'Admin\Product_pantsAPIController@store');
Route::get('admin/product_pants/{product_pants}', 'Admin\Product_pantsAPIController@show');
Route::put('admin/product_pants/{product_pants}', 'Admin\Product_pantsAPIController@update');
Route::patch('admin/product_pants/{product_pants}', 'Admin\Product_pantsAPIController@update');
Route::delete('admin/product_pants/{product_pants}', 'Admin\Product_pantsAPIController@destroy');


Route::get('admin/product_pants', 'Admin\Product_pantsAPIController@index');
Route::post('admin/product_pants', 'Admin\Product_pantsAPIController@store');
Route::get('admin/product_pants/{product_pants}', 'Admin\Product_pantsAPIController@show');
Route::put('admin/product_pants/{product_pants}', 'Admin\Product_pantsAPIController@update');
Route::patch('admin/product_pants/{product_pants}', 'Admin\Product_pantsAPIController@update');
Route::delete('admin/product_pants/{product_pants}', 'Admin\Product_pantsAPIController@destroy');


Route::get('admin/product_pants', 'Admin\ProductPantsAPIController@index');
Route::post('admin/product_pants', 'Admin\ProductPantsAPIController@store');
Route::get('admin/product_pants/{product_pants}', 'Admin\ProductPantsAPIController@show');
Route::put('admin/product_pants/{product_pants}', 'Admin\ProductPantsAPIController@update');
Route::patch('admin/product_pants/{product_pants}', 'Admin\ProductPantsAPIController@update');
Route::delete('admin/product_pants/{product_pants}', 'Admin\ProductPantsAPIController@destroy');


Route::get('admin/product_brands', 'Admin\ProductBrandsAPIController@index');
Route::post('admin/product_brands', 'Admin\ProductBrandsAPIController@store');
Route::get('admin/product_brands/{product_brands}', 'Admin\ProductBrandsAPIController@show');
Route::put('admin/product_brands/{product_brands}', 'Admin\ProductBrandsAPIController@update');
Route::patch('admin/product_brands/{product_brands}', 'Admin\ProductBrandsAPIController@update');
Route::delete('admin/product_brands/{product_brands}', 'Admin\ProductBrandsAPIController@destroy');


Route::get('admin/product_pants', 'Admin\ProductPantsAPIController@index');
Route::post('admin/product_pants', 'Admin\ProductPantsAPIController@store');
Route::get('admin/product_pants/{product_pants}', 'Admin\ProductPantsAPIController@show');
Route::put('admin/product_pants/{product_pants}', 'Admin\ProductPantsAPIController@update');
Route::patch('admin/product_pants/{product_pants}', 'Admin\ProductPantsAPIController@update');
Route::delete('admin/product_pants/{product_pants}', 'Admin\ProductPantsAPIController@destroy');


Route::get('admin/product_brands', 'Admin\ProductBrandsAPIController@index');
Route::post('admin/product_brands', 'Admin\ProductBrandsAPIController@store');
Route::get('admin/product_brands/{product_brands}', 'Admin\ProductBrandsAPIController@show');
Route::put('admin/product_brands/{product_brands}', 'Admin\ProductBrandsAPIController@update');
Route::patch('admin/product_brands/{product_brands}', 'Admin\ProductBrandsAPIController@update');
Route::delete('admin/product_brands/{product_brands}', 'Admin\ProductBrandsAPIController@destroy');


Route::get('admin/product_images', 'Admin\ProductImagesAPIController@index');
Route::post('admin/product_images', 'Admin\ProductImagesAPIController@store');
Route::get('admin/product_images/{product_images}', 'Admin\ProductImagesAPIController@show');
Route::put('admin/product_images/{product_images}', 'Admin\ProductImagesAPIController@update');
Route::patch('admin/product_images/{product_images}', 'Admin\ProductImagesAPIController@update');
Route::delete('admin/product_images/{product_images}', 'Admin\ProductImagesAPIController@destroy');


Route::get('admin/product_images', 'Admin\ProductImagesAPIController@index');
Route::post('admin/product_images', 'Admin\ProductImagesAPIController@store');
Route::get('admin/product_images/{product_images}', 'Admin\ProductImagesAPIController@show');
Route::put('admin/product_images/{product_images}', 'Admin\ProductImagesAPIController@update');
Route::patch('admin/product_images/{product_images}', 'Admin\ProductImagesAPIController@update');
Route::delete('admin/product_images/{product_images}', 'Admin\ProductImagesAPIController@destroy');


Route::get('admin/product_images', 'Admin\ProductImagesAPIController@index');
Route::post('admin/product_images', 'Admin\ProductImagesAPIController@store');
Route::get('admin/product_images/{product_images}', 'Admin\ProductImagesAPIController@show');
Route::put('admin/product_images/{product_images}', 'Admin\ProductImagesAPIController@update');
Route::patch('admin/product_images/{product_images}', 'Admin\ProductImagesAPIController@update');
Route::delete('admin/product_images/{product_images}', 'Admin\ProductImagesAPIController@destroy');
