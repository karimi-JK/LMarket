<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Resaler;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ResalerRepository
 * @package App\Repositories\Admin
 * @version December 17, 2018, 11:09 am UTC
 *
 * @method Resaler findWithoutFail($id, $columns = ['*'])
 * @method Resaler find($id, $columns = ['*'])
 * @method Resaler first($columns = ['*'])
*/
class ResalerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'company',
        'email',
        'avatar',
        'last_acc',
        'policy',
        'state',
        'activate_code',
        'mobile',
        'password'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Resaler::class;
    }
}
