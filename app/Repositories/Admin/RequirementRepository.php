<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Requirement;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RequirementRepository
 * @package App\Repositories\Admin
 * @version December 18, 2018, 6:50 pm UTC
 *
 * @method Requirement findWithoutFail($id, $columns = ['*'])
 * @method Requirement find($id, $columns = ['*'])
 * @method Requirement first($columns = ['*'])
*/
class RequirementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Requirement::class;
    }
}
