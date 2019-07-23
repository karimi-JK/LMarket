<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Version
 * @package App\Models\Admin
 * @version December 17, 2018, 7:07 pm UTC
 *
 * @property string product_id
 * @property string version
 * @property string apk
 * @property string version_price
 * @property string compony
 * @property string visited
 * @property string downloaded
 * @property string change
 * @property string description
 * @property string requirements
 * @property string state
 * @property string status
 */
class Version extends Model
{
    use SoftDeletes;

    public $table = 'versions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_id' => 'string',
        'version' => 'string',
        'apk' => 'string',
        'version_price' => 'string',
        'compony' => 'string',
        'visited' => 'string',
        'downloaded' => 'string',
        'change' => 'string',
        'description' => 'string',
        'requirements' => 'string',
        'state' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required',
        'version' => 'required',
        'apk' => 'required',
        'version_price' => 'required',
        'compony' => 'required',
        'downloaded' => 'required',
        'state' => 'required',
        'status' => 'required'
    ];

    /**
     * Validation rules for edit
     *
     * @var array
     */
    public static $rulesForEdit = [
        'product_id' => 'required',
        'version' => 'required',
        'apk' => ' ',
        'version_price' => 'required',
        'compony' => 'required',
        'downloaded' => 'required',
        'state' => 'required',
        'status' => 'required'
    ];

    
}
