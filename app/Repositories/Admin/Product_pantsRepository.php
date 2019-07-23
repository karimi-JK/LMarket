<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Product_pants;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class Product_pantsRepository
 * @package App\Repositories\Admin
 * @version June 24, 2019, 8:11 am UTC
 *
 * @method Product_pants findWithoutFail($id, $columns = ['*'])
 * @method Product_pants find($id, $columns = ['*'])
 * @method Product_pants first($columns = ['*'])
*/
class Product_pantsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'name',
        'price',
        'tags',
        'color_id',
        'size',
        'count',
        'critical_number'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product_pants::class;
    }
}
