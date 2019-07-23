<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Version;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VersionRepository
 * @package App\Repositories\Admin
 * @version December 17, 2018, 7:07 pm UTC
 *
 * @method Version findWithoutFail($id, $columns = ['*'])
 * @method Version find($id, $columns = ['*'])
 * @method Version first($columns = ['*'])
*/
class VersionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'version',
        'apk',
        'version_price',
        'compony',
        'visited',
        'downloaded',
        'change',
        'description',
        'requirements',
        'state',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Version::class;
    }
}
