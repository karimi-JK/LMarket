<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductPants
 * @package App\Models\Admin
 * @version June 30, 2019, 5:49 am UTC
 *
 * @property string product_id
 * @property string name
 * @property string price
 * @property string brand_id
 * @property string tags
 * @property string color_id
 * @property string size
 * @property string count
 * @property string critical_number
 * @property string description
 * @property string state
 * @property string status
 */
class ProductPants extends Model
{
    use SoftDeletes;

    public $table = 'product_pants';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_id' => 'string',
        'name' => 'string',
        'price' => 'string',
        'brand_id' => 'string',
        'tags' => 'string',
        'color_id' => 'string',
        'size' => 'string',
        'count' => 'string',
        'critical_number' => 'string',
        'description' => 'string',
        'state' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
