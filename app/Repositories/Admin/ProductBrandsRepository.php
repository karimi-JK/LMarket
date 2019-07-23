<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductBrands;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductBrandsRepository
 * @package App\Repositories\Admin
 * @version June 30, 2019, 5:57 am UTC
 *
 * @method ProductBrands findWithoutFail($id, $columns = ['*'])
 * @method ProductBrands find($id, $columns = ['*'])
 * @method ProductBrands first($columns = ['*'])
*/
class ProductBrandsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Name',
        'Region',
        'logo',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductBrands::class;
    }
}
