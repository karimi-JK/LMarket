<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models\Admin
 * @version December 17, 2018, 6:30 pm UTC
 *
 * @property string publisher_id
 * @property string product_tags
 * @property string product_name
 * @property string image
 * @property string categories
 * @property string state
 * @property string status
 * @property string product_price
 * @property string description
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'publisher_id',
        'product_tags',
        'product_name',
        'image',
        'categories',
        'state',
        'status',
        'product_price',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'publisher_id' => 'string',
        'product_tags' => 'string',
        'product_name' => 'string',
        'image' => 'string',
        'categories' => 'string',
        'state' => 'string',
        'status' => 'string',
        'product_price' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'publisher_id' => 'required',
        'product_name' => 'required',
        'categories' => 'required',
        'state' => 'required',
        'status' => 'required',
        'product_price' => 'required'
    ];

    
}
