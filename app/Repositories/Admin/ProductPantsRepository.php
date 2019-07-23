<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductPants;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductPantsRepository
 * @package App\Repositories\Admin
 * @version June 30, 2019, 5:49 am UTC
 *
 * @method ProductPants findWithoutFail($id, $columns = ['*'])
 * @method ProductPants find($id, $columns = ['*'])
 * @method ProductPants first($columns = ['*'])
*/
class ProductPantsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'name',
        'price',
        'brand_id',
        'tags',
        'color_id',
        'size',
        'count',
        'critical_number',
        'description',
        'state',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductPants::class;
    }
}
