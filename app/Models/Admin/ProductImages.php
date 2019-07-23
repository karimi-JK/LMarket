<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductImages
 * @package App\Models\Admin
 * @version July 23, 2019, 10:20 am UTC
 *
 * @property string name
 * @property string type
 * @property string product_id
 * @property string product_type
 * @property string state
 * @property string status
 * @property string description
 */
class ProductImages extends Model
{
    use SoftDeletes;

    public $table = 'product_images';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'type',
        'product_id',
        'product_type',
        'state',
        'status',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'type' => 'string',
        'product_id' => 'string',
        'product_type' => 'string',
        'state' => 'string',
        'status' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
