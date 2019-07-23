<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Color;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ColorRepository
 * @package App\Repositories\Admin
 * @version January 23, 2019, 11:56 am UTC
 *
 * @method Color findWithoutFail($id, $columns = ['*'])
 * @method Color find($id, $columns = ['*'])
 * @method Color first($columns = ['*'])
*/
class ColorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'color'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Color::class;
    }
}
