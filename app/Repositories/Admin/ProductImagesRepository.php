<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProductImages;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductImagesRepository
 * @package App\Repositories\Admin
 * @version July 23, 2019, 10:20 am UTC
 *
 * @method ProductImages findWithoutFail($id, $columns = ['*'])
 * @method ProductImages find($id, $columns = ['*'])
 * @method ProductImages first($columns = ['*'])
*/
class ProductImagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'type',
        'product_id',
        'product_type',
        'state',
        'status',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductImages::class;
    }
}
