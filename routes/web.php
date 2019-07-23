<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* 
Route::get('/', function () {
    return view('color');
});
  */


Auth::routes();

Route::get('/', 'HomeController@index');


Route::get('/home', 'HomeController@index');



Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

/* Route::resource('categories', 'CategoryController'); */

Route::get('admin/resalers', ['as'=> 'admin.resalers.index', 'uses' => 'Admin\ResalerController@index']);
Route::post('admin/resalers', ['as'=> 'admin.resalers.store', 'uses' => 'Admin\ResalerController@store']);
Route::get('admin/resalers/create', ['as'=> 'admin.resalers.create', 'uses' => 'Admin\ResalerController@create']);
Route::put('admin/resalers/{resalers}', ['as'=> 'admin.resalers.update', 'uses' => 'Admin\ResalerController@update']);
Route::patch('admin/resalers/{resalers}', ['as'=> 'admin.resalers.update', 'uses' => 'Admin\ResalerController@update']);
Route::delete('admin/resalers/{resalers}', ['as'=> 'admin.resalers.destroy', 'uses' => 'Admin\ResalerController@destroy']);
Route::get('admin/resalers/{resalers}', ['as'=> 'admin.resalers.show', 'uses' => 'Admin\ResalerController@show']);
Route::get('admin/resalers/{resalers}/edit', ['as'=> 'admin.resalers.edit', 'uses' => 'Admin\ResalerController@edit']);


Route::get('admin/products', ['as'=> 'admin.products.index', 'uses' => 'Admin\ProductController@index']);
/* Route::get('admin/products', ['as'=> 'admin.products.index', 'uses' => 'Admin\ProductController@index'])->middleware('auth'); */
Route::post('admin/products', ['as'=> 'admin.products.store', 'uses' => 'Admin\ProductController@store']);
Route::get('admin/products/create', ['as'=> 'admin.products.create', 'uses' => 'Admin\ProductController@create']);
Route::put('admin/products/{products}', ['as'=> 'admin.products.update', 'uses' => 'Admin\ProductController@update']);
Route::patch('admin/products/{products}', ['as'=> 'admin.products.update', 'uses' => 'Admin\ProductController@update']);
Route::delete('admin/products/{products}', ['as'=> 'admin.products.destroy', 'uses' => 'Admin\ProductController@destroy']);
Route::get('admin/products/{products}', ['as'=> 'admin.products.show', 'uses' => 'Admin\ProductController@show']);
Route::get('admin/products/{products}/edit', ['as'=> 'admin.products.edit', 'uses' => 'Admin\ProductController@edit']);





Route::get('admin/product/{id}/versions', ['as'=> 'admin.versions.index', 'uses' => 'Admin\VersionController@index']);

/***/
Route::post('admin/product/{id}/versions', ['as'=> 'admin.versions.store', 'uses' => 'Admin\VersionController@store']); 
/****/

Route::get('admin/product/{id}/versions/create', ['as'=> 'admin.versions.create', 'uses' => 'Admin\VersionController@create']);

Route::get('admin/versions/{versions}/edit', ['as'=> 'admin.versions.edit', 'uses' => 'Admin\VersionController@edit']);

Route::put('admin/versions/{versions}', ['as'=> 'admin.versions.update', 'uses' => 'Admin\VersionController@update']);
Route::patch('admin/versions/{versions}', ['as'=> 'admin.versions.update', 'uses' => 'Admin\VersionController@update']);
Route::delete('admin/versions/{versions}', ['as'=> 'admin.versions.destroy', 'uses' => 'Admin\VersionController@destroy']);
Route::get('admin/versions/{versions}', ['as'=> 'admin.versions.show', 'uses' => 'Admin\VersionController@show']);


Route::get('admin/comments', ['as'=> 'admin.comments.index', 'uses' => 'Admin\CommentController@index']);
Route::post('admin/comments', ['as'=> 'admin.comments.store', 'uses' => 'Admin\CommentController@store']);
Route::get('admin/comments/create', ['as'=> 'admin.comments.create', 'uses' => 'Admin\CommentController@create']);
Route::put('admin/comments/{comments}', ['as'=> 'admin.comments.update', 'uses' => 'Admin\CommentController@update']);
Route::patch('admin/comments/{comments}', ['as'=> 'admin.comments.update', 'uses' => 'Admin\CommentController@update']);
Route::delete('admin/comments/{comments}', ['as'=> 'admin.comments.destroy', 'uses' => 'Admin\CommentController@destroy']);
Route::get('admin/comments/{comments}', ['as'=> 'admin.comments.show', 'uses' => 'Admin\CommentController@show']);
Route::get('admin/comments/{comments}/edit', ['as'=> 'admin.comments.edit', 'uses' => 'Admin\CommentController@edit']);


Route::get('admin/requirements', ['as'=> 'admin.requirements.index', 'uses' => 'Admin\RequirementController@index']);
Route::post('admin/requirements', ['as'=> 'admin.requirements.store', 'uses' => 'Admin\RequirementController@store']);
Route::get('admin/requirements/create', ['as'=> 'admin.requirements.create', 'uses' => 'Admin\RequirementController@create']);
Route::put('admin/requirements/{requirements}', ['as'=> 'admin.requirements.update', 'uses' => 'Admin\RequirementController@update']);
Route::patch('admin/requirements/{requirements}', ['as'=> 'admin.requirements.update', 'uses' => 'Admin\RequirementController@update']);
Route::delete('admin/requirements/{requirements}', ['as'=> 'admin.requirements.destroy', 'uses' => 'Admin\RequirementController@destroy']);
Route::get('admin/requirements/{requirements}', ['as'=> 'admin.requirements.show', 'uses' => 'Admin\RequirementController@show']);
Route::get('admin/requirements/{requirements}/edit', ['as'=> 'admin.requirements.edit', 'uses' => 'Admin\RequirementController@edit']);


Route::get('admin/tags', ['as'=> 'admin.tags.index', 'uses' => 'Admin\TagController@index']);
Route::post('admin/tags', ['as'=> 'admin.tags.store', 'uses' => 'Admin\TagController@store']);
Route::get('admin/tags/create', ['as'=> 'admin.tags.create', 'uses' => 'Admin\TagController@create']);
Route::put('admin/tags/{tags}', ['as'=> 'admin.tags.update', 'uses' => 'Admin\TagController@update']);
Route::patch('admin/tags/{tags}', ['as'=> 'admin.tags.update', 'uses' => 'Admin\TagController@update']);
Route::delete('admin/tags/{tags}', ['as'=> 'admin.tags.destroy', 'uses' => 'Admin\TagController@destroy']);
Route::get('admin/tags/{tags}', ['as'=> 'admin.tags.show', 'uses' => 'Admin\TagController@show']);
Route::get('admin/tags/{tags}/edit', ['as'=> 'admin.tags.edit', 'uses' => 'Admin\TagController@edit']);



Route::get('admin/categories', ['as'=> 'admin.categories.index', 'uses' => 'Admin\CategoryController@index']);
Route::post('admin/categories', ['as'=> 'admin.categories.store', 'uses' => 'Admin\CategoryController@store']);
Route::get('admin/categories/create', ['as'=> 'admin.categories.create', 'uses' => 'Admin\CategoryController@create']);
Route::put('admin/categories/{categories}', ['as'=> 'admin.categories.update', 'uses' => 'Admin\CategoryController@update']);
Route::patch('admin/categories/{categories}', ['as'=> 'admin.categories.update', 'uses' => 'Admin\CategoryController@update']);
Route::get('admin/categories/{categories}/edit', ['as'=> 'admin.categories.edit', 'uses' => 'Admin\CategoryController@edit']);
Route::get('admin/categories/json/tree', 'Admin\CategoryController@treeIndex'); 

Route::get('admin/colors', ['as'=> 'admin.colors.index', 'uses' => 'Admin\ColorController@index']);
Route::post('admin/colors', ['as'=> 'admin.colors.store', 'uses' => 'Admin\ColorController@store']);
Route::get('admin/colors/create', ['as'=> 'admin.colors.create', 'uses' => 'Admin\ColorController@create']);
Route::put('admin/colors/{colors}', ['as'=> 'admin.colors.update', 'uses' => 'Admin\ColorController@update']);
Route::patch('admin/colors/{colors}', ['as'=> 'admin.colors.update', 'uses' => 'Admin\ColorController@update']);
Route::delete('admin/colors/{colors}', ['as'=> 'admin.colors.destroy', 'uses' => 'Admin\ColorController@destroy']);
Route::get('admin/colors/{colors}', ['as'=> 'admin.colors.show', 'uses' => 'Admin\ColorController@show']);
Route::get('admin/colors/{colors}/edit', ['as'=> 'admin.colors.edit', 'uses' => 'Admin\ColorController@edit']);


Route::get('admin/colors', ['as'=> 'admin.colors.index', 'uses' => 'Admin\ColorController@index']);
Route::post('admin/colors', ['as'=> 'admin.colors.store', 'uses' => 'Admin\ColorController@store']);
Route::get('admin/colors/create', ['as'=> 'admin.colors.create', 'uses' => 'Admin\ColorController@create']);
Route::put('admin/colors/{colors}', ['as'=> 'admin.colors.update', 'uses' => 'Admin\ColorController@update']);
Route::patch('admin/colors/{colors}', ['as'=> 'admin.colors.update', 'uses' => 'Admin\ColorController@update']);
Route::delete('admin/colors/{colors}', ['as'=> 'admin.colors.destroy', 'uses' => 'Admin\ColorController@destroy']);
Route::get('admin/colors/{colors}', ['as'=> 'admin.colors.show', 'uses' => 'Admin\ColorController@show']);
Route::get('admin/colors/{colors}/edit', ['as'=> 'admin.colors.edit', 'uses' => 'Admin\ColorController@edit']);


Route::get('admin/colors', ['as'=> 'admin.colors.index', 'uses' => 'Admin\ColorController@index']);
Route::post('admin/colors', ['as'=> 'admin.colors.store', 'uses' => 'Admin\ColorController@store']);
Route::get('admin/colors/create', ['as'=> 'admin.colors.create', 'uses' => 'Admin\ColorController@create']);
Route::put('admin/colors/{colors}', ['as'=> 'admin.colors.update', 'uses' => 'Admin\ColorController@update']);
Route::patch('admin/colors/{colors}', ['as'=> 'admin.colors.update', 'uses' => 'Admin\ColorController@update']);
Route::delete('admin/colors/{colors}', ['as'=> 'admin.colors.destroy', 'uses' => 'Admin\ColorController@destroy']);
Route::get('admin/colors/{colors}', ['as'=> 'admin.colors.show', 'uses' => 'Admin\ColorController@show']);
Route::get('admin/colors/{colors}/edit', ['as'=> 'admin.colors.edit', 'uses' => 'Admin\ColorController@edit']);



Route::get('admin/productPants', ['as'=> 'admin.productPants.index', 'uses' => 'Admin\ProductPantsController@index']);
Route::post('admin/productPants', ['as'=> 'admin.productPants.store', 'uses' => 'Admin\ProductPantsController@store']);
Route::get('admin/productPants/create', ['as'=> 'admin.productPants.create', 'uses' => 'Admin\ProductPantsController@create']);
Route::put('admin/productPants/{productPants}', ['as'=> 'admin.productPants.update', 'uses' => 'Admin\ProductPantsController@update']);
Route::patch('admin/productPants/{productPants}', ['as'=> 'admin.productPants.update', 'uses' => 'Admin\ProductPantsController@update']);
Route::delete('admin/productPants/{productPants}', ['as'=> 'admin.productPants.destroy', 'uses' => 'Admin\ProductPantsController@destroy']);
Route::get('admin/productPants/{productPants}', ['as'=> 'admin.productPants.show', 'uses' => 'Admin\ProductPantsController@show']);
Route::get('admin/productPants/{productPants}/edit', ['as'=> 'admin.productPants.edit', 'uses' => 'Admin\ProductPantsController@edit']);


Route::get('admin/productBrands', ['as'=> 'admin.productBrands.index', 'uses' => 'Admin\ProductBrandsController@index']);
Route::post('admin/productBrands', ['as'=> 'admin.productBrands.store', 'uses' => 'Admin\ProductBrandsController@store']);
Route::get('admin/productBrands/create', ['as'=> 'admin.productBrands.create', 'uses' => 'Admin\ProductBrandsController@create']);
Route::put('admin/productBrands/{productBrands}', ['as'=> 'admin.productBrands.update', 'uses' => 'Admin\ProductBrandsController@update']);
Route::patch('admin/productBrands/{productBrands}', ['as'=> 'admin.productBrands.update', 'uses' => 'Admin\ProductBrandsController@update']);
Route::delete('admin/productBrands/{productBrands}', ['as'=> 'admin.productBrands.destroy', 'uses' => 'Admin\ProductBrandsController@destroy']);
Route::get('admin/productBrands/{productBrands}', ['as'=> 'admin.productBrands.show', 'uses' => 'Admin\ProductBrandsController@show']);
Route::get('admin/productBrands/{productBrands}/edit', ['as'=> 'admin.productBrands.edit', 'uses' => 'Admin\ProductBrandsController@edit']);


Route::get('admin/productPants', ['as'=> 'admin.productPants.index', 'uses' => 'Admin\ProductPantsController@index']);
Route::post('admin/productPants', ['as'=> 'admin.productPants.store', 'uses' => 'Admin\ProductPantsController@store']);
Route::get('admin/productPants/create', ['as'=> 'admin.productPants.create', 'uses' => 'Admin\ProductPantsController@create']);
Route::put('admin/productPants/{productPants}', ['as'=> 'admin.productPants.update', 'uses' => 'Admin\ProductPantsController@update']);
Route::patch('admin/productPants/{productPants}', ['as'=> 'admin.productPants.update', 'uses' => 'Admin\ProductPantsController@update']);
Route::delete('admin/productPants/{productPants}', ['as'=> 'admin.productPants.destroy', 'uses' => 'Admin\ProductPantsController@destroy']);
Route::get('admin/productPants/{productPants}', ['as'=> 'admin.productPants.show', 'uses' => 'Admin\ProductPantsController@show']);
Route::get('admin/productPants/{productPants}/edit', ['as'=> 'admin.productPants.edit', 'uses' => 'Admin\ProductPantsController@edit']);


Route::get('admin/productBrands', ['as'=> 'admin.productBrands.index', 'uses' => 'Admin\ProductBrandsController@index']);
Route::post('admin/productBrands', ['as'=> 'admin.productBrands.store', 'uses' => 'Admin\ProductBrandsController@store']);
Route::get('admin/productBrands/create', ['as'=> 'admin.productBrands.create', 'uses' => 'Admin\ProductBrandsController@create']);
Route::put('admin/productBrands/{productBrands}', ['as'=> 'admin.productBrands.update', 'uses' => 'Admin\ProductBrandsController@update']);
Route::patch('admin/productBrands/{productBrands}', ['as'=> 'admin.productBrands.update', 'uses' => 'Admin\ProductBrandsController@update']);
Route::delete('admin/productBrands/{productBrands}', ['as'=> 'admin.productBrands.destroy', 'uses' => 'Admin\ProductBrandsController@destroy']);
Route::get('admin/productBrands/{productBrands}', ['as'=> 'admin.productBrands.show', 'uses' => 'Admin\ProductBrandsController@show']);
Route::get('admin/productBrands/{productBrands}/edit', ['as'=> 'admin.productBrands.edit', 'uses' => 'Admin\ProductBrandsController@edit']);


Route::get('admin/productImages', ['as'=> 'admin.productImages.index', 'uses' => 'Admin\ProductImagesController@index']);
Route::post('admin/productImages', ['as'=> 'admin.productImages.store', 'uses' => 'Admin\ProductImagesController@store']);
Route::get('admin/productImages/create', ['as'=> 'admin.productImages.create', 'uses' => 'Admin\ProductImagesController@create']);
Route::put('admin/productImages/{productImages}', ['as'=> 'admin.productImages.update', 'uses' => 'Admin\ProductImagesController@update']);
Route::patch('admin/productImages/{productImages}', ['as'=> 'admin.productImages.update', 'uses' => 'Admin\ProductImagesController@update']);
Route::delete('admin/productImages/{productImages}', ['as'=> 'admin.productImages.destroy', 'uses' => 'Admin\ProductImagesController@destroy']);
Route::get('admin/productImages/{productImages}', ['as'=> 'admin.productImages.show', 'uses' => 'Admin\ProductImagesController@show']);
Route::get('admin/productImages/{productImages}/edit', ['as'=> 'admin.productImages.edit', 'uses' => 'Admin\ProductImagesController@edit']);


Route::get('admin/productImages', ['as'=> 'admin.productImages.index', 'uses' => 'Admin\ProductImagesController@index']);
Route::post('admin/productImages', ['as'=> 'admin.productImages.store', 'uses' => 'Admin\ProductImagesController@store']);
Route::get('admin/productImages/create', ['as'=> 'admin.productImages.create', 'uses' => 'Admin\ProductImagesController@create']);
Route::put('admin/productImages/{productImages}', ['as'=> 'admin.productImages.update', 'uses' => 'Admin\ProductImagesController@update']);
Route::patch('admin/productImages/{productImages}', ['as'=> 'admin.productImages.update', 'uses' => 'Admin\ProductImagesController@update']);
Route::delete('admin/productImages/{productImages}', ['as'=> 'admin.productImages.destroy', 'uses' => 'Admin\ProductImagesController@destroy']);
Route::get('admin/productImages/{productImages}', ['as'=> 'admin.productImages.show', 'uses' => 'Admin\ProductImagesController@show']);
Route::get('admin/productImages/{productImages}/edit', ['as'=> 'admin.productImages.edit', 'uses' => 'Admin\ProductImagesController@edit']);


Route::get('admin/productImages', ['as'=> 'admin.productImages.index', 'uses' => 'Admin\ProductImagesController@index']);
Route::post('admin/productImages', ['as'=> 'admin.productImages.store', 'uses' => 'Admin\ProductImagesController@store']);
Route::get('admin/productImages/create', ['as'=> 'admin.productImages.create', 'uses' => 'Admin\ProductImagesController@create']);
Route::put('admin/productImages/{productImages}', ['as'=> 'admin.productImages.update', 'uses' => 'Admin\ProductImagesController@update']);
Route::patch('admin/productImages/{productImages}', ['as'=> 'admin.productImages.update', 'uses' => 'Admin\ProductImagesController@update']);
Route::delete('admin/productImages/{productImages}', ['as'=> 'admin.productImages.destroy', 'uses' => 'Admin\ProductImagesController@destroy']);
Route::get('admin/productImages/{productImages}', ['as'=> 'admin.productImages.show', 'uses' => 'Admin\ProductImagesController@show']);
Route::get('admin/productImages/{productImages}/edit', ['as'=> 'admin.productImages.edit', 'uses' => 'Admin\ProductImagesController@edit']);
